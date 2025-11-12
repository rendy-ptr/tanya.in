<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use App\Helpers\Upload;


class QuestionController extends Controller
{
    public function index(Request $request)
    {
        $query = Question::with(['user', 'category', 'answers']);

        if ($request->has('category')) {
            $slug = $request->get('category');
            $query->whereHas('category', function ($q) use ($slug) {
                $q->where('slug', $slug);
            });
        }

        $questions = $query->latest()->paginate(10);

        return view('pages.questions.index', compact('questions'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('pages.questions.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string', 'min:20'],
            'category_id' => ['required', 'exists:categories,id'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ], [
            'title.required' => 'Judul pertanyaan wajib diisi',
            'title.max' => 'Judul maksimal 255 karakter',
            'content.required' => 'Isi pertanyaan wajib diisi',
            'content.min' => 'Isi pertanyaan minimal 20 karakter',
            'category_id.required' => 'Kategori wajib dipilih',
            'category_id.exists' => 'Kategori tidak valid',
            'image.image' => 'File yang diunggah harus berupa gambar.',
            'image.mimes' => 'Format gambar hanya diperbolehkan: jpeg, png, jpg, atau gif.',
            'image.max'   => 'Ukuran gambar maksimal 2 MB.',
        ]);

        $data = [
            'title'       => $validated['title'],
            'content'     => $validated['content'],
            'category_id' => $validated['category_id'],
            'user_id'     => Auth::id(),
        ];

        if ($request->hasFile('image')) {
            try {
                $upload = new Upload();
                $data['image'] = $upload->uploadImage($request->file('image'), Auth::id());
                flash()->info('Gambar berhasil diunggah.');
            } catch (\Exception $e) {
                Log::error('Gagal upload ke Cloudinary', ['error' => $e->getMessage()]);
                flash()->error('Gagal mengunggah gambar: ' . $e->getMessage());
                return back()->withInput();
            }
        }
        $question = Question::create($data);


        flash()->success('Pertanyaan berhasil dibuat!');
        return redirect()->route('questions.show', $question->slug);
    }

    public function edit($slug)
    {
        $question = Question::where('slug', $slug)->firstOrFail();
        if (!$question->isOwnedBy(Auth::user())) {
            flash()->error('Anda tidak memiliki izin untuk mengedit pertanyaan ini!');
        }
        $categories = Category::orderBy('name')->get();

        return view('pages.questions.edit', compact('question', 'categories'));
    }

    public function update(Request $request, $slug)
    {
        $question = Question::where('slug', $slug)->firstOrFail();
        if (!$question->isOwnedBy(Auth::user())) {
            flash()->error('Anda tidak memiliki izin untuk mengedit pertanyaan ini!');
        }

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string', 'min:20'],
            'category_id' => ['required', 'exists:categories,id'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'remove_image' => ['nullable', 'boolean'],
        ], [
            'title.required' => 'Judul pertanyaan wajib diisi',
            'title.max' => 'Judul maksimal 255 karakter',
            'content.required' => 'Isi pertanyaan wajib diisi',
            'content.min' => 'Isi pertanyaan minimal 20 karakter',
            'category_id.required' => 'Kategori wajib dipilih',
            'category_id.exists' => 'Kategori tidak valid',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'Format gambar harus: jpeg, png, jpg, atau gif',
            'image.max' => 'Ukuran gambar maksimal 2MB',
        ]);

        $updateData = [
            'title' => $validated['title'],
            'content' => $validated['content'],
            'category_id' => $validated['category_id'],
            'user_id' => Auth::id(),
        ];

        $oldImageUrl = $question->image;

        if ($request->boolean('remove_image')) {
            $updateData['image'] = null;
            if ($oldImageUrl) {
                $this->deleteCloudinaryImage($oldImageUrl);
            }
            flash()->info('Gambar berhasil dihapus.');
        } elseif ($request->hasFile('image')) {
            try {
                $file = $request->file('image');

                $uploadResult = Cloudinary::upload($file->getRealPath(), [
                    'folder' => 'tanyain/questions',
                    'resource_type' => 'image',
                    'overwrite' => true,
                    'invalidate' => true,
                ]);

                $newImageUrl = $uploadResult->getSecurePath();
                $updateData['image'] = $newImageUrl;

                if ($oldImageUrl) {
                    $this->deleteCloudinaryImage($oldImageUrl);
                }

                flash()->info('Gambar berhasil diperbarui.');
            } catch (\Exception $e) {
                flash()->error('Gagal upload gambar: ' . $e->getMessage());
                return back()->withInput();
            }
        }
        $question->update($updateData);

        flash()->success('Pertanyaan berhasil diperbarui!');
        return redirect()->route('questions.show', $question->fresh()->slug);
    }

    public function destroy($slug)
    {
        $question = Question::where('slug', $slug)->firstOrFail();
        if (!$question->isOwnedBy(Auth::user())) {
            flash()->error('Anda tidak memiliki izin untuk menghapus pertanyaan ini!');
        }

        $question->delete();
        flash()->success('Pertanyaan berhasil dihapus!');
        return redirect()->route('questions.index');
    }

    public function show($slug)
    {

        $question = Question::with(['user', 'category', 'answers.user'])
            ->where('slug', $slug)
            ->firstOrFail();

        return view('pages.questions.show', compact('question'));
    }



    private function deleteCloudinaryImage(string $imageUrl): void
    {
        try {
            $publicId = preg_replace('/^.*tanyain\/questions\//', 'tanyain/questions/', $imageUrl);
            $publicId = pathinfo($publicId, PATHINFO_FILENAME);

            Cloudinary::destroy($publicId);
        } catch (\Exception $e) {
            Log::warning('Gagal menghapus gambar Cloudinary: ' . $e->getMessage(), [
                'url' => $imageUrl
            ]);
        }
    }
}

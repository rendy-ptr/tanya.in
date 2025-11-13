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
            abort(403, 'Anda tidak memiliki izin untuk mengedit pertanyaan ini!');
        }
        $categories = Category::orderBy('name')->get();

        return view('pages.questions.edit', compact('question', 'categories'));
    }

    public function update(Request $request, $slug)
    {
        $question = Question::where('slug', $slug)->firstOrFail();
        if (!$question->isOwnedBy(Auth::user())) {
            abort(403, 'Anda tidak memiliki izin untuk mengedit pertanyaan ini!');
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
            'image' => $question->image,
        ];

        Log::info('updateData before remove_image:', $updateData);
        Log::info('remove_image value:', [$request->input('remove_image')]);

        if ($request->input('remove_image') == '1' && !$request->hasFile('image')) {
            if ($question->image) {
                $this->deleteCloudinaryImage($question->image);
            }
            $updateData['image'] = null;
            flash()->info('Gambar berhasil dihapus.');
        }

        if ($request->hasFile('image')) {
            try {
                $file = $request->file('image');
                $upload = new Upload();
                $updateData['image'] = $upload->uploadImage($file, Auth::id());
                flash()->info('Gambar berhasil diperbarui.');
            } catch (\Exception $e) {
                flash()->error('Gagal mengunggah gambar: ' . $e->getMessage());
                return back()->withInput();
            }
        }

        Log::info('UPDATED DATA AFTER ALL:', $updateData);

        $question->update($updateData);

        flash()->success('Pertanyaan berhasil diperbarui!');
        return redirect()->route('questions.show', $question->slug);
    }

    public function destroy($slug)
    {
        $question = Question::where('slug', $slug)->firstOrFail();
        if (!$question->isOwnedBy(Auth::user())) {
            abort(403, 'Anda tidak memiliki izin untuk menghapus pertanyaan ini!');
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


    private function extractPublicId(string $imageUrl): ?string
    {
        if (!str_contains($imageUrl, 'res.cloudinary.com')) {
            return null;
        }

        return preg_match('#/upload/(?:v\d+/)?(.+?)(?:\.[a-z]+)?$#i', $imageUrl, $matches)
            ? $matches[1]
            : null;
    }


    private function deleteCloudinaryImage(string $imageUrl): void
    {
        try {
            $publicId = $this->extractPublicId($imageUrl);

            if (!$publicId) {
                Log::warning('Gagal ekstrak public_id dari URL Cloudinary', ['url' => $imageUrl]);
                return;
            }

            $result = Cloudinary::destroy($publicId);

            if ($result['result'] === 'ok') {
                Log::info('Gambar Cloudinary berhasil dihapus', ['public_id' => $publicId]);
            } else {
                Log::warning('Cloudinary: gambar tidak ditemukan atau gagal dihapus', [
                    'public_id' => $publicId,
                    'response' => $result
                ]);
            }
        } catch (\Exception $e) {
            Log::warning('Error saat hapus Cloudinary: ' . $e->getMessage(), [
                'url' => $imageUrl,
                'public_id' => $publicId ?? 'unknown'
            ]);
        }
    }
}

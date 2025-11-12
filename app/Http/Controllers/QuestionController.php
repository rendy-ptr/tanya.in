<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

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

    public function show($slug)
    {

        $question = Question::with(['user', 'category', 'answers.user'])
            ->where('slug', $slug)
            ->firstOrFail();

        return view('pages.questions.show', compact('question'));
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
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'Format gambar harus: jpeg, png, jpg, atau gif',
            'image.max' => 'Ukuran gambar maksimal 2MB',
        ]);

        if ($request->hasFile('image')) {
            $uploadedFileUrl = Cloudinary::upload($request->file('image')->getRealPath(), [
                'folder' => 'tanyain/questions',
                'resource_type' => 'image'
            ])->getSecurePath();

            $validated['image'] = $uploadedFileUrl;
        }

        $validated['user_id'] = Auth::id();

        Question::create($validated);
        flash()->success('Pertanyaan berhasil dibuat!');
        return redirect()->route('questions.index');
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

        if ($request->boolean('remove_image')) {
            $validated['image'] = null;
        } elseif ($request->hasFile('image')) {
            $uploadedFileUrl = Cloudinary::upload($request->file('image')->getRealPath(), [
                'folder' => 'tanyain/questions',
                'resource_type' => 'image'
            ])->getSecurePath();

            $validated['image'] = $uploadedFileUrl;
        }

        $question->update($validated);
        flash()->success('Pertanyaan berhasil diperbarui!');
        return redirect()->route('questions.show', $question);
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
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('questions')->paginate(12);

        return view('pages.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('pages.categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:categories'],
        ], [
            'name.required' => 'Nama kategori wajib diisi',
            'name.unique' => 'Kategori sudah ada',
            'name.max' => 'Nama kategori maksimal 255 karakter',
        ]);

        Category::create($validated);
        flash()->success('Kategori berhasil ditambahkan!');
        return redirect()->route('categories.index');
    }

    public function edit($slug)
    {
        $query = Category::where('slug', $slug);
        $category = $query->firstOrFail();
        return view('pages.categories.edit', compact('category'));
    }

    public function update(Request $request, $slug)
    {
        $query = Category::where('slug', $slug);
        $category = $query->firstOrFail();
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:categories,name,' . $category->id],
        ], [
            'name.required' => 'Nama kategori wajib diisi',
            'name.unique' => 'Kategori sudah ada',
            'name.max' => 'Nama kategori maksimal 255 karakter',
        ]);

        $category->update($validated);
        flash()->success('Kategori berhasil diperbarui!');
        return redirect()->route('categories.index');
    }

    public function destroy($slug)
    {
        $query = Category::where('slug', $slug);
        $category = $query->firstOrFail();

        if ($category->questions()->count() > 0) {
            flash()->error('Kategori tidak dapat dihapus karena masih memiliki pertanyaan!');
            return back();
        }

        $category->delete();
        flash()->success('Kategori berhasil dihapus!');
        return redirect()->route('categories.index');
    }

    public function showByCategory($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $questions = Question::with(['user', 'category', 'answers'])
            ->whereHas('category', function ($q) use ($slug) {
                $q->where('slug', $slug);
            })
            ->latest()
            ->paginate(10);

        return view('pages.categories.show', compact('category', 'questions'));
    }
}

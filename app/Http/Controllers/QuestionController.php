<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function index()
    {
        try {
            $questions = Question::with(['user', 'category', 'answers'])
                ->latest()
                ->paginate(10);

            return view('pages.questions.index', compact('questions'));
        } catch (\Exception $e) {
            flash()->error('Terjadi kesalahan saat memuat daftar pertanyaan. Silakan coba lagi.');
            return redirect()->back();
        }
    }
    public function show($slug)
    {
        try {
            $question = Question::with(['user', 'category', 'answers.user'])
                ->where('slug', $slug)
                ->firstOrFail();

            return view('pages.questions.show', compact('question'));
        } catch (\Exception $e) {
            flash()->error('Terjadi kesalahan saat memuat pertanyaan. Silakan coba lagi.');
            return redirect()->back();
        }
    }
}

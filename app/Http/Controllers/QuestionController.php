<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::with(['user', 'category', 'answers'])
            ->latest()
            ->paginate(10);

        return view('pages.questions.index', compact('questions'));
    }

    public function show($slug)
    {
        $question = Question::with(['user', 'category', 'answers.user'])
            ->where('slug', $slug)
            ->firstOrFail();

        return view('pages.questions.show', compact('question'));
    }
}

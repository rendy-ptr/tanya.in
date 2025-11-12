<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Answer;
use App\Models\Question;

class AnswerController extends Controller
{
    public function store(Request $request, $slug)
    {
        $query = Question::where('slug', $slug);
        $question = $query->firstOrFail();
        $validated = $request->validate([
            'content' => ['required', 'string', 'min:10'],
        ], [
            'content.required' => 'Jawaban wajib diisi',
            'content.min' => 'Jawaban minimal 10 karakter',
        ]);

        $validated['user_id'] = Auth::id();
        $validated['question_id'] = $question->id;

        Answer::create($validated);
        flash()->success('Jawaban berhasil ditambahkan!');
        return back();
    }

    public function edit($id)
    {
        $query = Answer::where('id', $id);
        $answer = $query->firstOrFail();

        if (!$answer->isOwnedBy(Auth::user())) {
            abort(403, 'Anda tidak memiliki akses untuk mengedit jawaban ini.');
        }

        return view('pages.answers.edit', compact('answer'));
    }

    public function update(Request $request, $id)
    {
        $query = Answer::where('id', $id);
        $answer = $query->firstOrFail();

        if (!$answer->isOwnedBy(Auth::user())) {
            abort(403, 'Anda tidak memiliki akses untuk mengedit jawaban ini.');
        }

        $validated = $request->validate([
            'content' => ['required', 'string', 'min:10'],
        ], [
            'content.required' => 'Jawaban wajib diisi',
            'content.min' => 'Jawaban minimal 10 karakter',
        ]);

        $answer->update($validated);
        flash()->success('Jawaban berhasil diperbarui!');
        return redirect()->route('questions.show', $answer->question->slug);
    }

    public function destroy($id)
    {
        $query = Answer::where('id', $id);
        $answer = $query->firstOrFail();

        if (!$answer->isOwnedBy(Auth::user())) {
            abort(403, 'Anda tidak memiliki akses untuk menghapus jawaban ini.');
        }

        $answer->delete();
        flash()->success('Jawaban berhasil dihapus!');
        return redirect()->route('questions.show', $answer->question->slug);
    }
}

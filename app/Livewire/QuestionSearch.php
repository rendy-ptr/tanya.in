<?php

namespace App\Livewire;

use App\Models\Question;
use Livewire\Component;
use Livewire\WithPagination;

class QuestionSearch extends Component
{
    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'tailwind';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {

        $query = Question::with(['user', 'category', 'answers']);

        if (!empty($this->search)) {
            $searchTerm = strtolower(trim($this->search));
            $query->whereRaw('LOWER(title) LIKE ?', ['%' . $searchTerm . '%']);
        }

        $query->latest();

        $questions = $query->paginate(10);

        return view('livewire.question-search', [
            'questions' => $questions,
        ]);
    }
}

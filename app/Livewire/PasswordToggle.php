<?php

namespace App\Livewire;

use Livewire\Component;

class PasswordToggle extends Component
{
    public $showCurrent = false;
    public $showNew = false;
    public $showConfirm = false;

    public function render()
    {
        return view('livewire.password-toggle');
    }
}

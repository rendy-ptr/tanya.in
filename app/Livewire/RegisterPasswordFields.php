<?php

namespace App\Livewire;

use Livewire\Component;

class RegisterPasswordFields extends Component
{
    public $showPassword = false;
    public $showConfirmation = false;

    public function render()
    {
        return view('livewire.register-password-fields');
    }
}

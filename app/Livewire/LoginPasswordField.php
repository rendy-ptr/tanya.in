<?php

namespace App\Livewire;

use Livewire\Component;

class LoginPasswordField extends Component
{
    public $show = false;

    public function render()
    {
        return view('livewire.login-password-field');
    }
}

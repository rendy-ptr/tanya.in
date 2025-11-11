<?php

namespace App\Livewire;

use Livewire\Component;

class DropdownUser extends Component
{
    public $open = false;
    public $dropdownItems = [];

    public function toggle()
    {
        $this->open = ! $this->open;
    }

    public function render()
    {
        return view('livewire.dropdown-user');
    }
}

<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Tokens extends Component
{
    public $name;
    public $token;

    public function render()
    {
        return view('livewire.admin.tokens');
    }

    public function createToken()
    {
        $token = auth()->user()->createToken($this->name);
        $this->token = $token->plainTextToken;
    }
}

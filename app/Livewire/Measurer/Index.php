<?php

namespace App\Livewire\Measurer;

use Livewire\Component;

class Index extends Component
{
    public function mount()
    {
        // $token = auth()->user()->createToken('medidor-01');
 
        // dd($token->plainTextToken);
    }

    public function render()
    {
        return view('livewire.measurer.index');
    }
}

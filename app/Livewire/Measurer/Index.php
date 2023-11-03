<?php

namespace App\Livewire\Measurer;

use App\Models\Measurer;
use Livewire\Component;

class Index extends Component
{
    public $measurers;

    public function mount()
    {
        $this->measurers = Measurer::all();
    }

    public function render()
    {
        return view('livewire.measurer.index')->layout('layouts.guest');
    }
}

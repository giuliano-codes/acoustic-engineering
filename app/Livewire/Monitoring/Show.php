<?php

namespace App\Livewire\Monitoring;

use App\Models\Measurer;
use Livewire\Component;

class Show extends Component
{
    public $measurer;

    public function mount($id)
    {
        $this->measurer = Measurer::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.monitoring.show')->layout('layouts.guest');;
    }
}

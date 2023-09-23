<?php

namespace App\Livewire\Admin\Measurement;

use App\Models\Measurement;
use Livewire\Component;

class Index extends Component
{
    public $measurements;

    public function mount()
    {
        $this->measurements = Measurement::all();
    }

    public function render()
    {
        return view('livewire.admin.measurement.index');
    }
}

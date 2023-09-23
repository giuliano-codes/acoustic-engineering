<?php

namespace App\Livewire\Admin\Measurement;

use App\Models\Measurement;
use Livewire\Component;

class Show extends Component
{
    public Measurement $measurement;

    public function mount($id)
    {
        $this->measurement = Measurement::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.admin.measurement.show');
    }
}

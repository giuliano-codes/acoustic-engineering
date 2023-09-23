<?php

namespace App\Livewire\Admin\Measurement;

use App\Models\Measurement;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Delete extends Component
{
    public Measurement $measurement;

    public function mount($id)
    {
        $this->measurement = Measurement::findOrFail($id);
    }

    public function delete()
    {
        $measurement = Measurement::findOrFail($this->measurement->id);
        Storage::disk('public')->delete($measurement->path);
        $measurement->delete();
        redirect()->route('admin.measurement.index');
    }
    
    public function render()
    {
        return view('livewire.admin.measurement.delete');
    }
}

<?php

namespace App\Livewire\Admin\Place;

use Livewire\Component;

use App\Models\Place;

class Show extends Component
{
    public Place $place;

    public function mount($id)
    {
        $this->place = Place::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.admin.place.show');
    }
}

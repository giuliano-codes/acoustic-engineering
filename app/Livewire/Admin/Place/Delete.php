<?php

namespace App\Livewire\Admin\Place;

use Livewire\Component;

use App\Models\Place;

class Delete extends Component
{
    public Place $place;

    public function mount($id)
    {
        $this->place = Place::findOrFail($id);
    }

    public function delete()
    {
        $place = Place::findOrFail($this->place->id);
        $place->delete();
        redirect()->route('admin.place.index');
    }

    public function render()
    {
        return view('livewire.admin.place.delete');
    }
}

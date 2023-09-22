<?php

namespace App\Livewire\Admin\Place;

use Livewire\Component;

use App\Models\Place;

class Edit extends Component
{
    public Place $place;
    public $form;

    public function mount($id)
    {
        $this->place = Place::findOrFail($id);

        $this->form['name'] = $this->place->name;
    }

    public function save()
    {
        $this->place->update([
            'name' => $this->form['name']
        ]);
    }

    public function render()
    {
        return view('livewire.admin.place.edit');
    }
}

<?php

namespace App\Livewire\Admin\Building;

use Livewire\Component;

use App\Models\Building;
use App\Models\Place;

class Edit extends Component
{
    public Building $building;
    public $places;
    public $form;

    public function mount($id)
    {
        $this->building = Building::findOrFail($id);
        $this->places = Place::all();

        $this->form['name'] = $this->building->name;
        $this->form['place'] = $this->building->place->id ?? null;
    }

    public function save()
    {
        $place = Place::findOrFail($this->form['place']);
        $this->building->place()->associate($place);
        $this->building->name = $this->form['name'];
        $this->building->save();
    }

    public function render()
    {
        return view('livewire.admin.building.edit');
    }
}

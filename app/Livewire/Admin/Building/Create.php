<?php

namespace App\Livewire\Admin\Building;

use Livewire\Component;

use App\Models\Place;
use App\Models\Building;

class Create extends Component
{
    public $places;
    public $form = array(
        'name' => '',
        'place' => null
    );

    public function mount()
    {
        $this->places = Place::all();
    }

    public function save()
    {
        $place = Place::findOrFail($this->form['place']);
        $place->buildings()->create([
            'name' => $this->form['name']
        ]);

        redirect()->route('admin.building.index');
    }

    public function render()
    {
        return view('livewire.admin.building.create');
    }
}

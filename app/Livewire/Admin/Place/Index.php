<?php

namespace App\Livewire\Admin\Place;

use App\Models\Place;
use Livewire\Component;

class Index extends Component
{
    public $places;

    public function mount()
    {
        $this->places = Place::all();
    }

    public function render()
    {
        return view('livewire.admin.place.index');
    }
}

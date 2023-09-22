<?php

namespace App\Livewire\Admin\Building;

use App\Models\Building;
use Livewire\Component;

class Index extends Component
{
    public $buildings;

    public function mount()
    {
        $this->buildings = Building::all();
    }

    public function render()
    {
        return view('livewire.admin.building.index');
    }
}

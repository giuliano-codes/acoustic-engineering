<?php

namespace App\Livewire\Admin\Building;

use Livewire\Component;

use App\Models\Building;

class Show extends Component
{
    public Building $building;

    public function mount($id)
    {
        $this->building = Building::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.admin.building.show');
    }
}

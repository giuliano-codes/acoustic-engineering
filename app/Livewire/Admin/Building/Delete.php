<?php

namespace App\Livewire\Admin\Building;

use Livewire\Component;

use App\Models\Building;

class Delete extends Component
{
    public Building $building;

    public function mount($id)
    {
        $this->building = Building::findOrFail($id);
    }

    public function delete()
    {
        $building = Building::findOrFail($this->building->id);
        $building->delete();
        redirect()->route('admin.building.index');
    }

    public function render()
    {
        return view('livewire.admin.building.delete');
    }
}

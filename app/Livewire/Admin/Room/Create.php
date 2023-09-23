<?php

namespace App\Livewire\Admin\Room;

use App\Models\Building;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    
    public $buildings;
    public $form = array(
        'name' => '',
        'file' => '',
        'building' => ''
    );

    public function mount()
    {
        $this->buildings = Building::all();
    }

    public function save()
    {
        $path = ((object) $this->form['file'])->store('rooms', 'public');
        $extension = ((object) $this->form['file'])->extension();

        $building = Building::find($this->form['building']);
        $building->rooms()->create([
            'name' => $this->form['name'],
            'blueprint_path' => $path,
            'blueprint_type' => $extension
        ]);

        redirect()->route('admin.room.index');
    }

    public function render()
    {
        return view('livewire.admin.room.create');
    }
}

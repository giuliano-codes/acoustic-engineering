<?php

namespace App\Livewire\Admin\Room;

use App\Models\Building;
use App\Models\Room;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    
    public Room $room;
    public $buildings;
    public $form;
    public $file;

    public function mount($id)
    {
        $this->room = Room::findOrFail($id);
        $this->buildings = Building::all();

        $this->form['name'] = $this->room['name'];
        $this->form['building'] = $this->room->building->id;
    }

    public function save()
    {
        $building = Building::findOrFail($this->form['building']);
        $this->room->building()->associate($building);
        $this->room->name = $this->form['name'];

        if (isset($this->file)) {
            $newPath = $this->file->store('rooms', 'public');
            $newExtension = $this->file->extension();

            $oldPath = $this->room->blueprint_path;
            Storage::disk('public')->delete($oldPath);

            $this->room->blueprint_path = $newPath;
            $this->room->blueprint_type = $newExtension;
        }

        $this->room->save();
    }

    public function render()
    {
        return view('livewire.admin.room.edit');
    }
}

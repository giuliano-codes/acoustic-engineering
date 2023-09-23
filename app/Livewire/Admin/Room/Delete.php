<?php

namespace App\Livewire\Admin\Room;

use App\Models\Room;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Delete extends Component
{
    public Room $room;

    public function mount($id)
    {
        $this->room = Room::findOrFail($id);
    }

    public function delete()
    {
        $room = Room::findOrFail($this->room->id);
        Storage::disk('public')->delete($room->blueprint_path);
        $room->delete();
        redirect()->route('admin.room.index');
    }

    public function render()
    {
        return view('livewire.admin.room.delete');
    }
}

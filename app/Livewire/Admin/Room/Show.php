<?php

namespace App\Livewire\Admin\Room;

use App\Models\Room;
use Livewire\Component;

class Show extends Component
{
    public Room $room;

    public function mount($id)
    {
        $this->room = Room::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.admin.room.show');
    }
}

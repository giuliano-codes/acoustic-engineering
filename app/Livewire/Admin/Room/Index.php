<?php

namespace App\Livewire\Admin\Room;

use App\Models\Room;
use Livewire\Component;

class Index extends Component
{
    public $rooms;

    public function mount()
    {
        $this->rooms = Room::all();
    }

    public function render()
    {
        return view('livewire.admin.room.index');
    }
}

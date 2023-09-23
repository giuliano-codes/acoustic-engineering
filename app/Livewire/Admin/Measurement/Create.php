<?php

namespace App\Livewire\Admin\Measurement;

use App\Models\Room;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    
    public $rooms;
    public $form = array(
        'name' => '',
        'file' => '',
        'room' => '',
        'type' => '',
        'samplerate' => '',
        'duration' => ''
    );

    public function mount()
    {
        $this->rooms = Room::all();
    }

    public function save()
    {
        $path = ((object) $this->form['file'])->store('measurements', 'public');
        $extension = ((object) $this->form['file'])->extension();

        $room = Room::find($this->form['room']);
        $room->measurements()->create([
            'name' => $this->form['name'],
            'type' => $this->form['type'],
            'path' => $path,
            'extension' => $extension,
            'samplerate' => (int) $this->form['samplerate'],
            'duration' => (int) $this->form['duration']
        ]);

        redirect()->route('admin.measurement.index');
    }

    public function render()
    {
        return view('livewire.admin.measurement.create');
    }
}

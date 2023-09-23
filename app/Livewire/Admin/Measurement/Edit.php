<?php

namespace App\Livewire\Admin\Measurement;

use App\Models\Measurement;
use App\Models\Room;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public Measurement $measurement;
    public $rooms;
    public $form;
    public $file;

    public function mount($id)
    {
        $this->measurement = Measurement::findOrFail($id);
        $this->rooms = Room::all();

        $this->form['name'] = $this->measurement['name'];
        $this->form['type'] = $this->measurement['type'];
        $this->form['samplerate'] = $this->measurement['samplerate'];
        $this->form['duration'] = $this->measurement['duration'];
        $this->form['room'] = $this->measurement->room->id;
    }

    public function save()
    {
        $room = Room::findOrFail($this->form['room']);
        $this->measurement->room()->associate($room);
        $this->measurement->name = $this->form['name'];
        $this->measurement->type = $this->form['type'];
        $this->measurement->samplerate = $this->form['samplerate'];
        $this->measurement->duration = $this->form['duration'];

        if (isset($this->file)) {
            $newPath = $this->file->store('measurements', 'public');
            $newExtension = $this->file->extension();

            $oldPath = $this->measurement->path;
            Storage::disk('public')->delete($oldPath);

            $this->measurement->path = $newPath;
            $this->measurement->extension = $newExtension;
        }

        $this->measurement->save();
    }

    public function render()
    {
        return view('livewire.admin.measurement.edit');
    }
}

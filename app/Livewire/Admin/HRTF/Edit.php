<?php

namespace App\Livewire\Admin\HRTF;

use App\Models\HRTF;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public HRTF $hrtf;
    public $form;
    public $file;

    public function mount($id)
    {
        $this->hrtf = HRTF::findOrFail($id);
        $this->form = array(
            'name' => $this->hrtf->name,
            'type' => $this->hrtf->type,
            'samplerate' => $this->hrtf->samplerate,
            'duration' => $this->hrtf->duration,
            'azimuth' => $this->hrtf->azimuth,
            'elevation_angle' => $this->hrtf->elevation_angle
        );
    }

    public function save()
    {
        $this->hrtf->name = $this->form['name'];
        $this->hrtf->type = $this->form['type'];
        $this->hrtf->samplerate = $this->form['samplerate'];
        $this->hrtf->duration = $this->form['duration'];
        $this->hrtf->azimuth = $this->form['azimuth'];
        $this->hrtf->elevation_angle = $this->form['elevation_angle'];

        if (isset($this->file)) {
            $newPath = $this->file->store('hrtfs', 'public');
            $newExtension = $this->file->extension();

            $oldPath = $this->hrtf->path;
            Storage::disk('public')->delete($oldPath);

            $this->hrtf->path = $newPath;
            $this->hrtf->extension = $newExtension;
        }

        $this->hrtf->save();
    }

    public function render()
    {
        return view('livewire.admin.hrtf.edit');
    }
}

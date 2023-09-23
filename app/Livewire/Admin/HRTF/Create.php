<?php

namespace App\Livewire\Admin\HRTF;

use App\Models\HRTF;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    
    public $form = array(
        'name' => '',
        'file' => '',
        'type' => '',
        'samplerate' => '',
        'duration' => '',
        'azimuth' => '',
        'elevation_angle' => ''
    );

    public function save()
    {
        $path = ((object) $this->form['file'])->store('hrtfs', 'public');
        $extension = ((object) $this->form['file'])->extension();

        HRTF::create([
            'name' => $this->form['name'],
            'type' => $this->form['type'],
            'path' => $path,
            'extension' => $extension,
            'samplerate' => (int) $this->form['samplerate'],
            'duration' => (int) $this->form['duration'],
            'azimuth' => $this->form['azimuth'],
            'elevation_angle' => $this->form['elevation_angle']
        ]);

        redirect()->route('admin.measurement.index');
    }

    public function render()
    {
        return view('livewire.admin.hrtf.create');
    }
}

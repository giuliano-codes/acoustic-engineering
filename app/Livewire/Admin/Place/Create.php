<?php

namespace App\Livewire\Admin\Place;

use Livewire\Component;

use App\Models\Place;

class Create extends Component
{
    public $form = array(
        'name' => ''
    );

    public function save()
    {
        Place::create([
            'name' => $this->form['name']
        ]);

        redirect()->route('admin.place.index');
    }

    public function render()
    {
        return view('livewire.admin.place.create');
    }
}

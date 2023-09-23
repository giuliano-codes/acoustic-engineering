<?php

namespace App\Livewire\Admin\HRTF;

use App\Models\HRTF;
use Livewire\Component;

class Index extends Component
{
    public $hrtfs;

    public function mount()
    {
        $this->hrtfs = HRTF::all();
    }

    public function render()
    {
        return view('livewire.admin.hrtf.index');
    }
}

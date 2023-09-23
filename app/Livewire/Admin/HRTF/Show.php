<?php

namespace App\Livewire\Admin\HRTF;

use App\Models\HRTF;
use Livewire\Component;

class Show extends Component
{
    public HRTF $hrtf;

    public function mount($id)
    {
        $this->hrtf = HRTF::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.admin.hrtf.show');
    }
}

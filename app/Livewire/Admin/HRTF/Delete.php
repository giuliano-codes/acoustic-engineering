<?php

namespace App\Livewire\Admin\HRTF;

use App\Models\HRTF;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Delete extends Component
{
    public HRTF $hrtf;

    public function mount($id)
    {
        $this->hrtf = HRTF::findOrFail($id);
    }

    public function delete()
    {
        $hrtf = HRTF::findOrFail($this->hrtf->id);
        Storage::disk('public')->delete($hrtf->path);
        $hrtf->delete();
        redirect()->route('admin.hrtf.index');
    }

    public function render()
    {
        return view('livewire.admin.hrtf.delete');
    }
}

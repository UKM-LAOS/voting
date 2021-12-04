<?php

namespace App\Http\Livewire;

use App\Models\Candidate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateCandidate extends Component
{
    use WithFileUploads;

    public $candidate;
    public $action;
    public $button;

    public function render()
    {
        return view('livewire.create-candidate');
    }

    protected function getRules()
    {
        return [
            'candidate.name' => 'required|min:3',
            'candidate.image' => 'image|max:2048',
            'candidate.program_study' => 'required',
            'candidate.year' => 'required',
            'candidate.visi' => 'required',
            'candidate.misi' => 'required',

        ];
    }

    public function createCandidate() {
        $this->resetErrorBag();
        $this->validate();

        $filename = date('dmyHis').'.'.$this->candidate['file']->extension();

        $this->candidate['image'] = $filename;

        $this->candidate['file']->storeAs('public/candidate', $filename);

        unset($this->candidate['file']);

        Candidate::create($this->candidate);

        $this->emit('saved');
        $this->reset('candidate');

    }

    public function mount ()
    {
        $this->button = create_button($this->action, "Candidate");
    }
}

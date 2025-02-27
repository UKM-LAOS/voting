<?php

namespace App\Http\Livewire;

use App\Models\Candidate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateCandidate extends Component
{
    use WithFileUploads;

    public $candidate;
    public $candidateId;
    public $action;
    public $button;

    public function render()
    {
        return view('livewire.create-candidate');
    }

    protected function getRules()
    {
        $rules = [];
        if ($this->action == "createCandidate") {
            $rules = [
                'candidate.image' => 'image|max:2048',
            ];
        }
        return array_merge([
            'candidate.name' => 'required|min:3',
            'candidate.program_study' => 'required',
            'candidate.year' => 'required',
            'candidate.visi' => 'required',
            'candidate.misi' => 'required',

        ], $rules);
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

    public function updateCandidate() {
        $this->resetErrorBag();
        $this->validate();

        unset($this->candidate['created_at']);
        unset($this->candidate['updated_at']);

        Candidate::query()->where('id', $this->candidateId)->update($this->candidate);

        $this->emit('saved');
    }

    public function mount ()
    {
        if (!!$this->candidateId) {
            $candidate = Candidate::find($this->candidateId);

            $this->candidate = $candidate->toArray();
        }
        $this->button = create_button($this->action, "Candidate");
    }
}

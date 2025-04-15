<?php

namespace App\Livewire\Wizard;

use Livewire\Component;
use Livewire\WithFileUploads;

class Step1Upload extends Component
{
    use WithFileUploads;

    public $file;
    public $context = 'resume';
    public $contexts = [
        'resume' => 'Resume',
        'property' => 'Property',
        'hotel' => 'Hotel'
    ];

    protected $rules = [
        'file' => 'required|mimes:jpg,jpeg,png,pdf,docx|max:2048',
        'context' => 'required|in:resume,property,hotel'
    ];

    public function submit()
    {
        $this->validate();

        $path = $this->file->store('uploads');

        // Changed emitUp to dispatch
        $this->dispatch('fileUploaded', [
            'path' => $path,
            'extension' => $this->file->getClientOriginalExtension(),
            'context' => $this->context
        ]);
    }

    public function render()
    {
        return view('livewire.wizard.step1-upload');
    }
}

<?php

namespace App\Livewire\Wizard;

use Livewire\Component;
use App\Models\Document;

class Step4Preview extends Component
{
    public $fields = [];
    public $context = '';

    protected $listeners = ['fieldsUpdated' => 'setFields'];

    public function setFields($data)
    {
        $this->fields = $data;
    }

    public function save()
    {
        Document::create([
            'context' => $this->context,
            'extracted_fields' => $this->fields,
            'status' => 'processed'
        ]);

        session()->flash('message', 'Document processed successfully!');
        return redirect()->route('documents.index');
    }

    public function render()
    {
        return view('livewire.wizard.step4-preview');
    }
}

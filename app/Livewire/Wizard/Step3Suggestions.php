<?php

namespace App\Livewire\Wizard;

use Livewire\Component;
use App\DTOs\ExtractedFieldDTO;

class Step3Suggestions extends Component
{
    public $fields = [];
    public $formData = [];

    protected $listeners = ['extractionComplete' => 'setFields'];

    public function setFields($data)
    {
        $this->fields = collect($data)->map(function ($value, $key) {
            return new ExtractedFieldDTO(
                key: $key,
                value: is_array($value) ? implode(', ', $value) : $value,
                label: ucwords(str_replace('_', ' ', $key)),
                type: is_array($value) ? 'textarea' : 'text'
            );
        })->toArray();

        $this->formData = $data;
    }

    public function submit()
    {
        // Changed emitUp to dispatch
        $this->dispatch('fieldsUpdated', data: $this->formData);
    }

    public function render()
    {
        return view('livewire.wizard.step3-suggestions');
    }
}

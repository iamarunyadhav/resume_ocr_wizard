<?php

namespace App\Livewire;

use Livewire\Component;

class WizardContainer extends Component
{
    public $currentStep = 1;
    public $totalSteps = 4;
    public $fileData = [];
    public $extractedData = [];

    protected $listeners = [
        'fileUploaded' => 'handleFileUpload',
        'extractionComplete' => 'handleExtractionComplete',
        'fieldsUpdated' => 'handleFieldsUpdated'
    ];

    public function nextStep()
    {
        if ($this->currentStep < $this->totalSteps) {
            $this->currentStep++;
        }
    }

    public function prevStep()
    {
        if ($this->currentStep > 1) {
            $this->currentStep--;
        }
    }

    public function handleFileUpload($data)
    {
        $this->fileData = $data;
        $this->nextStep();
    }

    public function handleExtractionComplete($data)
    {
        $this->extractedData = $data;
        $this->nextStep();
    }

    public function handleFieldsUpdated($data)
    {
        $this->extractedData = array_merge($this->extractedData, $data);
        $this->nextStep();
    }

    public function render()
    {
        return view('livewire.wizard-container', [
            'stepComponent' => $this->getStepComponent(),
        ]);
    }

    protected function getStepComponent()
    {
        return match($this->currentStep) {
            1 => 'wizard.step1-upload',
            2 => 'wizard.step2-review',
            3 => 'wizard.step3-suggestions',
            4 => 'wizard.step4-preview',
            default => 'wizard.step1-upload',
        };
    }
}

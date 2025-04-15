<?php

namespace App\Livewire\Wizard;

use Livewire\Component;
use App\Services\DocumentExtractor;

class Step2Review extends Component
{
    public $extractedText = '';
    public $extractedData = []; // Add this line
    public $isProcessing = false;

    protected $listeners = ['fileUploaded' => 'processFile'];

    public function processFile($fileData)
    {
        $this->isProcessing = true;

        try {
            $extractor = app(DocumentExtractor::class);
            $result = $extractor->processDocument(
                storage_path('app/' . $fileData['path']),
                $fileData['extension'],
                $fileData['context']
            );

            $this->extractedText = json_encode($result, JSON_PRETTY_PRINT);
            $this->extractedData = $result; // Store the structured data
            $this->dispatch('extractionComplete', data: $result);
        } catch (\Exception $e) {
            $this->addError('processing', $e->getMessage());
        } finally {
            $this->isProcessing = false;
        }
    }

    public function render()
    {
        return view('livewire.wizard.step2-review', [
            'extractedData' => $this->extractedData // Explicitly pass to view
        ]);
    }
}

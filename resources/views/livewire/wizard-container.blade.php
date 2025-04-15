<!-- wizard-container.blade.php -->
<div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Document Wizard</h1>

    <!-- Progress Steps -->
    <div class="mb-8">
        <div class="flex justify-between">
            @foreach(range(1, $totalSteps) as $step)
                <div class="flex flex-col items-center">
                    <div class="w-10 h-10 rounded-full flex items-center justify-center
                        {{ $currentStep >= $step ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-600' }}">
                        {{ $step }}
                    </div>
                    <span class="text-xs mt-1">
                        {{ match($step) {
                            1 => 'Upload',
                            2 => 'Review',
                            3 => 'Edit',
                            4 => 'Submit',
                            default => 'Step ' . $step,
                        } }}
                    </span>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Step Content -->
    <div class="step-content p-4 border rounded-lg bg-gray-50">
        @livewire($stepComponent, key($currentStep))
    </div>

    <!-- Navigation -->
    <div class="mt-6 flex justify-between">
        @if($currentStep > 1)
            <button wire:click="prevStep"
                    class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                Back
            </button>
        @else
            <div></div>
        @endif

        @if($currentStep < $totalSteps)
            <button wire:click="nextStep"
                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 ml-auto">
                Next
            </button>
        @endif
    </div>
</div>

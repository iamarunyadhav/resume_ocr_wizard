<!-- step3-suggestions.blade.php -->
<div>
    <h2 class="text-xl font-semibold mb-4">Edit Extracted Fields</h2>

    <div class="space-y-4">
        @foreach($fields as $field)
            <div class="flex flex-col">
                <label class="block text-gray-700 mb-1 font-medium">{{ $field->label }}</label>
                @if($field->type === 'textarea')
                    <textarea wire:model="formData.{{ $field->key }}"
                        class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        rows="3"></textarea>
                @else
                    <input type="{{ $field->type }}"
                        wire:model="formData.{{ $field->key }}"
                        class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                @endif
                @error("formData.{$field->key}")
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
        @endforeach
    </div>

    <div class="mt-6 flex justify-between">
        <button wire:click="submit"
                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
            Save and Continue
        </button>
    </div>
</div>

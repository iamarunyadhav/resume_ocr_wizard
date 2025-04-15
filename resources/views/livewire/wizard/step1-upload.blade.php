<!-- step1-upload.blade.php -->

<div>
    <h2 class="text-xl font-semibold mb-4">Upload Document</h2>

    <div class="mb-4">
        <label class="block text-gray-700 mb-2">Document Type</label>
        <select wire:model="context" class="w-full border rounded px-3 py-2">
            @foreach($contexts as $value => $label)
                <option value="{{ $value }}">{{ $label }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 mb-2">Document File</label>
        <input type="file" wire:model="file" class="w-full border rounded px-3 py-2">
        @error('file') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <button wire:click="submit" wire:loading.attr="disabled"
        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
        Upload and Process
    </button>
</div>

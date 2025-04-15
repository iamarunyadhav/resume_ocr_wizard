<!-- step4-preview.blade.php -->
<div>
    <h2 class="text-xl font-semibold mb-4">Preview and Submit</h2>

    <div class="bg-gray-100 p-4 rounded-md">
        <ul class="space-y-2">
            @foreach($fields as $key => $value)
                <li>
                    <span class="font-semibold">{{ ucwords(str_replace('_', ' ', $key)) }}:</span>
                    <span>{{ is_array($value) ? implode(', ', $value) : $value }}</span>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="mt-6 flex justify-between">
        <button wire:click="save" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
            Submit Document
        </button>
    </div>
</div>

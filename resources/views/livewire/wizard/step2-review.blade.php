<div>
    <h2 class="text-xl font-semibold mb-4">Extracted Text Review</h2>

    @if($isProcessing)
        <div class="text-center py-8">
            <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-600 mx-auto mb-4"></div>
            <p>Processing document...</p>
        </div>
    @else
        <div class="bg-gray-100 p-4 rounded-md max-h-96 overflow-y-auto">
            @if(!empty($extractedData))
                <div class="space-y-2">
                    @foreach($extractedData as $key => $value)
                        <div class="flex">
                            <span class="font-semibold w-1/3">{{ ucwords(str_replace('_', ' ', $key)) }}:</span>
                            <span class="w-2/3 break-words">
                                @if(is_array($value))
                                    {{ json_encode($value) }}
                                @else
                                    {{ $value }}
                                @endif
                            </span>
                        </div>
                    @endforeach
                </div>
            @else
                <pre class="text-sm whitespace-pre-wrap">{{ $extractedText }}</pre>
            @endif
        </div>
    @endif
</div>

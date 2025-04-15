<?php

namespace App\Services\AI;

use Illuminate\Support\Facades\Http;

class DeepSeekService implements AIServiceInterface
{
    public function extractFields(string $text, string $context): array
    {
        $prompt = $this->buildPrompt($text, $context);

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('DEEPSEEK_API_KEY'),
        ])->post('https://api.deepseek.com/v1/chat/completions', [
            'model' => 'deepseek-chat',
            'messages' => [
                ['role' => 'system', 'content' => 'You are an AI that extracts structured information from documents.'],
                ['role' => 'user', 'content' => $prompt],
            ],
            'temperature' => 0.2,
        ]);

        if ($response->successful()) {
            $content = $response->json();
            $jsonText = $content['choices'][0]['message']['content'] ?? '{}';
            return json_decode($jsonText, true) ?: [];
        }

        return [];
    }

    protected function buildPrompt(string $text, string $context): string
    {
        $promptTemplates = [
            'resume' => <<<EOT
            Extract structured fields from this resume:
            - name
            - email
            - phone
            - skills
            - experience
            - education
            Resume Text:
            {$text}
            EOT,
            'property' => <<<EOT
            Extract property details:
            - address
            - price
            - bedrooms
            - bathrooms
            - square_footage
            - amenities
            Document Text:
            {$text}
            EOT,
            // Add more contexts as needed
        ];

        return $promptTemplates[$context] ?? $text;
    }
}

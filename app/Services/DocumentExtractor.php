<?php

namespace App\Services;

use App\Services\OCR\OCRServiceInterface;
use App\Services\AI\AIServiceInterface;

class DocumentExtractor
{
    public function __construct(
        private OCRServiceInterface $ocrService,
        private AIServiceInterface $aiService
    ) {}

    public function processDocument(string $filePath, string $extension, string $context): array
    {
        $text = $this->ocrService->extractText($filePath, $extension);
        return $this->aiService->extractFields($text, $context);
    }
}

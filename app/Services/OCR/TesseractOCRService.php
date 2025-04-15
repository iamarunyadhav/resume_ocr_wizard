<?php

namespace App\Services\OCR;

use thiagoalessio\TesseractOCR\TesseractOCR;

class TesseractOCRService implements OCRServiceInterface
{
    public function extractText(string $filePath, string $extension): string
    {
        return (new TesseractOCR($filePath))->run();
    }
}

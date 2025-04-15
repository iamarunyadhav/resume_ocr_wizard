<?php

namespace App\Providers;

use App\Services\AI\AIServiceInterface;
use App\Services\AI\DeepSeekService;
use App\Services\OCR\OCRServiceInterface;
use App\Services\OCR\TesseractOCRService;
use Illuminate\Support\ServiceProvider;

class ServiceBinderProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(OCRServiceInterface::class, TesseractOCRService::class);
        $this->app->bind(AIServiceInterface::class, DeepSeekService::class);
    }
}

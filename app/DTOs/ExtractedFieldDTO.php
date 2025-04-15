<?php

namespace App\DTOs;

class ExtractedFieldDTO
{
    public function __construct(
        public readonly string $key,
        public readonly mixed $value,
        public readonly string $label,
        public readonly string $type = 'text'
    ) {}
}

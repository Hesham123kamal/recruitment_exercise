<?php

namespace App\DTOs;

class PhoneAnalysisDTO
{
    public function __construct(
        private string $countryName,
        private string $countryCode,
        private bool $isValid
    ) {}

    public function getCountryName(): string
    {
        return $this->countryName;
    }

    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    public function isValid(): bool
    {
        return $this->isValid;
    }

    public function toArray(): array
    {
        return [
            'country_name' => $this->countryName,
            'country_code' => $this->countryCode,
            'is_valid' => $this->isValid,
        ];
    }
}

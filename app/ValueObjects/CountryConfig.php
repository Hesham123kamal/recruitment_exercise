<?php

namespace App\ValueObjects;

class CountryConfig
{
    public function __construct(
        private string $name,
        private string $code,
        private string $regex
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getRegex(): string
    {
        return $this->regex;
    }

    // Validate Customer Phone Number Without Library
    public function matches(string $phoneNumber): bool
    {
        return preg_match($this->regex, $phoneNumber) === 1;
    }
}

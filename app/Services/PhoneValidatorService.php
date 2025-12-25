<?php

namespace App\Services;

use App\DTOs\PhoneAnalysisDTO;
use App\ValueObjects\CountryConfig;

class PhoneValidatorService
{
    private array $countries;

    public function __construct()
    {
        $this->initializeCountries();
    }

    private function initializeCountries(): void
    {
        $this->countries = [
            new CountryConfig('Cameroon', '+237', '/^\(237\)\ ?[2368]\d{7,8}$/'),
            new CountryConfig('Ethiopia', '+251', '/^\(251\)\ ?[1-59]\d{8}$/'),
            new CountryConfig('Morocco', '+212', '/^\(212\)\ ?[5-9]\d{8}$/'),
            new CountryConfig('Mozambique', '+258', '/^\(258\)\ ?[28]\d{7,8}$/'),
            new CountryConfig('Uganda', '+256', '/^\(256\)\ ?\d{9}$/'),
        ];
    }

    public function validate(string $phoneNumber): PhoneAnalysisDTO
    {

        foreach ($this->countries as $country) {
            if ($country->matches($phoneNumber)) {
                return new PhoneAnalysisDTO(
                    $country->getName(),
                    $country->getCode(),
                    true
                );
            }
        }

        $extractCountryData = $this->extractCountryFromPhoneNumber($phoneNumber);

        return new PhoneAnalysisDTO(
            $extractCountryData['name'],
            $extractCountryData['code'],
            false
        );
    }

    private function extractCountryFromPhoneNumber(string $phoneNumber)
    {
        if (preg_match('/^\((\d{3})\)/', $phoneNumber, $matches)) {
            $countryCodeNumber = $matches[1];
            foreach ($this->countries as $country) {
                $code = str_replace('+', '', $country->getCode());
                if ($code === $countryCodeNumber) {
                    return [
                        'name' => $country->getName(),
                        'code' => $country->getCode(),
                    ];
                }
            }
        }
    }
}

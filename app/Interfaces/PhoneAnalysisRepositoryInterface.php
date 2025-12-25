<?php

namespace App\Interfaces;

use App\Models\PhoneAnalysis;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface PhoneAnalysisRepositoryInterface
{
    public function createOrUpdate(int $customerId, array $data): PhoneAnalysis;

    public function getPaginatedWithFilters(
        string $country,
        string $state,
        int $perPage = 15
    ): LengthAwarePaginator;

    public function getCountryList(): array;
}

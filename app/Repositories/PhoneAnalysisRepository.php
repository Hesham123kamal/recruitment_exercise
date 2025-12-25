<?php

namespace App\Repositories;

use App\Interfaces\PhoneAnalysisRepositoryInterface;
use App\Models\PhoneAnalysis;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PhoneAnalysisRepository implements PhoneAnalysisRepositoryInterface
{

    public function __construct(
        private PhoneAnalysis $model
    ) {}

    public function createOrUpdate(int $customerId, array $data): PhoneAnalysis
    {
        return $this->model->updateOrCreate(
            ['customer_id' => $customerId],
            $data
        );
    }

    public function getPaginatedWithFilters(
         $country,
         $state,
         $perPage = 15
    ): LengthAwarePaginator {
        $query = $this->model
            ->with('customer')
            ->orderBy('id');

        if ($country) {
            $query->where('country_name', $country);
        }

        if ($state !== null) {
            $isValid = $state === 'OK';
            $query->where('is_valid', $isValid);
        }

        return $query->paginate($perPage);
    }

    public function getCountryList(): array
    {
        return $this->model
            ->whereNotNull('country_name')
            ->distinct()
            ->pluck('country_name')
            ->sort()
            ->values()
            ->toArray();
    }
}

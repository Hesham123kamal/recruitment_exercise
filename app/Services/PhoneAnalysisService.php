<?php

namespace App\Services;

use App\Models\Customer;
use App\Repositories\PhoneAnalysisRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PhoneAnalysisService
{
    public function __construct(
        private PhoneValidatorService $validatorService,
        private PhoneAnalysisRepository $repository
    ) {}

    public function analyzeAllCustomers()
    {
        try {
            DB::beginTransaction();
            Customer::chunk(100, function ($customers) {
                foreach ($customers as $customer) {
                    $this->analyzeCustomer($customer);
                }
            });
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Phone Analysis Failed: ' . $exception->getMessage());
            throw $exception;
        }
    }

    public function analyzeCustomer(Customer $customer): void
    {
        $analysisDTO = $this->validatorService->validate($customer->phone);
        $this->repository->createOrUpdate(
            $customer->id,
            $analysisDTO->toArray()
        );
    }
}

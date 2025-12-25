<?php

namespace App\Http\Controllers;

use App\Repositories\PhoneAnalysisRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PhoneNumberAnalysisController extends Controller
{
    public function __construct(
        private PhoneAnalysisRepository $repository
    ) {}

    public function index(Request $request): View
    {
        $validated = $request->validate([
            'country' => 'nullable|string',
            'state' => 'nullable|in:OK,NOK',
        ]);

        $country = $validated['country'] ?? null;
        $state = $validated['state'] ?? null;

        $phoneNumbers = $this->repository->getPaginatedWithFilters(
            $country,
            $state,
            15
        );

        $countries = $this->repository->getCountryList();

        return view('phone-numbers.index', compact(
            'phoneNumbers',
            'countries',
            'country',
            'state'
        ));
    }
}

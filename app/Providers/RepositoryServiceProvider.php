<?php

namespace App\Providers;

use App\Interfaces\PhoneAnalysisRepositoryInterface;
use App\Repositories\PhoneAnalysisRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            PhoneAnalysisRepositoryInterface::class,
            PhoneAnalysisRepository::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

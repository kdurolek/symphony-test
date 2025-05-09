<?php

namespace App\Providers;

use App\Contracts\Repositories\PetRepositoryInterface;
use App\Repositories\APIs\PetRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind(PetRepositoryInterface::class, function () {
            return new PetRepository(env('API_URL_DOG'), env('API_DOG'));
        });
    }
}

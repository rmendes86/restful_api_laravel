<?php

namespace App\Providers;

use App\Repository\World\CityRepository;
use App\Repository\World\CountryRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('countryRepository', function () { return new CountryRepository(); });
        $this->app->singleton('cityRepository', function () { return new CityRepository(); });
    }
}

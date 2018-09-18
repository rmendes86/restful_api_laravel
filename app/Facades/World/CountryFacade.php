<?php

namespace App\Facades\World;

use Illuminate\Support\Facades\Facade;

/**
 * Class CountryFacade
 * @package App\Facades
 */
class CountryFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string class model
     */
    protected static function getFacadeAccessor()
    {
        return 'countryRepository';
    }
}

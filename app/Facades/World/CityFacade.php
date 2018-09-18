<?php

namespace App\Facades\World;

use Illuminate\Support\Facades\Facade;

/**
 * Class CityFacade
 * @package App\Facades\World
 */
class CityFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string class model
     */
    protected static function getFacadeAccessor()
    {
        return 'cityRepository';
    }
}

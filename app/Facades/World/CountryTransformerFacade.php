<?php

namespace App\Facades\World;

use Illuminate\Support\Facades\Facade;

/**
 * Class CountryTransformerFacade
 * @package App\Facades\World
 */
class CountryTransformerFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string class model
     */
    protected static function getFacadeAccessor()
    {
        return 'countryTransformer';
    }
}

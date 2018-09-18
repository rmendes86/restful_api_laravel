<?php

namespace App\Facades\World;

use Illuminate\Support\Facades\Facade;

/**
 * Class CityTransformerFacade
 * @package App\Facades\World
 */
class CityTransformerFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string class model
     */
    protected static function getFacadeAccessor()
    {
        return 'cityTransformer';
    }
}

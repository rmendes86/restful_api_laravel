<?php

namespace App\Http\Controllers\World;

use App\Http\Controllers\ApiController;
use CityTransformerFacade;
use CityFacade;
use Validator;

/**
 * Class CountryCityController
 * @package App\Http\Controllers\World
 */
class CountryCityController extends ApiController
{
    /**
     * Show
     *
     * @param $id
     *
     * @return mixed
     */
    public function show($id)
    {
        $collection = CityFacade::all(['CountryCode' => $id]);

        return $this->respondSuccess(CityTransformerFacade::transformCollection($collection));
    }
}

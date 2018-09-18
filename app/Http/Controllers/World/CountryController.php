<?php

namespace App\Http\Controllers\World;

use App\Http\Controllers\ApiController;
use CountryFacade;
use CountryTransformerFacade;
use Illuminate\Support\MessageBag;
use Validator;

/**
 * Class CountryController
 * @package App\Http\Controllers\World
 */
class CountryController extends ApiController
{
    /**
     * Index
     *
     * @return mixed
     */
    public function index()
    {
        $collection = CountryFacade::all();
        return $this->respondSuccess(CountryTransformerFacade::transformCollection($collection));
    }

    /**
     * Show
     *
     * @param $id
     *
     * @return mixed
     */
    public function show($id)
    {
        $validator = Validator::make(
            ['code' => $id],
            [
                'code' => 'required|string|exists:country,Code'
            ]
        );

        if ($validator->fails()) {
            return $this->respondNotFound();
        }

        $model = CountryFacade::find($id);

        return $model instanceof MessageBag
            ? $this->respondNotFound()
            : $this->respondSuccess(CountryTransformerFacade::transform($model));
    }
}

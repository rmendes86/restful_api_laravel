<?php

namespace App\Http\Controllers\World;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use CityFacade;
use CityTransformerFacade;
use Validator;
use Illuminate\Support\MessageBag;

class CityController extends ApiController
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
        $validator = Validator::make(
            ['id' => $id],
            [
                'id' => 'required|integer|exists:city,ID'
            ]
        );

        if ($validator->fails()) {
            return $this->respondNotFound();
        }

        $model = CityFacade::find($id);

        return $model instanceof MessageBag
            ? $this->respondNotFound()
            : $this->respondSuccess(CityTransformerFacade::transform($model));
    }

    /**
     * Store
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $validator = Validator::make(
            $requestData,
            [
                'Name' => 'required|string',
                'CountryCode' => 'required|integer',
                'District' => 'required|string',
                'Population' => 'required|integer'
            ]
        );

        if ($validator->fails()) {
            return $this->respondUnprocessableEntity($validator->errors()->toArray());
        }

        $model = CityFacade::save($requestData);

        return $model instanceof MessageBag
            ? $this->respondInternalError()
            : $this->respondSuccess(CityTransformerFacade::transform($model), 'City successfully created');
    }

    /**
     * Destroy
     *
     * @param $id
     *
     * @return mixed
     */
    public function destroy($id)
    {
        $validator = Validator::make(
            ['id' => $id],
            [
                'id' => 'required|integer|exists:city,ID'
            ]
        );

        if ($validator->fails()) {
            return $this->respondNotFound();
        }

        return ! (CityFacade::delete($id) instanceof MessageBag)
            ? $this->respondSuccess([], 'City successfully deleted')
            : $this->respondInternalError();
    }
}

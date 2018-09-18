<?php

namespace App\Transformer\World;

use App\Model\World\City;
use App\Transformer\AbstractTransformer;

/**
 * Class CityTransformer
 * @package App\Transformer\World
 */
class CityTransformer extends AbstractTransformer
{
    /**
     * Transform
     *
     * @param $model
     *
     * @return mixed
     */
    public function transform($model)
    {
        /**
         * @var $model City
         */
        return [
            'id' => $model->ID,
            'cityName' => $model->Name,
            'countryCode' => $model->CountryCode,
            'district' => $model->District,
            'population' => $model->Population
        ];
    }
}

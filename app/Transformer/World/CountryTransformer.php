<?php

namespace App\Transformer\World;

use App\Model\World\Country;
use App\Transformer\AbstractTransformer;

/**
 * Class CountryTransformer
 * @package App\Transformer\World
 */
class CountryTransformer extends AbstractTransformer
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
         * @var $model Country
         */
        return [
            'countryCode' => $model->Code,
            'name' => $model->Name,
            'continent' => $model->Continent,
            'region' => $model->Region
        ];
    }
}

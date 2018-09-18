<?php

namespace App\Repository\World;

use App\Repository\AbstractRepository;

/**
 * Class CityRepository
 * @package App\Repository\World
 */
class CityRepository extends AbstractRepository
{
    /**
     * Set a model class
     *
     * @return string
     */
    public function model()
    {
        return 'App\Model\World\City';
    }
}

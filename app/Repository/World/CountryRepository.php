<?php

namespace App\Repository\World;

use App\Repository\AbstractRepository;

/**
 * Class CountryRepository
 * @package App\Repository\World
 */
class CountryRepository extends AbstractRepository
{
    /**
     * Set a model class
     *
     * @return string
     */
    public function model()
    {
        return 'App\Model\World\Country';
    }
}

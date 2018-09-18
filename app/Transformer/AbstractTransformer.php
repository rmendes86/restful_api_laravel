<?php

namespace App\Transformer;

use Carbon\Carbon;
use Illuminate\Support\Collection;

abstract class AbstractTransformer
{
    /**
     * Transform
     *
     * @param $model
     *
     * @return mixed
     */
    public abstract function transform($model);

    /**
     * Transform Collection
     *
     * @param Collection $collection
     *
     * @return array
     */
    public function transformCollection(Collection $collection)
    {
        $collectionToReturn = [];
        foreach ($collection as $model) {
            $collectionToReturn[] = $this->transform($model);
        }

        return $collectionToReturn;
        //return array_map([$this, 'transform'], $collection->toArray());
    }

    /**
     * Format Date
     *
     * @param Carbon|null $date
     *
     * @return null|string
     */
    public function formatDate(Carbon $date = null)
    {
        return $date ? $date->toIso8601String() : null;
    }
}

<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\MessageBag;

/**
 * Class RepositoryInterface
 * @package App\Repository
 */
interface RepositoryInterface
{
    /**
     * Save Object into database
     *
     * @param array $data
     *
     * @return MessageBag|Model
     */
    public function save(array $data);

    /**
     * Find by id
     *
     * @param $id
     *
     * @return Model
     */
    public function find($id);

    /**
     * Get All Data
     *
     * @return mixed
     */
    public function all();
}

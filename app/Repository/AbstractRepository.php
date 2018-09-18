<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use Illuminate\Support\MessageBag;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Exception;

abstract class AbstractRepository
{
    /**
     * @var Model $model
     */
    protected $model;

    /**
     * DbRepository constructor.
     */
    public function __construct()
    {
        $this->makeModel();
    }

    /**
     * Set a model class
     *
     * @return string
     */
    public abstract function model();

    /**
     * Save Object into database
     *
     * @param array $data
     *
     * @return MessageBag| Model
     */
    public function save(array $data)
    {
        try {
            return $this->model->fill($data)->save();
        } catch (\Exception $e) {
            return new MessageBag(['Exception' => $e->getMessage()]);
        }
    }

    /**
     * Find by id
     *
     * @param $id
     *
     * @return Model
     */
    public function find($id)
    {
        $model = $this->model->find($id);

        return empty($model)
            ? new MessageBag(['Exception' => 'Entity Not Found'])
            : $model;
    }

    /**
     * Get All Data
     *
     * @param array $criteria
     * @param integer $limit
     * @param integer $offset
     *
     * @return EloquentCollection|static[]
     */
    public function all(array $criteria = [], $limit = null, $offset = null)
    {
        if (!empty($criteria)) {
            $query = $this->model->query();
            foreach($criteria as $key => $value) {
                $query->where($key, '=', $value);
            }
            return $this->toEntityCollection($query->get());
        } else {
            return $this->toEntityCollection($this->model->all());
        }
    }

    /**
     * Delete by id
     *
     * @param $id
     *
     * @return boolean | MessageBag
     */
    public function delete($id)
    {
        $model = $this->model->find($id);

        return empty($model)
            ? new MessageBag(['Exception' => 'Entity Not Found'])
            : $model->delete();
    }

    /**
     * To Entity Collection
     *
     * @param EloquentCollection $data
     *
     * @return Collection
     */
    public function toEntityCollection(EloquentCollection $data)
    {
        $collection = new Collection();

        $data->each(function ($item) use ($collection) {
            $collection->push($item);
        });

        return $collection;
    }

    /**
     * Make model
     *
     * @return Model
     *
     * @throws Exception
     */
    protected function makeModel()
    {
        $model = App::make($this->model());

        if (!$model instanceof Model) {
            throw new Exception("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }

        return $this->model = $model;
    }
}

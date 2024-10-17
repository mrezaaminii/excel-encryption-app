<?php

namespace App\Repositories;

use App\Contracts\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements BaseRepositoryInterface
{
    private Model $model;
    public function __construct(Model $model) {
        $this->model = $model;
    }
    public function getAll(){
        return $this->model->query()->latest()->get();
    }
    public function storeData(array $resource){
        return $this->model->query()->create($resource);
    }
    public function findById(int $id){
        return $this->model->query()->findOrFail($id);
    }

    public function findBy(string $field, $value, $operator = '=')
    {
        return $this->model->query()->where($field, $operator , $value);
    }

    public function updateData(int $id, array $resource){
        return $this->model->query()->findOrFail($id)->update($resource);
    }
    public function deleteData(int $id){
        return $this->model->query()->findOrFail($id)->delete();
    }
}

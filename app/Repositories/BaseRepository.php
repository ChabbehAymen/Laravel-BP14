<?php
namespace App\Repositories;

use App\Repositories\contrats\RepositoriesInterface;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements RepositoriesInterface
{
    protected Model $model;
    public function __construct(Model $model)
    {
        return $this->model = $model;
    }

    public function get()
    {
         return $this->model->query()->get();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $record = $this->model->find($id);
        if ($record == null) return false;
        return $record->update($data);
    }

    public function find(int $id)
    {
        return $this->model->find($id);
    }

}

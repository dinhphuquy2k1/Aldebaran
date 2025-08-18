<?php

namespace Src\Infrastructure\Shared\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Src\Domain\Shared\Repositories\IBaseRepository;

abstract class BaseRepository implements IBaseRepository
{
    public function __construct(
        protected readonly Model $model
    )
    {
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findById(int $id): mixed
    {
        return $this->model->find($id);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data): mixed
    {
        return $this->model->create($data);
    }

    /**
     * @param int $id
     * @param array $data
     * @return mixed
     */
    public function update(int $id, array $data): mixed
    {
        return $this->model->where('id', $id)->update($data);
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        return $this->model->where('id', $id)->delete();
    }
}

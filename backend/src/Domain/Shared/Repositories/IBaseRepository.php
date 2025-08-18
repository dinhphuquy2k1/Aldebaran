<?php

namespace Src\Domain\Shared\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface IBaseRepository
{
    /**
     * Get all
     * @return mixed
     */
    public function all(): Collection;

    /**
     * Get one
     * @param int $id
     * @return mixed
     */
    public function findById(int $id): mixed;

    /**
     * Create
     * @param array $data
     * @return mixed
     */
    public function create(array $data): mixed;

    /**
     * Update
     * @param int $id
     * @param array $data
     * @return mixed
     */
    public function update(int $id, array $data): mixed;

    /**
     * Delete
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool;
}

<?php

namespace App\Contracts;

use Exception;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;

interface IRepository
{
    /**
     * Return model instance.
     *
     * @return Model
     */
    public function getModel(): Model;

    /**
     * Find data by id
     *
     * @param mixed $id
     * @param array $columns
     *
     * @return Model|Collection
     */
    public function find($id, array $columns = ['*']);

    /**
     * Find a model by its primary key or throw an exception.
     *
     * @para string $id
     *
     * @param $id
     * @return Model
     *
     * @throws ModelNotFoundException
     */
    public function findOrFail($id): Model;

    /**
     * Find data by field and value
     *
     * @param       $field
     * @param       $value
     * @param array $columns
     *
     * @return Model|Collection
     */
    public function findBy($field, $value, array $columns = ['*']);

    /**
     * Retrieve all data of repository
     *
     * @param array $columns
     *
     * @return Collection
     */
    public function all(array $columns = ['*']): Collection;

    /**
     * Retrieve all data of repository, paginated
     *
     * @param int|null $per_page
     * @param array $columns
     *
     * @return Paginator
     */
    public function simplePaginate(int $per_page = null, array $columns = ['*']): Paginator;

    /**
     * Save a new entity in repository
     *
     * @param array $attributes
     *
     * @return Model|bool
     */
    public function create(array $attributes);

    /**
     * Update an entity with the given attributes and persist it
     *
     * @param Model $entity
     * @param array $attributes
     *
     * @return bool
     */
    public function update(Model $entity, array $attributes): bool;

    /**
     * Delete a entity in repository
     *
     * @param mixed $entity
     *
     * @return bool|null
     *
     * @throws Exception
     */
    public function delete($entity): ?bool;
}

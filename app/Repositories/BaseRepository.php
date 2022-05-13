<?php

namespace App\Repositories;

use App\Contracts\IRepository;
use Exception;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;

abstract class BaseRepository implements IRepository
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * @var Builder
     */
    protected $query;

    /**
     * Create a new Repository instance
     *
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Return model instance.
     *
     * @return Model
     */
    public function getModel(): Model
    {
        return $this->model;
    }

    /**
     * Get a new query builder instance with the applied
     * the order by and scopes.
     *
     * @return self
     */
    public function newQuery(): BaseRepository
    {
        $this->query = $this->model->newInstance()->newQuery();

        return $this;
    }

    /**
     * Find data by its primary key.
     *
     * @param mixed $id
     * @param array $columns
     *
     * @return Model|Collection
     */
    public function find($id, array $columns = ['*'])
    {
        $this->newQuery();

        return $this->query->find($id, $columns);
    }

    /**
     * Find a model by its primary key or throw an exception.
     *
     * @param string $id
     * @param array $columns
     *
     * @return Model
     *
     * @throws ModelNotFoundException
     */
    public function findOrFail($id, array $columns = ['*']): Model
    {
        $this->newQuery();

        return $this->query->findOrFail($id, $columns);
    }

    /**
     * Find data by field and value
     *
     * @param string $field
     * @param string $value
     * @param array $columns
     *
     * @return Model
     */
    public function findBy($field, $value, array $columns = ['*']): Model
    {
        $this->newQuery();

        return $this->query->where($field, '=', $value)->first($columns);
    }

    /**
     * Retrieve all data of repository
     *
     * @param array $columns
     *
     * @return Collection
     */
    public function all(array $columns = ['*']): Collection
    {
        $this->newQuery();

        return $this->query->get($columns);
    }

    /**
     * Retrieve all data of repository, paginated
     *
     * @param int|null $per_page
     * @param array $columns
     * @param string $page_name
     * @param null $page
     * @return Paginator
     */
    public function simplePaginate($per_page = null, array $columns = ['*'],
                                   string $page_name = 'page', $page = null): Paginator
    {
        $this->newQuery();

        // Get the default per page when not set
        $per_page = $per_page ?: 10;

        return $this->query->simplePaginate($per_page, $columns, $page_name, $page);
    }

    /**
     * Save a new entity in repository
     *
     * @param array $attributes
     *
     * @return Model|bool
     */
    public function create(array $attributes)
    {
        $entity = $this->model->newInstance($attributes);

        return $entity->save() ? $entity : false;
    }

    /**
     * Update an entity with the given attributes and persist it
     *
     * @param Model $entity
     * @param array $attributes
     *
     * @return bool
     */
    public function update(Model $entity, array $attributes): bool
    {
        return $entity->update($attributes);
    }

    /**
     * Delete an entity in repository
     *
     * @param mixed $entity
     *
     * @return bool|null
     *
     * @throws Exception
     */
    public function delete($entity): ?bool
    {
        if (($entity instanceof Model) === false) {
            $entity = $this->find($entity);
        }

        return $entity->delete();
    }

    /**
     * @param int $count
     * @return Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function latestUsers(int $count = 10)
    {
        $this->newQuery();

        return $this->query->latest()->limit($count)->get(
            ['id', 'name', 'email', 'postcode', 'created_at']
        );
    }
}

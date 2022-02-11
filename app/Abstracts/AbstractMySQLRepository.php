<?php

namespace App\Abstracts;

use App\Contracts\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Description of AbstractMySQLRepository
 *
 * @author Mohamed Shehata<m.shehata.alex@gmail.com>
 */
abstract class AbstractMySQLRepository implements RepositoryInterface
{

    /**
     * @var Model The model which query will be run against.
     */
    protected $model;

    /**
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @inheritDoc
     */
    public function save(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    /**
     * @inheritDoc
     */
    public function count(): int
    {
        return $this->model->count();
    }

    /**
     * @inheritDoc
     */
    public function latest(): self
    {
        $this->model = $this->model->latest();

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function limit(int $limit): self
    {
        $this->model = $this->model->limit($limit);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function get(array $columns = ['*']): \Illuminate\Database\Eloquent\Collection
    {
        return $this->model->get($columns);
    }
}

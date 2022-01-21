<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of BaseRepository
 *
 * @author ali
 */
class BaseRepository {

    /**
     *
     * @var Model
     */
    protected $model = null;

    /**
     * 
     * @param Model $model
     */
    protected function __construct(Model $model) {
        $this->model = $model;
    }

    public function all() {
        return $this->model->all();
    }

}

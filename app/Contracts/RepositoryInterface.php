<?php

namespace App\Contracts;

/**
 *
 * @author Mohamed Shehata<m.shehata.alex@gmail.com>
 */
interface RepositoryInterface
{
    /**
     * Store model in database and return the instance.
     *
     * @param  array<string, mixed>                 $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function save(array $attributes): \Illuminate\Database\Eloquent\Model;

    /**
     * Count existed models in database
     *
     * @return int
     */
    public function count(): int;

    /**
     * Alias for order by `created_at`
     *
     * @return self
     */
    public function latest(): self;

    /**
     * Limit query result count
     *
     * @return self
     */
    public function limit(int $limit): self;

    /**
     * Get query results
     *
     * @param array $columns Columns to select from database
     * @return  \Illuminate\Database\Eloquent\Collection
     */
    public function get(array $columns = ['*']): \Illuminate\Database\Eloquent\Collection;

}

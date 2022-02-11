<?php

namespace App\Abstracts;

use App\Contracts\RepositoryInterface;

/**
 * Description of AbstractActionService
 *
 * @author Mohamed Shehata<m.shehata.alex@gmail.com>
 */
abstract class AbstractActionService
{

    /**
     *
     * @var RepositoryInterface
     */
    protected $repository;

    /**
     * Create new instance
     * 
     * @param RepositoryInterface $repository
     */
    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Performs the service action
     *
     * @param array $data The data used in executing the service action.
     */
    abstract public function execute($data = []);
}

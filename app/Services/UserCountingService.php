<?php

namespace App\Services;

use App\Abstracts\AbstractActionService;
use App\Repositories\UserRepository;

/**
 * Description of UserCountingService
 *
 * @author Mohamed Shehata<m.shehata.alex@gmail.com>
 */
class UserCountingService extends AbstractActionService
{

    public function __construct(UserRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * @inheritDoc
     */
    public function execute($data = [])
    {
        return $this->repository->count();
    }
}

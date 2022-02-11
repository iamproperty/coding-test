<?php

namespace App\Services;

use App\Abstracts\AbstractActionService;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

/**
 * Description of UserSavingService
 *
 * @author Mohamed Shehata<m.shehata.alex@gmail.com>
 */
class UserSavingService extends AbstractActionService
{

    public function __construct(UserRepository $repository)
    {
        parent::__construct($repository);
    }

    public function execute($userData = [])
    {
        $userData['password'] = Hash::make($userData['password']);

        return $this->repository->save($userData);
    }
}

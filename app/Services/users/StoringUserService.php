<?php

namespace App\Services\users;

use App\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

/**
 * To store user with given valid data
 *
 * Class StoringUserService
 * @package App\Services\users
 * @author Ahmed Helal Ahmed
 */
class StoringUserService
{
    /**
     * @var User
     */
    private $users;

    /**
     * @param User $users
     */
    public function __construct(User $users)
    {
        $this->users = $users;
    }

    /**
     * @param array $data
     * @return bool
     */
    public function execute(array $data): bool
    {
        return $this->users->create(
                array_merge($data, ['password' => Hash::make(Arr::get($data, 'password'))])
            ) instanceof User;
    }
}

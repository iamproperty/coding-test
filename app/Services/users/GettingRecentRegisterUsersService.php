<?php

namespace App\Services\users;

use App\User;

/**
 * Class GettingRecentRegisterUsersService
 * @package App\Services\users
 * @author Ahmed Helal Ahmed
 */
class GettingRecentRegisterUsersService
{
    /**
     * @param int $numberOfUsers
     * @return array
     */
    public function execute(int $numberOfUsers): array
    {
        $headers = User::getHeaders();
        $users = User::select($headers->toArray())->latest()->limit($numberOfUsers)->get();
        $headers = $headers->map(function ($header) {
            return ucfirst($header);
        });
        return compact('headers', 'users');
    }
}

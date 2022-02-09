<?php

/**
 * User: kholoudElkholy
 * Email: kholoudelkholy91@gmail.com
 */
namespace App\Http\Repositories;

use App\Models\User;

class UserRepository  extends BaseRepository
{
    /**
     * UserRepository constructor.
     * @param User $user
     */
    public function __construct(User $user) {
        parent::__construct($user);
    }
}
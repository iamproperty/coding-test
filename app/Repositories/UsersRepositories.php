<?php

namespace App\Repositories;

use App\Models\User;

/**
 * Description of UsersRepositories
 *
 * @author ali
 */
class UsersRepositories extends BaseRepository {

    /**
     * 
     * @param User $user
     */
    public function __construct(User $user) {
        parent::__construct($user);
    }

}

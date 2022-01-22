<?php

namespace App\Services;

use App\Repositories\UsersRepositories;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class CreatingUserService {

    /**
     * 
     * @var UsersRepositories
     */
    private $repo = null;

    public function __construct(UsersRepositories $repo) {
        $this->repo = $repo;
    }

    /**
     * 
     * @param array $inputs
     * @return bool
     */
    public function execute(array $inputs): bool {
        $inputs['password'] = Hash::make($inputs['password']);
        $user = $this->repo->create($inputs);
        return ($user instanceof User);
    }

}

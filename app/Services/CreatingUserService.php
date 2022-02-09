<?php
/**
 * User: kholoudElkholy
 * Email: kholoudelkholy91@gmail.com
 */

namespace App\Services;

use App\Http\Repositories\UserRepository;
use App\Http\Resources\User\UserResource;
use Illuminate\Support\Facades\Hash;

class CreatingUserService
{
    /**
     * @var UserRepository|null
     */
    private $repo = null;

    /**
     * CreatingUserService constructor.
     * @param UserRepository $repo
     */
    public function __construct(UserRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function execute(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        $userObj = $this->repo->create($data);
        return new UserResource($userObj);
    }
}
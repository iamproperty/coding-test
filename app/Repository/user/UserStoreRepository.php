<?php
namespace App\Repository\user;

use App\User;

class UserStoreRepository
{

  /**
   * User
   *
   * @var User $User
   */
  private $User;

  /**
   * __construct
   *
   * @param User $User
   */
  public function __construct(User $User)
  {
    $this->User = $User;
  }

  public function createNewUser($request)
  {
    $this->User->create($request->all());
  }

}

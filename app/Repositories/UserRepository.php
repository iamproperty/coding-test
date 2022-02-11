<?php
namespace App\Repositories;

use App\Abstracts\AbstractMySQLRepository;
use App\User;

/**
 * Description of UserRepository
 *
 * @author Mohamed Shehata<m.shehata.alex@gmail.com>
 */
class UserRepository extends AbstractMySQLRepository
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
}

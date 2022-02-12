<?php

namespace App\Services;

use App\Abstracts\AbstractActionService;
use App\Repositories\UserRepository;

/**
 * Description of RecentUsersListService
 *
 * @author Mohamed Shehata<m.shehata.alex@gmail.com>
 */
class RecentUsersListService extends AbstractActionService
{
    public function __construct(UserRepository $repository)
    {
        parent::__construct($repository);
    }

    public function execute($listInfo = [])
    {
        return $this->repository
                ->latest()
                ->limit($listInfo['count'])
                ->get($this->getSelectionColumns($listInfo));
    }

    private function getSelectionColumns(array $listInfo): array
    {
        return $listInfo['columns'] ?? ['*'];
    }
}

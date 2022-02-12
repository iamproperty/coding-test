<?php

namespace App\Console\Commands;

use App\Services\RecentUsersListService;
use Illuminate\Console\Command;

class ListRecentlyRegisteredUsers extends Command
{
    const USER_COUNT = 10;
    const DISPLAY_COLUMNS = ['id', 'name', 'email', 'postcode', 'created_at'];
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:latest {count?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List the recently registered users';


    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(RecentUsersListService $recentUserService)
    {
        $usersCount = $this->argument('count') ?? self::USER_COUNT;
        $users = $recentUserService->execute([
            'columns' => self::DISPLAY_COLUMNS,
            'count'   => $usersCount
        ]);
        $this->table(array_map('ucfirst', self::DISPLAY_COLUMNS), $users->toArray());

        return 0;
    }
}

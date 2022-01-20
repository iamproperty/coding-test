<?php

namespace App\Console\Commands;

use App\Services\users\GettingRecentRegisterUsersService;
use Illuminate\Console\Command;

class ListRecentlyRegisteredUsersCommand extends Command
{
    const NUMBER_OF_USERS = 5;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'list:recently-registered-users';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List ' . self::NUMBER_OF_USERS . ' recently registered users.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        [
            'headers' => $headers,
            'users' => $users
        ] = (new GettingRecentRegisterUsersService)->execute(self::NUMBER_OF_USERS);
        $this->table($headers, $users);
        return 0;
    }
}

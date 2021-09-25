<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class RecentlyRegisteredUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:list_recently_registered';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'An artisan command to list registered users for the last 24 hours';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        User::whereBetween('created_at', [now()->subDays(1), now()])
            ->get()->each(function ($user) {
                echo "\033[32m UserName: \e[0m $user->name  \033[32m Email: \e[0m $user->email \033[32m Registered: \e[0m $user->created_at \n";

            });
    }
}

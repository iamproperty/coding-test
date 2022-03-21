<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class listRegisteredUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'list-recently-registered-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to list all recently registered users';

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
     * @return int
     */
    public function handle()
    {
        User::whereBetween('created_at', [now()->subMinutes(1440), now()]) ->get()->each(function ($user) {
            echo "\033[32m UserName: \e[0m $user->name  \033[32m Email: \e[0m $user->email \033[32m Registered: \e[0m $user->created_at \n";

        });
    }
}

<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;

class ListUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'list:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'list recently registered users (today)';

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
        $users = User::whereDate('created_at', Carbon::today())->get();

        foreach($users as $user){
            echo "$user->name | $user->email";
        }
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use Illuminate\Support\Facades\Auth;

class RecentUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'recentusers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Displays recently registered users';

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
        //        print_r($getLatestUsers);
        return User::orderBy('created_at','desc')->take(5)->get();
    }
}

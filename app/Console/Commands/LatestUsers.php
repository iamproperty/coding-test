<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class LatestUsers extends Command
{
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
    protected $description = 'List the last 10 user registrations';

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
        User::orderBy('created_at', 'desc')->take($this->argument('count'))->get()->each(function (User $user) {
            $date = $user->created_at->format('d/m/Y');
            $this->info("[{$user->id}:{$user->name}] {$user->postcode} | {$date}");
        });
    }
}

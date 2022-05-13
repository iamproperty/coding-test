<?php

namespace App\Console\Commands;

use App\Services\UserService;
use Illuminate\Console\Command;

class ListRecentlyRegisteredUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:latest {--count=10}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function handle()
    {
        $userService = app()->make(UserService::class);

        $users = $userService->latestUsers($this->option('count'));

        $this->info('Recently Registered Users List');

        $this->table(
            ['Id', 'Name', 'Email', 'Postcode', 'Created At'],
            $users->toArray()
        );

        return 0;
    }
}

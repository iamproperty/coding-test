<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class UsersList extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Listing all the registered users in the system';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle() {
        $data = User::get(['name', 'email', 'postcode'])->toArray();
        if (count($data)) {
            $headers = ['Name', 'Email', 'Postcode'];
            $this->table($headers, $data);
        } else {
            $this->info("No users yet");
        }
        return 0;
    }

}

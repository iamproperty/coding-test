<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class UsersList extends Command
{
    const TABLE_COLUMNS = ['id', 'name', 'email', 'postcode', 'created_at'];

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:list  {limit?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Listing users registered recently with count as optional.';

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
    public function handle(): int
    {

        $data = User::latest()->limit($this->argument('limit'))->get(self::TABLE_COLUMNS)->toArray();
        if (count($data)) {
             $this->table(array_map('ucfirst', self::TABLE_COLUMNS), $data);
        } else {
            $this->info("Didn't find any registered users!");
        }

        $this->info('The users:list command did successfully retrieve last '. count($data) . ' registered users');

        return 0;
    }
}

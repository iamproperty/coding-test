<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class UserList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'recent-users:list {limit?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'list recent ten registered users or the number you insert ';

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
        //

      if($this->argument('limit')){
        $limit = $this->argument('limit');
      } else {
        $limit = 10;
      }
      
      $last_users=  User::orderBy('id', 'desc')->take($limit)->get();

      foreach ($last_users as $user) {
        echo "-----------------------------------\n";
        echo "   id : " . $user->id ."\n";
        echo "   name : " . $user->name ."\n";
        echo "   email : " . $user->email ."\n";
        echo "   postcode : " . $user->postcode ."\n";
        echo "   created_at : " . $user->created_at ."\n";

      }
    }
}

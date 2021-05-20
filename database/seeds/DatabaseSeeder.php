<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Rank;
use App\Answer;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(User::class , 20)->create();
        factory(Rank::class,100)->create();
        factory(Answer::class,100)->create();

    }
}

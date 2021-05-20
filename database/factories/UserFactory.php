<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use App\Answer;
use App\Rank;

use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    $letters = ["H", "M", "O", "G"];;
    return [
        'name' => $faker->name,
        'last_name'=>$faker->lastName,
        'user_type'=>'user',
        'gender'=>rand(0,1)? "female":"male",
        'can_play'=>rand(0,1),
        'can_answer'=>rand(0,1),
        'time'=>rand(1,15),
        'letter'=>$letters[array_rand($letters,1)],
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});


$factory->define(Rank::class, function (Faker $faker) {

    $letters = ["H", "M", "O", "G","P", "N", "B", "A"];

    return [
        'user_id' => User::all()->random()->id,
        'first_person' =>$letters[array_rand($letters,1)],
        'last_person' =>$letters[array_rand($letters,1)],
        'time'=>rand(1,15)
    ];
});

$factory->define(Answer::class, function (Faker $faker) {

    return [
        'user_id' => User::all()->random()->id,
        'result' =>rand(1,5000),
        'time'=>rand(1,15),
        'category'=>rand(1,3)
    ];
});



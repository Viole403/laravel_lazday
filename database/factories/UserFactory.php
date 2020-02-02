<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

// $var = 0.3;
// $txt = "Hallo nama saya yuz";
// $str = preg_replace('/\W\w+\s*(\W*)$/', '$1', $txt);
// echo $str.rand(12,100);

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        // 'username' => $faker->name,

        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'password' => bcrypt(Str::random(10)),
        'remember_token' => Str::random(10),
        'api_token' => Str::random(18),
    ];
});

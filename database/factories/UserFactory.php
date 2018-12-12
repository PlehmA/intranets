<?php

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

$factory->define(App\User::class, function (Faker $faker) {
    return [



        'remember_token' => str_random(10),
        'name' => $faker->name,
        'username' => $faker->lastName,
        'rol_usuario' => $faker->numberBetween($min = 1, $max = 5),
        'num_legajo' => $faker->numberBetween($min = 1, $max = 999),
        'fecha_ingreso' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'fecha_nacimiento' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'puesto' => $faker->catchPhrase,
        'email' => $faker->unique()->safeEmail,
        'foto' => 'fotos/user.jpg',
        'ip_maquina' => '192.168.20.146',
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
    ];
});

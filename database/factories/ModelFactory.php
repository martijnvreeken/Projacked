<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Projacked\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'api_token' => str_random(60)
    ];
});

$factory->define(Projacked\Models\Lead::class, function (Faker\Generator $faker) {
    return [
        'client' => $faker->company,
        'client_name' => $faker->name,
        'client_email' => $faker->email,
        'client_phone' => $faker->phoneNumber,
        'description' => $faker->text()
    ];
});

$factory->define(Projacked\Models\Client::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->company,
        'contact' => $faker->name,
        'code' => $faker->unique()->numberBetween(),
        'debit_number' => $faker->unique()->numberBetween(),
        'coc_number' => $faker->numberBetween(),
        'tax_number' => 'NL'.$faker->numberBetween().'B01',
        'email' => $faker->unique()->safeEmail,
        'phonenumber' => $faker->phoneNumber,
        'mobilenumber' => $faker->phoneNumber,
        'address' => $faker->address,
        'zipcode' => $faker->postcode,
        'city' => $faker->city,
        'country' => $faker->country
    ];
});
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
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Household::class, function (Faker\Generator $faker) {
    return [
        'id' => $faker->randomDigitNotNull,
        'last_name' => $faker->lastName,
        'people' => function () {
            return factory(App\Models\Person::class, 3)->create();
        },
        'home_phone' => $faker->tollFreePhoneNumber,
        'department' => $faker->randomDigitNotNull,
        'connected' => $faker->boolean,
        'plan_to_visit' => $faker->date('Y-m-d H:i:s'),
        'interested_in' => $faker->word,
        'family_notes' => $faker->text,
        'first_contacted' => $faker->date('Y-m-d H:i:s'),
        'point_of_contact' => $faker->word,
        'address1' => $faker->buildingNumber . ' ' . $faker->streetName,
        'address2' => $faker->secondaryAddress,
        'city' => $faker->city,
        'state' => $faker->stateAbbr,
        'zip' => $faker->postcode,
        'user' => 1,
    ];
});


/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Person::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'middle_name' => $faker->firstName,
        'phone_number' => $faker->tollFreePhoneNumber,
        'LifeStage' => $faker->randomDigitNotNull,
        'email' => $faker->email,
        'spiritual_condition' => $faker->randomDigitNotNull,
        'prospect_status' => $faker->randomDigitNotNull,
        'notes' => $faker->text,
        'marital_status' => $faker->randomDigitNotNull,
        'relationship' => $faker->randomDigitNotNull,
        ];
});

<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Person;
use Faker\Generator as Faker;

$factory->define(Person::class, function (Faker $faker) {
    return [
        'salutation' => null,
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'companyid' => function () {
            return factory(App\Company::class)->create()->id;
        },
        'jobtitle' => $faker->word,
        'profiletext' => array_random([$faker->sentence(6),null]),
        'profileimage' => null,
        'language' => $faker->randomElement([0,1]),
        'interestedin' => implode(',', $faker->randomElements(['java','php','c','c++'])),
        'canprovide' => implode(',', $faker->randomElements(['java','php','c','c++'])),
        'user' => function () {
            return factory(App\User::class)->create()->id;
        }
    ];
});

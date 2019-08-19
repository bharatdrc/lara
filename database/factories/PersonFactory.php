<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Person;
use Faker\Generator as Faker;

$factory->define(Person::class, function (Faker $faker) {
    return [
        'salutation' => NULL,
        'firstname' => $faker->firstname,
        'lastname' => $faker->lastname,
        'companyid' =>  => function () {
            return factory(App\Compony::class)->create()->id;
        },
        'jobtitle' => $faker->jobtitle,
        'profiletext' => $faker->profiletext,
        'profileimage' => $faker->profileimage,
        'language' => $faker->language,
        'interestedin' => $faker->interestedin,
        'canprovide' => $faker->canprovide,
        'user' => function () {
            return factory(App\User::class)->create()->id;
        }
    ];
});

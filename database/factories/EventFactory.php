<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Event;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    return [
        'eventname' => $faker->unique()->word,
        'shortname' => $faker->unique()->word,
        'subtitle' => $faker->unique()->word,
        'url' => $faker->url,
        'email' => $faker->safeEmail,
        'titleimage' => null,
        'logo' => $faker->randomElement([0,1]),
        'language' => implode(',', $faker->randomElements(['java','php','c','c++'])),
        'description' => implode(',', $faker->randomElements(['java','php','c','c++'])),
        'customcss' => implode(',', $faker->randomElements(['java','php','c','c++'])),
        'company_id' => function () {
            return factory(App\User::class)->create()->id;
        }
    ];
});

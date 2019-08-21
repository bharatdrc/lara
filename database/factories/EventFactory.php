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
        'titleimage' => $faker->image('public/storage/titleimage', 400, 300, false),
        'logo' => $faker->image('public/storage/logo', 400, 300, false),
        'language' => $faker->randomElement([0,1]),
        'description' => $faker->text(200),
        'customcss' => $faker->text(200),
        'company_id' => function () {
            return App\Company::All()->random(rand(1, 2))->first()->id;
        }
    ];
});

<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'housenumber' => $faker->housenumber,
        'street' => $faker->street,
        'city' => $faker->city,
        'country' => $faker->country,
        'postalcode' => $faker->postalcode,
        'additionalinfo' => $faker->ladditionalinfoanguage,
        
    ];
});

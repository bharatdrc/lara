<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'housenumber' => $faker->buildingNumber,
        'street' => $faker->streetName,
        'city' => $faker->city,
        'country' => $faker->country,
        'postalcode' => $faker->postcode,
        'additionalinfo' => $faker->text(200),
        
    ];
});

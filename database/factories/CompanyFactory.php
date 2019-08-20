<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'companyname' => $faker->unique()->word,
        
        'address' => function () {
            return factory(App\Address::class)->create()->id;
        },
        'invoiceaddress' => function () {
            return factory(App\Address::class)->create()->id;
        },
        
    ];
});

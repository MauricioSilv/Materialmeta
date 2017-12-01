<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Material::class, function (Faker $faker) {
    return [

        'nome'=>$faker->nome,
        'quantidade'=>$faker->quantidade,
        'marca'=>$faker->marca,
    ];
});

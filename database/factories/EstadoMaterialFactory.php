<?php

use Faker\Generator as Faker;

$factory->define(App\EstadoMaterial::class, function (Faker $faker) {
    return [
           'estado_atual' =>$faker->estado_atual,
    ];
});

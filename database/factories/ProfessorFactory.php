<?php

use Faker\Generator as Faker;
use App\Professor;

$factory->define(App\Professor::class, function (Faker $faker) {
    return [
        'nome' =>$faker->streetName,
        'contato' =>$faker->phoneNumber,
        'sexo' =>$faker->sexo,
        'email' =>$faker->email,
        'endereco' =>$faker->address,
        'senha' =>$faker->password,
    ];
});

<?php

use Faker\Generator as Faker;
use App\Professor;

$factory->define(App\Professor::class, function (Faker $faker) {
    return [
        'nome' =>$faker->nome,
        'contato' =>$faker->contato,
        'sexo' =>$faker->sexo,
        'email' =>$faker->email,
        'endereco' =>$faker->endereco,
        'senha' =>$faker->senha,
    ];
});

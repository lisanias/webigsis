<?php

use Faker\Generator as Faker;
use App\Models\Discipulo;
use App\Models\Telefone;

$factory->define(Discipulo::class, function (Faker $faker) {
    $sexo = $faker->randomElement(['male', 'female']);
    $sexAbr = ($sexo == 'male')?'M':'F';
    return [
        'name' => $faker->firstName($sexo).' '.$faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'sexo' => $sexAbr,
        'nascimento_data' => $faker->date(),
        'nascimento_cidade' => $faker->city,
        'encontro' => $faker->randomElement([null, 1]),
        'escolaMinisterios' => $faker->randomElement([null, 1]),
        'batismo' => $faker->randomElement([null, 1]),
        'batismo' => $faker->randomElement([1, 2]),
        'ativo' => 1,
        'logradouro' => $faker->streetName,
        'numero' => $faker->buildingNumber,
        'cidade' => $faker->city,
        'uf' => $faker->stateAbbr,
        'cep' => $faker->postCode,
    ];
});

$factory->define(Telefone::class, function (Faker $faker) {
    $discipulos = Discipulo::get()->pluck('id'); // pegar numeros na home, por exemplo
    
	$ids = array();
    foreach ($discipulos as $discipulo) {
    	array_push($ids, $discipulo);
    }

      return [
        'numero' => $faker->phoneNumber,
        'discipulo_id' => $faker->randomElement( $ids ),
    ];
});
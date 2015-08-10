<?php
$faker->locale('es_AR');
$factory('Deportes\User','usuario', [

	'name' => $faker->firstName(),
	'email' => $faker->lastName,
	'password' => bcrypt("Amex006")
	]);

$factory('Deportes\Actividades\Actividad','actividades', [

    'nombre' => $faker->word,
    'club' => $faker->word,
]);

$factory('Deportes\Profesores\Profesor','profesores', [

    'nombre' => $faker->firstName(),
    'apellido' => $faker->lastName(),
    'actividad_id' => 'factory:actividades'
]);
<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\App\Entities\Product::class, function (Faker\Generator $faker, array $attributes) {
	static $count = 0;

	return [
		'name' => 'widget' . (string)$count++
	];
});

$factory->define(\App\Entities\User::class, function (Faker\Generator $faker, array $attributes) {
	return [
		'name' => $faker->name
	];
});

$factory->define(\App\Entities\Bug::class, function (Faker\Generator $faker, array $attributes) {
	$users = $attributes['users'];
	
	return [
		'description' => $faker->sentence,
		'reporter' => $faker->randomElement($users),
		'engineer' => $faker->randomElement($users)
	];
});
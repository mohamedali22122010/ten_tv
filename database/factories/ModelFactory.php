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

$factory->defineAs(App\User::class,'desk' ,function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => "desk ".$faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt(12345678),
        'remember_token' => str_random(10),
        'status' => 1,
        'confirmed' => 1,
        'role_id' => 2
    ];
});

$factory->defineAs(App\User::class,'doctor' ,function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => "doctor ".$faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt(12345678),
        'remember_token' => str_random(10),
        'status' => 1,
        'confirmed' => 1,
        'role_id' => 3
    ];
});


$factory->defineAs(App\User::class,'hospital' ,function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => "hospital ".$faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt(12345678),
        'remember_token' => str_random(10),
        'status' => 1,
        'confirmed' => 1,
        'role_id' => 4
    ];
});


$factory->defineAs(App\User::class,'company' ,function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => "company ".$faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt(12345678),
        'remember_token' => str_random(10),
        'status' => 1,
        'confirmed' => 1,
        'role_id' => 5
    ];
});
//'title', 'link', 'position', 'expired_at', 'type', 'status';


$factory->define(App\Advertise::class, function (Faker\Generator $faker) {
    $num = $faker->unique()->numberBetween(1,10);
	$type = 0;
	if($num <= 3){
		$type = 1;
	}

    return [
    	'id' => $num,
        'title' => 'اعلان '.$num,
        'position' => $num,
        'type' => $type,
        'status' => 1,
    ];
});
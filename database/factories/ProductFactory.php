<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */
use Illuminate\Support\Str;
use Illuminate\Support\Integer;
use App\product;
use Faker\Generator as Faker;

$factory->define(product::class, function (Faker $faker) {
    return [
        //
        'name'=> $faker->name,
		'category'=> Str::random(10),
		'describtion'=> Str::random(10),
		'uid'=> Str::random(10),
		'year'=> 10,
		'modelname'=> Str::random(10),
		'price'=> 10,
		'location'=> Str::random(10),
    ];
});

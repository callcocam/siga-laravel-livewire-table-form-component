<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'name'=> $name = $faker->name,
        'fantasy'=> $name,
        'slug'=> \Illuminate\Support\Str::slug($name),
        'email' => $faker->unique()->safeEmail,
        'document'=> $faker->creditCardNumber,
        'ie' => $faker->creditCardNumber,
        'phone'=> $faker->phoneNumber,
        'site' => $faker->domainName,
        'status'=>'published',
        'description'=>$faker->paragraph
    ];
});

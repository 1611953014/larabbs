<?php
/** @var Factory $factory */

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(App\Models\Reply::class, function (Faker $faker) {
    //随机取一个月内的时间
    $time = $faker->dateTimeThisMonth();

    return [
        'content'=>$faker->sentence(),
        'created_at' => $time,
        'updated_at'=>$time,
        'topic_id' => rand(1, 100),
        'user_id' => rand(1, 10)
    ];
});

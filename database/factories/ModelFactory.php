<?php

$factory->define(App\Model\Report::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->word,
        'description' => $faker->text,
        'file_url' => $faker->word,
        'img_url' => $faker->word,
        'thumbnail_url' => $faker->word,
        'category_id' => function (){
            return factory(App\Model\ReportCategory::class)->create()->id;
        }
    ];
});

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt($faker->password),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Model\ReportCategory::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'note' => $faker->word,
    ];
});

$factory->define(App\Model\ReportStatistics::class, function (Faker\Generator $faker) {
    return [
        'report_id' => $faker->randomNumber(),
        'views' => $faker->randomNumber(),
        'download' => $faker->randomNumber(),
    ];
});


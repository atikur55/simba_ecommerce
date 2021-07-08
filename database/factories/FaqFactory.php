<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Faq;
use Faker\Generator as Faker;

$factory->define(Faq::class, function (Faker $faker) {
    return [
        'faq_question'=>$faker->text(5),
        'faq_answer'=>$faker->text(10),
        'created_at'=>now(),
    ];
});

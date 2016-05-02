<?php
/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */
return [
    'id' => $faker->uuid,
    'title' => $faker->sentence(),
    'duration' => $faker->numberBetween(5*60, 3*3600),
    'views' => $faker->numberBetween(0, 10000000),
    'time_add' => $faker->iso8601
];
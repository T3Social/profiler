<?php

/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */

$group_id = $index === 0 ? 1 : $faker->numberBetween(1, 3);

return  [
    'id' => $index + 1,
    'user_id' => $index + 1,
    'group_id' => $group_id,
    'created_at' =>  $faker->dateTimeBetween('-1 month', 'now')->format('Y-m-d H:i:s'),
    'created_by' => null,
    'updated_at' => null,
    'updated_by' => null,
];

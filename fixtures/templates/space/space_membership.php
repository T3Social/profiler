<?php

/**
 * @var $this \humhub\modules\profiler\controllers\FixtureController
 * @var $faker \Faker\Generator
 * @var $index integer
 */

$spaceId =  $faker->memberSpace();

if ($index > 100 && $index < 200) {
    $userId = 1;
    $spaceId = $index;
} else {
    $userId = $index + 1;
}

return [
    'space_id' => $spaceId,
    'user_id' => $userId,
    'originator_user_id' => null,
    'status' => 3,
    'request_message' => null,
    'last_visit' => $faker->dateTimeBetween('-1 month', 'now')->format('Y-m-d H:i:s'),
    'group_id' => $faker->randomElement(['admin', 'moderator', 'member']),
    'created_at' => $faker->dateTimeBetween('-1 month', 'now')->format('Y-m-d H:i:s'),
    'created_by' => '1',
    'updated_at' => null,
    'updated_by' => null,
];

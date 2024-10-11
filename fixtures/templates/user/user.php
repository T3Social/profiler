<?php

/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */

use humhub\modules\profiler\faker\ContentContainerProvider;
use humhub\modules\user\models\User;

$id = $index + 1;
$containerInfo = $faker->createContainer(User::class, $id);

$username = $index === 0 ? 'root' : 'User' . $index;

return [
    'id' => $id,
    'guid' => $containerInfo['guid'],
    'status' => '1',
    'username' => $username,
    'email' => $faker->unique()->email,
    'contentcontainer_id' => $containerInfo['id'],
    'auth_mode' => 'local',
    'created_by' => null,
    'language' => 'en-US',
    'created_at' => $faker->dateTimeBetween('-2 years', '-1 years')->format('Y-m-d H:i:s'),
    'updated_at' => $faker->dateTimeBetween('-1 years', '-1 months')->format('Y-m-d H:i:s'),
    'updated_by' => $index,
    'last_login' => $faker->dateTimeBetween('-1 months', 'now')->format('Y-m-d H:i:s'),
];

<?php

/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */

use humhub\modules\profiler\faker\ContentContainerProvider;
use humhub\modules\space\models\Space;
use humhub\modules\user\models\User;

$id = $index + 1;

if ($id % 2 === 0) {
    $user_id = $id;
    $friend_user_id = 1;
    $object_id = round($id / 100) + 2;
} else {
    $user_id = 1;
    $friend_user_id = $id + 1;
}

return [
    'id' => $id,
    'user_id' => $user_id,
    'friend_user_id' => $friend_user_id,
    'created_at' => $faker->dateTimeBetween('-2 years', '-1 years')->format('Y-m-d H:i:s'),
];

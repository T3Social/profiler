<?php

/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */

use humhub\modules\profiler\faker\ContentContainerProvider;
use humhub\modules\space\models\Space;
use humhub\modules\user\models\User;

$id = $index + 1;

if($id % 2 !== 0) { // Space follow
    $user_id = $id;
    $object_model = Space::class;
    $object_id = ceil($id / 99) + 1;
} else if($id % 4 === 0) { // User 1 follows other user
    $user_id = $id;
    $object_model = User::class;
    $object_id = 1;
} else { // Other user follows User 1
    $user_id = 1;
    $object_model = User::class;
    $object_id = $id;
}

return [
    'id' => $id,
    'object_model' => $object_model,
    'object_id' => $object_id,
    'user_id' => $user_id,
    'send_notifications' => $faker->numberBetween(1,0)
];
<?php

use humhub\modules\profiler\faker\ContentContainerProvider;

/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */

$container = $faker->getContainer($index);

return [
    'id' => $container['id'],
    'pk' => $container['pk'],
    'guid' => $container['guid'],
    'class' =>  $container['class'],
    'owner_user_id' =>  $container['owner_user_id']
];

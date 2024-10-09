<?php


use humhub\modules\profiler\faker\ContentContainerProvider;
use humhub\modules\user\models\User;

/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */


return [
    'user_id' => $index + 1,
    'firstname' => $faker->firstName,
    'lastname' => $faker->lastName,
];

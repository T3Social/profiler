<?php

/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */

return  [
    'id' => $index + 1,
    'user_id' => $index + 1,
    'algorithm' => 'sha512whirlpool',
    'password' => '7e3e4f1c548a3037fa36e895c91453f6e59279f7ea100d37bc9cca07a2c6b2d6b8e1426da66ae6c8ce7d749516b91d323b85d3cb7c367fc64bb672cfdaf535a8', // test
    'salt' => '04b49c17-e1b4-4c23-8cd0-01fc7fbe0c61',
    'created_at' => $faker->dateTimeBetween('-2 years', '-1 years')->format('Y-m-d H:i:s')
];
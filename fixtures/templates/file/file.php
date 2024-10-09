<?php

/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */

use humhub\modules\post\models\Post;

$date =  (new DateTime())->modify('- 1 year')->modify('+' . ($index + 1) . ' minutes')->format('Y-m-d H:i:s');
$user = $faker->numberBetween(1, 100);

return [
    'id' => $index + 1,
    'guid' => $faker->unique()->uuid,
    'object_model' => Post::class,
    'object_id' => $faker->numberBetween(1, 1000),
    'file_name' => 'test.jpg',
    'title' => 'test',
    'mime_type' => 'image/jpeg',
    'size' => 302176,
    'created_at' => $date,
    'created_by' => $user,
    'updated_at' => $date,
    'updated_by' => $user,
    'show_in_stream' => 1,
];

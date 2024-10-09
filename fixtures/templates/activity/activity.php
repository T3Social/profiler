<?php

/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */

use humhub\modules\content\activities\ContentCreated;
use humhub\modules\post\models\Post;

return [
    'id' => $index + 1,
    'class' => ContentCreated::class,
    'module' => 'content',
    'object_model' => Post::class,
    'object_id' => $index,
];

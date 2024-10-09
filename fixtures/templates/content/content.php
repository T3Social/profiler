<?php

/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */

use humhub\modules\activity\models\Activity;
use humhub\modules\post\models\Post;

try {
    $id = $index + 1;

    $isActivity = $id % 2 === 0;

    $objectModel = $isActivity ? Activity::class : Post::class;
    $objectid = $isActivity ? $id / 2 : ($id + 1) / 2;

    $archived = $id % 50 === 0 ? 1 : 0;
    $pinned = ($id === 11 || $id === 21) ? 1 : 0;

    $date = (new DateTime())->modify('- 1 year')->modify('+' . ($id + 1) . ' minutes')->format('Y-m-d H:i:s');

    $author = (int)$objectid % 100;

    if (!$author) {
        $author = 1;
    }

    if (($id + 1) % 100 === 0 || $id % 100 === 0) {
        $containerId = 2001; // Each 100th post should be a User1 profile post
    } else {
        $containerId = (int)ceil($author / 99);
    }

    $stream_channel = $isActivity ? 'activity' : 'default';

    return [
        'id' => $id,
        'guid' => $faker->unique()->uuid,
        'object_model' => $objectModel,
        'object_id' => $objectid,
        'visibility' => $faker->numberBetween(0, 1),
        'pinned' => $pinned,
        'archived' => $archived,
        'contentcontainer_id' => $containerId,
        'created_at' => $date,
        'created_by' => $author,
        'updated_at' => $date,
        'updated_by' => $author,
        'stream_channel' => $stream_channel,
    ];
} catch (\Throwable $t) {
    return [
        'id' => 1,
        'guid' => $t->getMessage(),
    ];
}

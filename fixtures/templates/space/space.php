<?php

/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */

use humhub\modules\profiler\faker\ContentContainerProvider;
use humhub\modules\space\models\Space;

$faker = \Faker\Factory::create();
$faker->addProvider(ContentContainerProvider::class);

$id = $index + 1;

$containerInfo = $faker->createContainer(Space::class, $id);

$visibility = ($id === 1) ? 2 : $faker->numberBetween(0,1);
$joinPolicity = $visibility === 0 ? 0 : $faker->numberBetween(0,2);

$status = $index && $index % 50 === 0 ? Space::STATUS_ARCHIVED : Space::STATUS_ENABLED;
$status = $index && $index % 101 === 0 ? Space::STATUS_ARCHIVED : $status;

return [
    'id' => $id,
    'guid' => $containerInfo['guid'],
    'name' => $faker->word(),
    'contentcontainer_id' => $containerInfo['id'],
    'description' => $faker->sentence(6),
    'join_policy' => $joinPolicity,
    'visibility' => $visibility,
    'status' => $status,
    'tags' => null,
    'created_at' => $faker->dateTimeBetween('-2 years', '-1 years')->format('Y-m-d H:i:s'),
    'created_by' => 1,
    'updated_at' => $faker->dateTimeBetween('-1 years', '-1 months')->format('Y-m-d H:i:s'),
    'updated_by' => 1,
    'ldap_dn' => null,
    'auto_add_new_members' => 0
];

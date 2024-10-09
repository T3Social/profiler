<?php

/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */

$id = $index + 1;
$date =  (new DateTime())->modify('- 1 month')->modify('+' . ($index + 1) . ' hours')->format('Y-m-d H:i:s');
$author =  (int) $id % 100;

return [
    'id' => $index + 1,
    'message' => $faker->text(500),
    'created_at' => $date,
    'created_by' => $author,
    'updated_at' => $date,
    'updated_by' => $author,
];

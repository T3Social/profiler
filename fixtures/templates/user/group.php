<?php

/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */

return [
    'id' => $index + 1,
    'name' => 'Administrators',
    'description' => 'Default group for administrators of this HumHub Installation',
    'is_admin_group' => 1,
    'is_default_group' => 0,
    'is_protected' => 0,
    'show_at_registration' => 0,
    'show_at_directory' => 0,
    'sort_order' => 100,
    'notify_users' => 0,
];

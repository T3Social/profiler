<?php

namespace humhub\modules\profiler\faker;

use Faker\Provider\Base;
use humhub\modules\space\models\Space;

class SpaceMemberProvider extends Base
{
    public static $members = [];

    public static $index = 1;

    // We distribute equal amount of space members, some spaces may stay empty
    const MAX_MEMBERS_PER_SPACE = 100;

    public function memberSpace()
    {
        if(!isset(static::$members[static::$index])) {
            static::$members[static::$index] = 1;
        }

        ++static::$members[static::$index];

        return (static::$members[static::$index] >= static::MAX_MEMBERS_PER_SPACE) ? ++static::$index : static::$index;
    }
}
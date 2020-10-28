<?php

namespace humhub\modules\profiler\faker;

use Faker\Provider\Base;
use humhub\modules\space\models\Space;

class ContentContainerProvider extends Base
{
    public static $container = [];

    public static $index = 0;

    public function createContainer($class, $id)
    {
        $result =  [
            'id' => ++static::$index,
            'class' => $class,
            'pk' => $id,
            'guid' => (new \ReflectionClass($class))->getShortName().'::'.static::$index,
            'owner_user_id' => ($class === Space::class) ? 1 : $id
        ];

        static::$container[static::$index] = $result;

        return $result;
    }

    public function getContainer($index) {
        return static::$container[++$index];
    }
}
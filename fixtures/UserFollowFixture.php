<?php

namespace humhub\modules\profiler\fixtures;

use humhub\modules\user\models\Follow;
use yii\test\ActiveFixture;

class UserFollowFixture extends ActiveFixture
{
    public $modelClass = Follow::class;
    public $dataFile = '@profiler/fixtures/data/user/user_follow.php';
}
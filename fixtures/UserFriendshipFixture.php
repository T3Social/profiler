<?php

namespace humhub\modules\profiler\fixtures;

use humhub\modules\friendship\models\Friendship;
use yii\test\ActiveFixture;

class UserFriendshipFixture extends ActiveFixture
{
    public $modelClass = Friendship::class;
    public $dataFile = '@profiler/fixtures/data/user/user_friendship.php';
}
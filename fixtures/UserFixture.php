<?php

namespace humhub\modules\profiler\fixtures;

use humhub\modules\user\models\User;
use yii\test\ActiveFixture;

class UserFixture extends ActiveFixture
{
    public $modelClass = User::class;
    public $dataFile = '@profiler/fixtures/data/user/user.php';
}
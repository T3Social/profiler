<?php

namespace humhub\modules\profiler\fixtures;

use humhub\modules\user\models\Password;
use yii\test\ActiveFixture;

class UserPasswordFixture extends ActiveFixture
{
    public $modelClass = Password::class;
    public $dataFile = '@profiler/fixtures/data/user/user_password.php';
}
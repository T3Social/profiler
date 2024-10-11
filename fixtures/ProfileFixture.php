<?php

namespace humhub\modules\profiler\fixtures;

use humhub\modules\user\models\Profile;
use humhub\modules\user\models\User;
use yii\test\ActiveFixture;

class ProfileFixture extends ActiveFixture
{
    public $modelClass = Profile::class;
    public $dataFile = '@profiler/fixtures/data/user/profile.php';
}

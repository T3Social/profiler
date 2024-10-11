<?php

namespace humhub\modules\profiler\fixtures;

use humhub\modules\user\models\GroupUser;
use yii\test\ActiveFixture;

class GroupUserFixture extends ActiveFixture
{
    public $modelClass = GroupUser::class;
    public $dataFile = '@profiler/fixtures/data/user/group_user.php';
}

<?php

namespace humhub\modules\profiler\fixtures;

use humhub\modules\user\models\Group;
use yii\test\ActiveFixture;

class GroupFixture extends ActiveFixture
{
    public $modelClass = Group::class;
    public $dataFile = '@profiler/fixtures/data/user/group.php';
}

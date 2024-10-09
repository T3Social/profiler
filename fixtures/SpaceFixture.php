<?php

namespace humhub\modules\profiler\fixtures;

use humhub\modules\space\models\Space;
use humhub\modules\user\models\User;
use yii\test\ActiveFixture;

class SpaceFixture extends ActiveFixture
{
    public $modelClass = Space::class;
    public $dataFile = '@profiler/fixtures/data/space/space.php';
}

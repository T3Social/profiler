<?php

namespace humhub\modules\profiler\fixtures;

use humhub\modules\activity\models\Activity;
use yii\test\ActiveFixture;

class ActivityFixture extends ActiveFixture
{
    public $modelClass = Activity::class;
    public $dataFile = '@profiler/fixtures/data/activity/activity.php';
}

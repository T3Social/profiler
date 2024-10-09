<?php

namespace humhub\modules\profiler\fixtures;

use humhub\modules\content\models\Content;
use yii\test\ActiveFixture;

class ContentFixture extends ActiveFixture
{
    public $modelClass = Content::class;
    public $dataFile = '@profiler/fixtures/data/content/content.php';
}

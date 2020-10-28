<?php

namespace humhub\modules\profiler\fixtures;

use humhub\modules\content\models\ContentContainer;
use yii\test\ActiveFixture;

class ContentContainerFixture extends ActiveFixture
{
    public $modelClass = ContentContainer::class;
    public $dataFile = '@profiler/fixtures/data/content/contentcontainer.php';
}
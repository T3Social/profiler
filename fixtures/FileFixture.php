<?php

namespace humhub\modules\profiler\fixtures;

use humhub\modules\file\models\File;
use yii\test\ActiveFixture;

class FileFixture extends ActiveFixture
{
    public $modelClass = File::class;
    public $dataFile = '@profiler/fixtures/data/file/file.php';
}

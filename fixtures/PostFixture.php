<?php

namespace humhub\modules\profiler\fixtures;

use humhub\modules\post\models\Post;
use yii\test\ActiveFixture;

class PostFixture extends ActiveFixture
{
    public $modelClass = Post::class;
    public $dataFile = '@profiler/fixtures/data/post/post.php';
}

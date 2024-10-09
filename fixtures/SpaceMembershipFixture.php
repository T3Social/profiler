<?php

namespace humhub\modules\profiler\fixtures;

use humhub\modules\space\models\Membership;
use yii\test\ActiveFixture;

class SpaceMembershipFixture extends ActiveFixture
{
    public $modelClass = Membership::class;
    public $dataFile = '@profiler/fixtures/data/space/space_membership.php';
}

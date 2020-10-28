<?php


namespace humhub\modules\profiler\controllers;


use humhub\modules\content\models\Content;
//use humhub\modules\dashboard\stream\DashboardStreamQuery;
use humhub\modules\profiler\models\ProfilerResult;
class ActivityStreamController extends ProfileController
{
    public $count = 1;

    public function actionRun()
    {
      /*  $result = $this->runProfiler(function(ProfilerResult $result) {
            $query = new DashboardStreamQuery(['activity' => false]);
            $result->setResult($query->all());
        }, $this->title);

        die();

        $result->setTotalCount('Content entries', Content::find()->count());

        $this->printResult($result);*/

    }
}
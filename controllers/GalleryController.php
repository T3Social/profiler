<?php


namespace humhub\modules\profiler\controllers;


use humhub\modules\gallery\models\StreamGallery;
use humhub\modules\space\models\Space;
use humhub\modules\user\models\User;
use PHP_Timer;
use Yii;
use yii\console\Controller;
use yii\helpers\Console;

class GalleryController extends Controller
{
    public $count = 2000;

    public function options($actionID)
    {
        return array_merge(parent::options($actionID), [
            'count'
        ]);
    }

    public function init()
    {
        parent::init();
        require Yii::getAlias('@profiler/vendor/autoload.php');
    }

    public function actionRun()
    {

        if(!Yii::$app->getModule('gallery')) {
            $this->stdout('Gallery Module needs to be enabled!', Console::FG_RED);
            return;
        }

        Yii::$app->user->switchIdentity(User::findOne(['id' => 1]));
        $gallery = StreamGallery::findForContainer(Space::findOne(['id' => 1]), true);


        PHP_Timer::start();

        for($i = 0; $i < $this->count;$i++) {
           //$gallery->fileListQuery()->one();
           $gallery->fileListQueryOld()->one();
           // $this->stdout($query->createCommand()->rawSql,  Console::FG_GREEN);
        }

        $timeTotal = PHP_Timer::stop();

        $timeAvg = $timeTotal / $this->count;

        $this->printResultRow('getPreviewImageUrl('.$this->count.')', $timeTotal);
        $this->printResultRow('getPreviewImageUrl(avg)', $timeAvg);
        $this->stdout("\n");
        $this->printResourceUsage();
        //$this->stdout(sprintf("%s", "\x07"));
    }

    protected function printResourceUsage()
    {
        $load = sys_getloadavg();
        $this->printResultRow('load (1m)', $load[0]);
        $this->printResultRow('load (5m)', $load[1]);
        $this->printResultRow('load (15m)', $load[2]);
        $this->stdout(PHP_Timer::resourceUsage()."\n", Console::FG_GREEN);

    }

    protected function printResultRow($title, $value, $color = Console::FG_GREEN)
    {
        $this->stdout(sprintf("%-30.30s| %5f \n", $title,$value), $color);
    }
}

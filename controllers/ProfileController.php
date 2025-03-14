<?php

namespace humhub\modules\profiler\controllers;

use humhub\modules\profiler\models\ProfilerResult;
use humhub\modules\user\models\User;
use PHP_Timer;
use Yii;
use yii\console\Controller;
use yii\helpers\Console;

abstract class ProfileController extends Controller
{
    public $count = 1000;

    public $title;

    public $userId = 1;

    public function init()
    {
        parent::init();
        require Yii::getAlias('@profiler/vendor/autoload.php');
    }

    public function options($actionID)
    {
        return array_merge(parent::options($actionID), [
            'count',
            'title',
            'userId',
        ]);
    }

    public function beforeAction($action)
    {
        try {
            $test = Yii::$app->getDb()->createCommand('SHOW VARIABLES LIKE \'query_cache_size\';')->queryOne();
            if ($test['Value'] != 0) {
                $this->stdout("query_cache_size not 0\n", Console::FG_RED);
            }
        } catch (\Throwable $e) {
        }

        return parent::beforeAction($action); // TODO: Change the autogenerated stub
    }

    /**
     * @param $profiler
     * @param null $count
     * @return ProfilerResult
     */
    public function runProfiler($profiler, $title, $dryRun = true)
    {
        $result = new ProfilerResult(['title' => $title]);

        if ($dryRun) {
            // We make a dry run in order to make sure no internal caches do not affect the result
            call_user_func($profiler, $result, -1);
        }

        $this->startProfiling();

        for ($i = 0; $i < $this->count;$i++) {
            call_user_func($profiler, $result, $i);
        }

        $result->timeTotal = $this->endProfiling();

        return $result;
    }

    public function startProfiling()
    {
        PHP_Timer::start();
    }

    public function endProfiling()
    {
        return PHP_Timer::stop();
    }

    public function printResult(ProfilerResult $result, ProfilerResult $competing = null)
    {
        $this->printResultHeadline();

        if ($result->totalCount && $result->totalCountTitle) {
            $this->printResultRow($result->totalCountTitle, $result->totalCount, false);
        }

        $this->printTotalRunCount();
        $this->printResultRowPerRun($result, $competing);
        $this->printTotalTimeRow($result, $competing);
        $this->printAvarageTimeRow($result, $competing);
        $this->stdout("\n");
        $this->printResourceUsage();
        $this->cli_beep();
    }

    protected function cli_beep()
    {
        fprintf(STDOUT, "%s", "\x07");
    }

    protected function printTotalRunCount()
    {
        $this->printResultRow('Total runs', $this->count, false);
    }

    protected function printTotalTimeRow(ProfilerResult $result, ProfilerResult $competing = null)
    {
        if ($competing) {
            return $this->printCompetingResultRow('Total run time (s)', $result->timeTotal, $competing->timeTotal);
        }
        return $this->printResultRow('Total run time (s)', $result->timeTotal);
    }

    protected function printAvarageTimeRow(ProfilerResult $result, ProfilerResult $competing = null)
    {
        $timeAvg = $result->timeTotal / $this->count;

        if ($competing) {
            $timeAvgComp = $competing->timeTotal / $this->count;
            return $this->printCompetingResultRow('Average run time (s)', $timeAvg, $timeAvgComp, true);
        }

        return $this->printResultRow('Average run time (s)', $timeAvg);
    }

    protected function printResultRowPerRun(ProfilerResult $result, ProfilerResult $competing = null)
    {
        if ($competing) {
            return $this->printCompetingResultRow('Result count per run', $result->getResultCount(), $competing->getResultCount(), false, false);
        }

        return $this->printResultRow('Result count per run', $result->getResultCount(), false);
    }

    protected function printResourceUsage()
    {
        $load = sys_getloadavg();
        $this->printResultRow('load % (1m)', $load[0] * 100, false);
        $this->printResultRow('load % (5m)', $load[1] * 100, false);
        $this->printResultRow('load % (15m)', $load[2] * 100, false);
        $this->stdout(PHP_Timer::resourceUsage() . "\n", Console::FG_GREEN);

    }

    protected function printResultHeadline()
    {
        $this->stdout("---------------------------------------------------------------\n", Console::FG_GREEN);
        $this->stdout($this->title . "\n", Console::FG_GREEN);
        $this->stdout("---------------------------------------------------------------\n", Console::FG_GREEN);
    }

    protected function printCompetingResultRow($title, $value1, $value2, $diff = false, $float = true, $color = Console::FG_GREEN)
    {
        $format =  "%-50.50s|";
        $format .= $float ? "%3f" : "%u";
        $format .= $float ? " vs %3f" : " vs %u";

        if (!$diff) {
            $format .= " \n";
            $this->stdout(sprintf($format, $title, $value1, $value2), $color);
            return;
        }

        $sign = $value1 > $value2 ? '+' : '';
        $format .= " = $sign%3f%%";
        $format .= " \n";

        $diff = ($value1 - $value2) * 100 / $value2;

        $this->stdout(sprintf($format, $title, $value1, $value2, $diff), $color);
    }

    protected function printResultRow($title, $value, $float = true, $color = Console::FG_GREEN)
    {
        $format =  "%-50.50s|";
        $format .= $float ? "%3f" : "%u";
        $format .= " \n";
        $this->stdout(sprintf($format, $title, $value), $color);
    }

    /**
     * @return User
     */
    protected function getUser()
    {
        return User::findOne(['id' => $this->userId]);
    }
}

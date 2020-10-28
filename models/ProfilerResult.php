<?php

namespace humhub\modules\profiler\models;

use yii\base\Model;

class ProfilerResult extends Model
{
    public $timeTotal;

    public $title;

    private $result;

    public $totalCount;
    public $totalCountTitle;

    public function setTotalCount($title, $count)
    {
        $this->totalCountTitle = $title;
        $this->totalCount = $count;
    }

    public function setResult($result)
    {
        $this->result = $result;
    }

    public function getResultCount()
    {
        if(is_int($this->result)) {
            return $this->result;
        }

        if(!is_array($this->result)) {
            return 0;
        }

        return count($this->result);
    }
}
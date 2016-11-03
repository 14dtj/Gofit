<?php

/**
 * Created by PhpStorm.
 * User: tjDu
 * Date: 2016/10/24
 * Time: 23:27
 */
class SleepCondition{
    public $username;
    public $date;
    public $start_time;
    public $end_time;
    /**
     * 高质量睡眠比率
     */
    public $rate;

    public function __construct($username, $date, $start_time, $end_time, $rate){
        $this->username = $username;
        $this->date = $date;
        $this->start_time = $start_time;
        $this->end_time = $end_time;
        $this->rate = $rate;
    }


}
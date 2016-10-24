<?php

/**
 * Created by PhpStorm.
 * User: tjDu
 * Date: 2016/10/24
 * Time: 23:24
 */
class sports_record{
    public $date;
    public $distance;
    public $time;
    public $calorie;
    public $steps;
    /**
     * 完成目标数
     */
    public $achieved_goal;
    public $username;

    public function __construct($date, $distance, $time, $calorie, $steps, $achieved_goal, $username){
        $this->date = $date;
        $this->distance = $distance;
        $this->time = $time;
        $this->calorie = $calorie;
        $this->steps = $steps;
        $this->achieved_goal = $achieved_goal;
        $this->username = $username;
    }


}
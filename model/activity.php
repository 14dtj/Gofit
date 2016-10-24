<?php

/**
 * Created by PhpStorm.
 * User: tjDu
 * Date: 2016/10/24
 * Time: 22:45
 */
class activity{
    public $name;
    /**
     * @var参与人数
     */
    public $number;
    public $award;
    /**
     * 团队或个人竞赛
     */
    public $type;
    /**
     * 图片的路径
     */
    public $picture;
    /**
     * 运动种类
     */
    public $sports;
    public $organizer;
    public $introduction;
    public $start_time;
    public $end_time;


    public function __construct($name, $number, $award, $type, $picture, $sports, $organizer, $introduction, $start_time, $end_time){
        $this->name = $name;
        $this->number = $number;
        $this->award = $award;
        $this->type = $type;
        $this->picture = $picture;
        $this->sports = $sports;
        $this->organizer = $organizer;
        $this->introduction = $introduction;
        $this->start_time = $start_time;
        $this->end_time = $end_time;
    }

}
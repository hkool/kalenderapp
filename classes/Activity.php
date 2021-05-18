<?php
namespace classes;
class Activity
{
    private $date;
    private $activity_text;

    function __construct($date,$text){
        $this->date = $date;
        $this->activity_text = $text;
    }

    public function getDate():DateTime{
        return $this->date;
    }
    public function setDate($datum):void{
        $this->date = $datum;
    }
    public function getActivity_text():string
    {
        return $this->activity_text;
    }
    public function setActivity_text($text):void{
        $this->activity_text = $text;
    }

}
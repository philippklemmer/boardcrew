<?php

class Time {    
    
    public static function setTime($time){
        $newTime = date("d.m.y H:i", strtotime($time));
        return $newTime;
    }
    
}

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class MapModel extends MY_Model {
    
    function __construct() {
        parent::__construct('positions','username');
    }
    
    
    function getCenter($points) {
        $latAvg = 0;
        $longAvg = 0;
        $count = 0;
        foreach($points as $point) {
            $count++;
            $latAvg += $point[1];
            $longAvg += $point[2];
        }
        $latAvg /= $count;
        $longAvg /= $count;
        return $latAvg . ', ' . $longAvg;
    }
}
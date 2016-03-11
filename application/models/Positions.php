<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Positions extends MY_Model {
    
    function __construct() {
        parent::__construct('positions','username');
    }
    
    function getAllPlots($name) {
        $result = $this->some('username', $name);
        $resArray = array();
        foreach($result as $index) {
            array_push($resArray, [$index->datetime, $index->latitude, $index->longitude]);
        }
        return $resArray;
    }
    
    /*function getTransactionByCode($code) {
        $res = $this->all();
        $newRes = array();
        
        $index = count($res) - 1;

        while($index > 0) {
            $tmpRes = array();
                if ($res{$index}->code === $code) {
                $name = $this->players->getPlayerNamesByUsername($res{$index}->username);
                array_push($tmpRes, $res{$index}->username, $name[0] . ' ' . $name[1], $res{$index}->amount, $res{$index}->type, $res{$index}->datetime);
                array_push($newRes, $tmpRes);
            }
            $index--;
        }
        return $newRes;
    }
    
    function getTransactionByUsername($name) {
        $res = $this->some('username', $name);
        $newRes = array();
        foreach($res as $queryIndex) {
            $tmpRes = array();
            array_push($tmpRes, $queryIndex->code, $this->stocks->getStockByCode($queryIndex->code)[0], $queryIndex->amount, $queryIndex->type, $queryIndex->datetime);
            array_push($newRes, $tmpRes);
        }
        return $newRes;
    }*/
}
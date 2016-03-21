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
    
    /*------------------------------------------------------------------------------------------------------------------
    --      FUNCTION:                       getAllPlots
    --
    --      DATE:                           March 20th, 2016
    --
    --      REVISIONS:                      NONE
    --
    --      DESIGNER:                       Jaegar Sarauer
    --
    --      PROGRAMMER:                     Jaegar Sarauer
    --
    --      INTERFACE:                      void getAllPlots($name)
    --                                          string $name = The name of the user to find.
    --
    --      RETURNS:                        The date, latitude and longitude of all points from the user.
    --
    --      NOTES:
    --      This function querys the database for a username within the GPS data table, and returns an array of all the 
    --      GPS data found under the username passed into the function.
    ----------------------------------------------------------------------------------------------------------------------*/
    function getAllPlots($name) {
        $result = $this->some('username', $name);
        $resArray = array();
        foreach($result as $index) {
            array_push($resArray, [$index->datetime, $index->latitude, $index->longitude]);
        }
        return $resArray;
    }
    
}
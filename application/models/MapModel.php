<?php


class MapModel extends MY_Model {
    
    function __construct() {
        parent::__construct('positions','username');
    }
    
        /*------------------------------------------------------------------------------------------------------------------
    --      FUNCTION:                       getCenter
    --
    --      DATE:                           March 20th, 2016
    --
    --      REVISIONS:                      NONE
    --
    --      DESIGNER:                       Jaegar Sarauer
    --
    --      PROGRAMMER:                     Jaegar Sarauer
    --
    --      INTERFACE:                      array int(2) getCenter($points)
    --                                          int $points = An array of points.
    --
    --      RETURNS:                        the x and y of the average center of the array of points.
    --
    --      NOTES:
    --      This function is intended to find the center of all collected points from within an array in order to show the
    --      map correctly with all points visible.
    ----------------------------------------------------------------------------------------------------------------------*/
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
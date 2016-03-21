<?php

class Map extends Application {

        /*------------------------------------------------------------------------------------------------------------------
        --      FUNCTION:                       index
        --
        --      DATE:                           March 20th, 2016
        --
        --      REVISIONS:                      NONE
        --
        --      DESIGNER:                       Jaegar Sarauer
        --
        --      PROGRAMMER:                     Jaegar Sarauer
        --
        --      INTERFACE:                      void index()
        --
        --      RETURNS:                        void
        --
        --      NOTES:
        --      This function creates a google map for the user who is currently logged in and plots the points of their GPS data
        --      to a map. The points are then connected.
        --      If the user isn't logged in, the user will be pushed to the welcome screen.
        --      If the user has no GPS data, the map will be replaced with a message telling the user to use the app before
        --      attempting to view the map and the GPS data on it.
        --      Along with the map, an auto resizing script is added to the page to automatically size the map based on the size
        --      of the web page.
        ----------------------------------------------------------------------------------------------------------------------*/
	public function index()
	{ 
            $whoIs = $this->session->userdata['logged_in']['username'];
            if ($whoIs === NULL) {
                redirect('/', 'refresh');
            }
            
            $this->data['navigation'] = $this->createNavigation(3);
            
            $points = $this->positions->getAllPlots($whoIs);
            if (count($points) > 0) {

                //$realName = ($name === NULL) ? $this->movement->getMostRecentCodeMovement() : $name;
                //$stockItemNames = 
                $this->data['pagebody'] = 'map';//new DBQuery().getDatabaseData();//'index';
                //$this->data['dropdowndata'] = $this->createDropDown($this->stocks->getStocksList(), $realName);

                //$this->load->library('googlemaps');


                $config['center'] = $this->mapmodel->getCenter($points);
                $config['zoom'] = 'auto';
                $this->googlemaps->initialize($config);

                $polyline['points'] = array();

                foreach($points as $point) {
                    $marker = array();
                    $posStr = $point[1] . ', ' . $point[2];
                    $marker['position'] = $posStr;
                    array_push($polyline['points'], $posStr);
                    //$marker['infowindow_content'] = $point[0];
                    $this->googlemaps->add_marker($marker);
                }

                $this->googlemaps->add_polyline($polyline);
                //$this->googlemaps->map_height = 600;
                $result = $this->googlemaps->create_map();


                $this->data['javascript'] = $result['js'];
                $this->data['map'] = $result['html'];

                $this->data['loadScript'] = 'function resizeMap() {'
                        . '    document.getElementById("map_canvas").style.height = (window.innerHeight - (90)) + "px";'
                        . '};'
                        . 'window.onresize = function(event) {'
                        . '    resizeMap();'
                        . '};'
                        . 'window.onload = resizeMap;';
            } else {
                $this->data['pagebody'] = 'textpage';
                $this->data['innerContent'] = "<h2>Oops!</h2><p>Looks like you have no data to show. Try using our app before looking up the places you haven't visisted!";
            }            
            $this->render();
	}
}

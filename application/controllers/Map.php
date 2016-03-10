<?php

class Map extends Application {

	/**
	 * Index Page for this controller.
	 */
	public function index()
	{ 
            $whoIs = $this->session->userdata['logged_in']['username'];
            if ($whoIs === NULL) {
                redirect('/', 'refresh');
            }
            //$realName = ($name === NULL) ? $this->movement->getMostRecentCodeMovement() : $name;
            //$stockItemNames = 
            $this->data['pagebody'] = 'map';//new DBQuery().getDatabaseData();//'index';
            $this->data['navigation'] = $this->createNavigation(2);
            //$this->data['dropdowndata'] = $this->createDropDown($this->stocks->getStocksList(), $realName);
            
            //$this->load->library('googlemaps');
            
            $points = $this->positions->getAllPlots($whoIs);

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
            $result = $this->googlemaps->create_map();
            
            $this->data['javascript'] = $result['js'];
            $this->data['map'] = $result['html'];

            //$this->load->view('_template', $this->data);
            
            //$fullName = $this->stocks->getStockByCode($username);
            //$this->data['contentTitle'] = $whoIs . "'s GPS Data";//$fullName[0] . ' [' . $fullName[1] . '] = $' . $this->stocks->getStockPrice($realName);
            
            //$this->data['oneTableColumns'] = $this->createTableColumns(['datetime', 'latitude', 'longitude']);
            //$this->data['oneTableQuery'] = $this->parseQuery($this->positions->getAllPlots($whoIs));
            
            //$this->data['rightTableColumns'] = $this->createTableColumns(['Player', 'Amount', 'Type', 'Timestamp']);
            //$this->data['rightTableQuery'] = $this->parseQueryClickable($this->transaction->getTransactionByCode($realName), 'profile', 1);
            
            $this->render();
	}
}

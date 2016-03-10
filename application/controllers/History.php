<?php

class History extends Application {

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
            $this->data['pagebody'] = 'onetablepage';//new DBQuery().getDatabaseData();//'index';
            $this->data['navigation'] = $this->createNavigation(2);
            //$this->data['dropdowndata'] = $this->createDropDown($this->stocks->getStocksList(), $realName);
            
            
            
            //$fullName = $this->stocks->getStockByCode($username);
            $this->data['contentTitle'] = $whoIs . "'s GPS Data";//$fullName[0] . ' [' . $fullName[1] . '] = $' . $this->stocks->getStockPrice($realName);
            
            $this->data['oneTableColumns'] = $this->createTableColumns(['datetime', 'latitude', 'longitude']);
            $this->data['oneTableQuery'] = $this->parseQuery($this->positions->getAllPlots($whoIs));
            
            //$this->data['rightTableColumns'] = $this->createTableColumns(['Player', 'Amount', 'Type', 'Timestamp']);
            //$this->data['rightTableQuery'] = $this->parseQueryClickable($this->transaction->getTransactionByCode($realName), 'profile', 1);
            
            $this->render();
	}
}

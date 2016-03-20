<?php

class History extends Application {

	/**
	 * Index Page for this controller.
	 */
	public function index()
	{ 
            if (!isset($this->session->userdata['logged_in'])) {
                redirect('/', 'refresh');
            }
            $whoIs = $this->session->userdata['logged_in']['username'];
            if ($whoIs === NULL) {
                redirect('/', 'refresh');
            }
            
            
            $this->data['pageheader'] = '<div class="jumbotron">
                <h1>' . $whoIs . "'s GPS Data </h1>";
            if ($this->session->userdata('logged_in')) {
                $this->data['pageheader'] .= '';
                        
                       /* '<p>...</p>
                <p><a class="btn btn-primary btn-lg" href="#" role="button">GPS History</a>
                <a class="btn btn-primary btn-lg" href="#" role="button">Map</a></p>';*/
            } else {
                $this->data['pageheader'] .= '<p>Please login to view GPS data</p>';
            }
            $this->data['pageheader'] .= '</div>';
            
            
            $this->data['navigation'] = $this->createNavigation(2);
            
            $this->data['pagebody'] = 'onetablepage';
            
            $this->data['oneTableColumns'] = $this->createTableColumns(['Date', 'Latitude', 'Longitude']);
            $this->data['oneTableQuery'] = $this->parseQuery($this->positions->getAllPlots($whoIs));
            
            $this->render();
	}
}

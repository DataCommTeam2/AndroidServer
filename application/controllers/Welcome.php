<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application {

	/**
	 * Index Page for this controller.
	 */
	public function index()
	{ 
            $this->data['pageheader'] = '<div class="jumbotron" >
                <h1>Welcome to GPS Tracker</h1>';
            if ($this->session->userdata('logged_in')) {
                $this->data['pageheader'] .= '<p>Please select a page to view.</p>
                        <div class="btn-group btn-group-justified" role="group" id="home-nav-page" aria-label="...">
                            <div class="btn-group" role="group">
                                <a type="button" class="btn btn-default" href="/history">GPS History</a>
                            </div>
                            <div class="btn-group" role="group">
                                <a type="button" class="btn btn-default" href="/map">Map</a>
                            </div>
                        </div>';
                        
                       /* '<p>...</p>
                <p><a class="btn btn-primary btn-lg" href="#" role="button">GPS History</a>
                <a class="btn btn-primary btn-lg" href="#" role="button">Map</a></p>';*/
            } else {
                $this->data['pageheader'] .= '<p>Please login to view GPS data</p>'
                        . '<form role="search" class="home-login" id="loginForm" method="post"action="/login">
                        <table>
                            <tr><input type="text" name="username" class="form-control" placeholder="Username"></tr>
                            <tr><input type="password" name="password" class="form-control" placeholder="Password"></tr>
                            <tr>
                                <div class="btn-group btn-group-justified" role="group" aria-label="...">
                                    <div class="btn-group" role="group">
                                        <button type="submit" name="Submit" value="Submit" class="btn btn-default">Login</button>
                                    </div>
                                    <div class="btn-group" role="group">
                                        <button type="submit" name="Submit" value="Register" class="btn btn-default">Register</button>
                                    </div>
                                </div>
                            </tr>
                        </table>
                  </form>';
            }
            $this->data['pageheader'] .= '</div>';
            $this->data['navigation'] = $this->createNavigation(1);
            
            $this->data['pagebody'] = 'textpage';
            $this->data['innerContent'] = '<h4>Welcome to GPS Tracker!</h4>'
                    . '<p>This website is for looking at your GPS data collected from our Android App.</p>'
                    . '<p>Before you may start using this website, please register and account, or login if you are an existing user. '
                    . 'You can do this along the top bar of the web page, or in the title header.</p>';	
            
            $this->render();
	}        
}

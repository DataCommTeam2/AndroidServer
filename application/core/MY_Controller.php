<?php

/**
 * core/MY_Controller.php
 *
 * Default application controller
 *
 * @author		JLP
 * @copyright           2010-2015, James L. Parry
 * ------------------------------------------------------------------------
 */

class Application extends CI_Controller {

    protected $data = array();      // parameters for view components
    protected $id;                  // identifier for our content
    protected $choices = array(
        'Homepage' => '/', 'Profile' => '/profile', 'Stock' => '/stock'
    );

    /**
     * Constructor.
     * Establish view parameters & load common helpers
     */

    function __construct() {
        parent::__construct();
        $this->data = array();
        $this->data['pagetitle'] = "GPS Tracker";
        $this->data['pageheader'] = '';//"GPS Tracker";
        $this->data['loadScript'] = '';
    }

    /**
     * Render this page
     * Used on all. We need to load data into content in the controller
     */
    function render() {
        //$this->data['navbar'] = build_menu_bar($this->choices);
        $this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
        $this->data['data'] = &$this->data;
        $this->parser->parse('_template', $this->data);
    }
    
    /**
     * Parses a query into table data.
     * @param type $queryData   = The data to parse
     * @param type $ignoreIndex = A single index to ignore if some data shouldn't be shown.
     * @return string
     */
    function parseQuery($queryData, $ignoreIndex = -1) {
            $res = '';
            
            if ($queryData == NULL) {
                return '';
            }
            
            foreach($queryData as $queryIndex) {
                $res .= '<tr>';
                for ($index = 0; $index < count($queryIndex); $index++) {
                    if ($ignoreIndex !== $index) {
                        $res .= '<td>' . $queryIndex[$index] . '</td>';
                    }
                }
                $res .= '</tr>';
            }
            return $res;
    }

    /*------------------------------------------------------------------------------------------------------------------
    --      FUNCTION:                       createNavigation
    --
    --      DATE:                           March 20th, 2016
    --
    --      REVISIONS:                      NONE
    --
    --      DESIGNER:                       Jaegar Sarauer
    --
    --      PROGRAMMER:                     Jaegar Sarauer
    --
    --      INTERFACE:                      string createNavigation($page)
    --                                          int $page = The index of the page the user's on.
    --
    --      RETURNS:                        string THE HTML built from the function
    --
    --      NOTES:
    --      This function sets up the navigation bar depending if the user has logged in or not. If the 
    --      user has logged in, it will display the pages available, with indication on which page the user is on.
    --      Along with the pages, it will also show the logout button, and who is currently logged in.
    --      If the user is logged out, a message asking the user to login is shown instead of naviagation links, with
    --      the ability to login or register in the naviagation bar.
    ----------------------------------------------------------------------------------------------------------------------*/
    protected function createNavigation($page) {
        $counter = 1;
        
        $result = '<div id="loginDiv">';
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            //$this->data['loginForm'] = '<p class="navbar-text">Welcome, '.$session_data['username'].'!</p>';

            $this->data['loginForm'] = '<form class="navbar-form navbar-left" role="search" id="loginForm" method="post"action="/login">
                <div class="navbar-text" id="minimal-nav-text">Welcome, ' . $session_data['username'] . '!</div>
                <button type="submit" value="Submit" class="btn btn-default">Log Out</button>
            </form>';  

            if ($page === 1) {
                $this->data['navLinks'] = '<li class="active"><a href="/">Homepage</a></li>
                <li><a href="/history">History</a></li>
                <li><a href="/map">Map</a></li>';
            } else if ($page === 2) {
                $this->data['navLinks'] = '<li><a href="/">Homepage</a></li>
                <li class="active"><a href="/history">History</a></li>
                <li><a href="/map">Map</a></li>';
            } else if ($page === 3) {
                $this->data['navLinks'] = '<li><a href="/">Homepage</a></li>
                <li><a href="/history">History</a></li>
                <li class="active"><a href="/map">Map</a></li>';
            }
        } else {
            $this->data['loginForm'] = '
                    <form class="navbar-form navbar-left" role="search" id="loginForm" method="post"action="/login">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" placeholder="Username">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <button type="submit" name="Submit" value="Submit" class="btn btn-default">Login</button>
                        <button type="submit" name="Submit" value="Register" class="btn btn-default">Register</button>
                  </form>';
       $this->data['navLinks'] = '<div class="navbar-text">Please login or register to browse the website.</div>';
        }
       $result .= '</div><div id="pageSelection"><ul>';
        
                
        $result .= '</ul></div>';
        
        return $result;
    }

    

    /*------------------------------------------------------------------------------------------------------------------
    --      FUNCTION:                       createTableColumns
    --
    --      DATE:                           March 20th, 2016
    --
    --      REVISIONS:                      NONE
    --
    --      DESIGNER:                       Jaegar Sarauer
    --
    --      PROGRAMMER:                     Jaegar Sarauer
    --
    --      INTERFACE:                      string createTableColumns($columnNames)
    --                                          int $columnNames = The names of the columns.
    --
    --      RETURNS:                        string THE HTML
    --
    --      NOTES:
    --      This function creates several columns, the number of columns depends on the amount of names passed in. 
    --      The column names are returned in html, depending on if the user is on mobile or not. If the user is on mobile,
    --      the columns appear smaller than on the desktop site.
    ----------------------------------------------------------------------------------------------------------------------*/
    function createTableColumns($columnNames) {
        $result = '<tr>';
        foreach($columnNames as $column) {
            $result .= '<td><h3 class="hidden-xs hidden-sm">'.$column.'</h3><h4 class="hidden-md hidden-lg">'.$column.'</h4></td>';
        }
        $result .= '</tr>';
        return $result;
    }
}

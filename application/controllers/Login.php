<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends Application {     
    public function index(){
    }
    
    /*------------------------------------------------------------------------------------------------------------------
    --      FUNCTION:                       loginAttempt
    --
    --      DATE:                           March 20th, 2016
    --
    --      REVISIONS:                      NONE
    --
    --      DESIGNER:                       Jaegar Sarauer
    --
    --      PROGRAMMER:                     Jaegar Sarauer
    --
    --      INTERFACE:                      void loginAttempt()
    --
    --      RETURNS:                        void
    --
    --      NOTES:
    --      This function is called when a PHP request is sent as an attempt to login. The data from the PHP request is 
    --      checked and parsed, and either attempts to register, login or logout a user depending on the button which was 
    --      pressed.
    ----------------------------------------------------------------------------------------------------------------------*/
    public function loginAttempt() {
        if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['Submit'])) {
            if ($_POST['Submit'] === "Submit") {
                if(!$this->setNavBarLogin($_POST['username'],$_POST['password'])) {
                    echo '<script>alert("Invalid username and password combination.")</script>';
                    redirect('/', 'refresh');
                }
            } else if ($_POST['Submit'] === "Register") {
                echo '<script>alert("' . $this->attemptRegistration($_POST['username'],$_POST['password']) . '");</script>';
                redirect('/', 'refresh');
            }
        } else {
            $this->setNavBarLogout();
        }
    }
        
    /*------------------------------------------------------------------------------------------------------------------
    --      FUNCTION:                       attemptRegistration
    --
    --      DATE:                           March 20th, 2016
    --
    --      REVISIONS:                      NONE
    --
    --      DESIGNER:                       Jaegar Sarauer
    --
    --      PROGRAMMER:                     Jaegar Sarauer
    --
    --      INTERFACE:                      void attemptRegistration(string $username, string $password)
    --                                          $username = The username to attempt to register
    --                                          $password = The password to attempt to register the user with
    --
    --      RETURNS:                        void
    --
    --      NOTES:
    --      This function attempts to register an account with the username and password passed into the function. It will
    --      return a string based on the success which is intended to be outputted to the user. The account will be created
    --      if the attempt was successful, but it won't return a boolean on if it was a success or not.
    ----------------------------------------------------------------------------------------------------------------------*/
    public function attemptRegistration($username, $password) {
        if ($this->users->queryUsername($username)) {
                return "This account already exists!";
        }
        if (strlen($username) > 0 && strlen($password) > 0) {
            $this->users->createAccount($username, $password);
            return "Account created! Please login.";
        }
        return "Error registering";
    }
        
    /*------------------------------------------------------------------------------------------------------------------
    --      FUNCTION:                       setNavBarLogin
    --
    --      DATE:                           March 20th, 2016
    --
    --      REVISIONS:                      NONE
    --
    --      DESIGNER:                       Jaegar Sarauer
    --
    --      PROGRAMMER:                     Jaegar Sarauer
    --
    --      INTERFACE:                      void attemptRegistration(string $username, string $password)
    --                                          $username = The username to attempt to login
    --                                          $password = The password to attempt to login the user with
    --
    --      RETURNS:                        void
    --
    --      NOTES:
    --      This function is for attempting to login a user. If the login was successful, the username and the confirmation
    --      that the login was successful will be saved to local session, and the user will be forewarded to the welcome
    --      screen.
    --      If login failed, the user will be pushed to the home screen and expected to re attempt the login.
    ----------------------------------------------------------------------------------------------------------------------*/
    public function setNavBarLogin($username,$password){
        $result = $this->users->queryLogin($username,$password);

        if($result)
        {
            $sess_array = array();
            foreach($result as $row)
            {
                $sess_array = array(
                    'username' => $row->username
                );
            }
            $this->session->set_userdata('logged_in', $sess_array);
            redirect('welcome', 'refresh'); //just to test if it works
            return true;
        }else{
            return false;
        }
    }
        
    /*------------------------------------------------------------------------------------------------------------------
    --      FUNCTION:                       setNavBarLogout
    --
    --      DATE:                           March 20th, 2016
    --
    --      REVISIONS:                      NONE
    --
    --      DESIGNER:                       Jaegar Sarauer
    --
    --      PROGRAMMER:                     Jaegar Sarauer
    --
    --      INTERFACE:                      void attemptRegistration()
    --
    --      RETURNS:                        void
    --
    --      NOTES:
    --      This function will delete the userdata indicating the user is logged in, then put the user in the welcome screen.
    --      This will successfully logout the user.
    ----------------------------------------------------------------------------------------------------------------------*/
    public function setNavBarLogout(){
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('welcome', 'refresh');
    }
}






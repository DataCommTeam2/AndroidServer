<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class Users extends MY_Model {
    
    function __construct() {
        parent::__construct('users','username');
    }
    
    /*------------------------------------------------------------------------------------------------------------------
    --      FUNCTION:                       queryLogin
    --
    --      DATE:                           March 20th, 2016
    --
    --      REVISIONS:                      NONE
    --
    --      DESIGNER:                       Jaegar Sarauer
    --
    --      PROGRAMMER:                     Jaegar Sarauer
    --
    --      INTERFACE:                      boolean queryLogin($username, $password)
    --                                          string $username = The username to look up in the database.
    --                                          string $password = The password to look up in the database.
    --
    --      RETURNS:                        boolean = Does the user and password match a key in the database.
    --
    --      NOTES:
    --      This function checks the database for a username and password, and returns if there was a match for both fields
    --      which make up one key.
    --      If the username and password match an entry in the database, the function will return true. If no key is found,
    --      if will return false.
    ----------------------------------------------------------------------------------------------------------------------*/
    function queryLogin($username, $password) {
        $this -> db -> select('username, password');
        $this -> db -> from('users');
        $this -> db -> where('username', $username);
        $this -> db -> where('password', $password);

        $result = $this-> db ->get();

        if($result -> num_rows() == 1){
            return $result->result();
        }
        else{
            return false;
        }
    }
    
    /*------------------------------------------------------------------------------------------------------------------
    --      FUNCTION:                       queryUsername
    --
    --      DATE:                           March 20th, 2016
    --
    --      REVISIONS:                      NONE
    --
    --      DESIGNER:                       Jaegar Sarauer
    --
    --      PROGRAMMER:                     Jaegar Sarauer
    --
    --      INTERFACE:                      boolean queryLogin($username)
    --                                          string $username = The username to look up in the database.
    --
    --      RETURNS:                        boolean = Does the username exist in the database.
    --
    --      NOTES:
    --      This function checks the database for a username and returns true or false if it was found in the database.
    --      This function is intended to be used to check if registration under that username may happen.
    ----------------------------------------------------------------------------------------------------------------------*/
    function queryUsername($username) {
        $this->db->select('username');
        $this->db->from('users');
        $this->db->where('username', $username);
        
        $result = $this-> db ->get();
        
        if($result -> num_rows() == 1){
            return $result->result();
        }
        else{
            return false;
        }
    }
    
    
    /*------------------------------------------------------------------------------------------------------------------
    --      FUNCTION:                       createAccount
    --
    --      DATE:                           March 20th, 2016
    --
    --      REVISIONS:                      NONE
    --
    --      DESIGNER:                       Jaegar Sarauer
    --
    --      PROGRAMMER:                     Jaegar Sarauer
    --
    --      INTERFACE:                      void queryLogin($username)
    --                                          string $username = The username to insert into the database.
    --                                          string $password = The password to insert into the database.
    --
    --      RETURNS:                        void
    --
    --      NOTES:
    --      This function inserts a username and password into the database as one key, indicating a new user.
    ----------------------------------------------------------------------------------------------------------------------*/
    function createAccount($username, $password) {
        $ins = array('username' => $username, 
            'password' => $password, 
            'deviceid' => '');
        $this->db->insert('users', $ins);
    }

}
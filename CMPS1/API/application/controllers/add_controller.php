<?php
/**
 * Created by PhpStorm.
 * User: sthas
 * Date: 10/13/2015
 * Time: 6:10 PM
 */
class Add_controller extends CI_Controller{
    function addUser(){
        $json = key($this->input->post(NULL, TRUE));
        $json = json_decode($json);
        $firstname = $json->firstname;
        $lastname = $json->lastname;
        $username = $json->username;
        $password = $json->password;
        $position = $json->position;
        $email = $json->email;

    }
}
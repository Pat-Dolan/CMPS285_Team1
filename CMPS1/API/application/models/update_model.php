<?php
class Update_model extends CI_Model
{
    function addUser($data){
        $query = array(
             'first_name' => $data['firstname'],
             'last_name' => $data['lastname'],
             'username' => $data['username'],
             'password' => $data['password'],
             'email' => $data['email'],
             'type' => $data['type']
        );
        $this->db->insert('users', $query);
    }

    function deleteUser($username){
    	$this->db->delete('users', array('username' => $username));
    }

    function getUser($username){
    	$query = $this->db->get_where('users', array('username' => $username));
    	return $query->result();
    }

    function editUser(){

    }

    function getAll(){

    }

}
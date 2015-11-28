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
        $row = $query->row_array();

        $results = array(
            'success' => true,
            'username' => $row['username'],
            'first_name' => $row['first_name'],
            'last_name' => $row['last_name'],
            'email' => $row['email'],
            'type' => $row['type']

        );

        return $results;
    }

    function editUser(){

    }

    function getAll(){

    }

}
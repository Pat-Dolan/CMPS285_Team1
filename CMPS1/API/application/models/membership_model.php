<?php

class Membership_model extends CI_Model
{
    function validate($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('users');
        if ($query->num_rows() == 1) {
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
            //verify user is logged in, and if not, redirect to the login page


        }

    }

}
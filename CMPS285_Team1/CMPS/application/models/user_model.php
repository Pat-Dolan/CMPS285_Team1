<?php

class User_model extends CI_Model
{

	protected $tablename = 'users';

	public function __construct()
	{
		parent::__construct();
	}

	public function AddUser($first_name=null, $last_name=null, $username=null, $password=null, $email=null)
	{
		if (is_null($first_name) || is_null($last_name) || is_null($username) || is_null($password) || is_null($email))
		{
			return false;
		}

		$data = array('first_name'=>$first_name, 'last_name'=>$last_name, 'username'=>$username, 'password'=>$password, 'email'=>$email);
		$this->db->insert($this->tablename, $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

	public function ListAll()
	{
		$users = $this->db->get($this->tablename)->result();	
		return $users;
	}
	
}
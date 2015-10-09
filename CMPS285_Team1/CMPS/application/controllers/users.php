<?php 

class Users extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("user_model");
	}

	public function index()
	{
		$data["include"] = "user/index";		
		$this->load->view("users/home", $data);
	}

	public function add()
	{
		$postdata = file_get_contents("php://input");
		$request = json_decode($postdata);
		$first_name = $request->first_name;
		$last_name = $request->last_name;
		$username = $request->username;
		$password = $request->password;
		$email = $request->email;
		$id = $this->user_model->AddUser($first_name, $last_name,$username,$password, $email);
		
		$return = array();

		if ($id)
		{
			$return['status'] = 'success';
			$return['message'] = 'Item successfully added.';
		}
		else
		{
			$return['status'] = 'error';
			$return['message'] = 'Error adding the item, try again.';
		}

		
		print_r(json_encode($return));		
		
	}


	public function listAll()
	{
		$users = $this->user_model->ListAll();
		print_r(json_encode($users));
		// print_r(json_encode(array(array('name'=>'Kaio Santos', 'city'=>'abc'), array('name'=>'Bruna Santos', 'city'=>'abc'), array('name'=>'Julia Santos', 'city'=>'abc') )));
	}
}
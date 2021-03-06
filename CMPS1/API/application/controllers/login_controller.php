<?php

class Login_controller extends CI_Controller
{

    function validate()
    {
//       when posting  json data to the api
        $json = json_decode(trim(file_get_contents('php://input')), true);
        $username = $json['username'];
        $password = md5($json['password']);
////        when posting with a normal post method with parameters
//        $username = $this->input->post('username');
//        $password = md5($this->input->post('password'));
        $this->load->model('membership_model');
        $query = $this->membership_model->validate($username, $password);

         if (isset($query)) {
            $data= $query;
        } else {
            $data['success'] = false;
            $data['message'] = "Username or password is incorrect";
        }
        // if (isset($query)) {
        //     $data = $query;
        // } else {
        //     $data['status'] = false;
        // }

//        $this->load->view('verify', $data);
        echo json_encode($data);
    }
}
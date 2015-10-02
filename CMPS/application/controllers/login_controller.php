<?php
class Login_controller extends CI_Controller
{

    function validate(){
//       when posting  json data to the api
        $json = key($this->input->post(NULL, TRUE));
        $json = json_decode($json);
        $username = $json->username;
        $password = md5($json->password);
//        when posting with a normal post method with parameters
//        $username = $this->input->post('username');
//        $password = md5($this->input->post('password'));
        $this->load->model('membership_model');
        $query = $this->membership_model->validate($username,$password);
        if($query) {
            $data['status'] = 'Logged in';
        }
        else{
            $data['status'] = 'not logged in ';
        }

        $this->load->view('verify', $data);
    }

}
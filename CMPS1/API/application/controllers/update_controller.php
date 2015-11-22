<?php

/**
 * Created by PhpStorm.
 * User: sthas
 * Date: 10/13/2015
 * Time: 6:10 PM
 */
class Update_controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('update_model');
    }

    function addUser()
    {
        $json = key($this->input->post(NULL, TRUE));
        $json = json_decode($json);

        $data['firstname'] = $json->firstname;
        $data['lastname'] = $json->lastname;
        $data['username'] = $json->username;
        $data['password'] = md5($json->password);
        $data['email'] = $json->email;
        $data['type'] = $json->type;

//       $data['firstname'] = $this->input->post('firstname');
//       $data['lastname'] = $this->input->post('lastname');
//       $data['username'] = $this->input->post('username');
//       $data['password'] = md5($this->input->post('password'));
//       $data['email'] = $this->input->post('email');
//       $data['type'] = $this->input->post('type');


        $query = $this->update_model->addUser($data);

    }

    function deleteUser()
    {
        $json = key($this->input->post(NULL, TRUE));
        $json = json_decode($json);
        $username = $json->username;
//         $username = $this->input->post('username');
        $query = $this->update_model->deleteUser($username);
    }

    function getUser()
    {
//        $json = key($this->input->post(NULL, TRUE));
//        $json = json_decode($json);
//        $username = $json->username;

        $username = $this->input->post('username');

        $query  = $this->update_model->getUser($username);

        echo json_encode($query);
    }
}
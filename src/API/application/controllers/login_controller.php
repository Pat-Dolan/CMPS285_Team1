<?php
class Login_controller extends CI_Controller
{

    function index()
    {
        $this->load->view('includes/header');
        $this->load->view('login');
        $this->load->view('includes/footer');

    }
    function validate_credentials()
    {
        $this->load->model('membership_model');
        $query = $this->membership_model->validate();
        if ($query) {
            $data = array(
                'username' => $this->input->post('username'),
                'is_logged_in' => true
            );
            $this->session->set_userdata($data);
            redirect('site/members_area');
        } else {
            $this->index();
        }
    }
    function sign_up()
    {

            $this->load->view('includes/header');
            $this->load->view('register');
            $this->load->view('includes/footer');
    }

    function create_member()
    {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('first_name', 'Name', 'trim|required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
            $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
            $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]');

        $this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'trim|required|matches[password]');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('includes/header');
                $this->load->view('register');
                $this->load->view('includes/footer');
            }
            else{
                $this->load->model('membership_model');

                if ($query = $this->membership_model->create_member()) {
                    $data['account_created'] = 'Your account has been created';
                    $this->load->view('includes/header');
                    $this->load->view('login', $data);
                    $this->load->view('includes/footer');
                }
                else{
                    $this->load->view('includes/header');
                    $this->load->view('register');
                    $this->load->view('includes/footer');
                }

            }

    }

}
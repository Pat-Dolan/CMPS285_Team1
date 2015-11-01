<?php

class News_controller extends CI_Controller{

    function news(){
        $this->load->model('news_model');
        $data = $this->news_model->get_news();
        echo (json_encode($data));

    }
}
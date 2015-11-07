<?php
class News_model extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }
    function get_news(){

        $query = $this->db->get('news' , 10);
        return $query->result();

    }

}
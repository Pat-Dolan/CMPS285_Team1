<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Upload_Controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function do_upload(){
        $config = array(
            'upload_path' => "./uploads/",
            'allowed_types' => "gif|jpg|png|doc|docx|pdf",
            'overwrite' => TRUE,
            'max_size' => "2048000"// Can be set to particular file size , here it is 2 MB(2048 Kb)
        );
        $this->load->library('upload', $config);

            $data = array('upload_data' => $this->upload->data());
            

    }
}

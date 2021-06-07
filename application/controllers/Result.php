<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Result extends CI_Controller{

        public function index(){
            
            $data['upcoming_events'] = $this->db->query("SELECT * FROM lottery where start_date > '$today_date'")->result_array();
            
            $this->load->view('Result',$data);
        }
    }
?>
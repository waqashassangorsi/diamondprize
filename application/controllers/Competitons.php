<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Competitons extends CI_Controller{
        
        public function __construct()
	{
	    
		parent::__construct();
		
    		$this->load->helper('url');
    		$this->load->model('Common');
    	}
	
        public function index(){
            $today_date = date("Y-m-d");
            $data['lottery'] = $this->db->query("SELECT lottery.* FROM lottery inner join tickets on tickets.lottery_id=lottery.lottery_id where ending_date > '$today_date'")->result_array();
            
            
            //echo "<pre>";var_dump($emailsent);
            
            $this->load->view('Competitons',$data);
        }
    }
?>
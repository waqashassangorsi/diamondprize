<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Tickets extends CI_Controller{
        
        public function __construct()
	    {
	    
		parent::__construct();
		
    		$this->load->helper('url');
    		$this->load->model('Common');
    	}
    	
        public function index($lottery_id){
            
            $data['lottery'] = $this->db->query("SELECT * FROM lottery WHERE lottery_id = $lottery_id")->result_array()[0];
            $data['images'] = $this->db->query("SELECT * FROM lottery_images WHERE lottery_id = $lottery_id")->result_array();
            $data['ticket'] = $this->db->query("SELECT * FROM tickets WHERE lottery_id = $lottery_id ")->result_array()[0];
            
            $data['questions'] = $this->db->query("SELECT * FROM questions where lottery_id='$lottery_id' order by id desc limit 1")->result_array();
            if(empty($data['questions'])){
                $this->session->set_flashdata("fail","Something went wrong for this lottery.");
                redirect(SURL.'Home');
            }
            $data['total_purchased_tickets'] = $this->db->query("select count(*) as total from ticket_purchased where lottery_id='$lottery_id' and u_id='".$this->session->userdata('Enduser')."'")->result_array()[0]['total'];
            $this->load->view('Tickets',$data);
        }
    }
?>
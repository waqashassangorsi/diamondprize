<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TicketsPurchase extends CI_Controller{


    public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('url');
		$this->load->model('Common');
		
	}



    public function index(){
            
        
        $data['result'] = $this->db->query("select * from ticket_purchased")->result_array();
        
        //echo "<pre>";var_dump($data['result']);exit;
        
        $this->load->view('TicketsPurchase',$data);
            
    }
}
?>
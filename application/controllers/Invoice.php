<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class Invoice extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
	}


	public function index($id){ 
		$id = intval($id);
// 		$data['record'] = $this->db->query("select ticket_purchased.*,users.*,lottery.* from ticket_purchased inner join users on users.u_id=ticket_purchased.u_id inner join lottery on lottery.lottery_id=ticket_purchased.lottery_id where purchase_id='$id'")->result_array()[0];
// 		//echo "<pre>";var_dump($data['record']);
		
//         $html = $this->load->view("invoice.php",$data);
        
        $html = $this->load->view("email.php",$data,true);
        $emailsent = $this->Common->send_email("waqashassan100@gmail.com", 'Verify Email', $html);
        //echo "<pre>";var_dump($emailsent);    
	}

	

}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class LotteryReport extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		 $this->load->library('Check');
		 $this->load->model('Common');
		
	}


	public function index(){ 
// =============================================fix data starts here====================================================
        $data['user'] = $this->check->Login(); 
	    $data['Controller_url'] = "admin/LotteryReport/";   
	    $data['Controller_name'] = " Lottery Report";
        $data['Newcaption'] = "All Lottery Report";
// =============================================fix data ends here====================================================


		 
        $data['lottery'] = $this->db->query("select * from lottery ")->result_array();
        
	    $data['purches'] = $this->db->query("select * from ticket_purchased")->result_array();
		//echo "<pre>";var_dump($data['lottery']);exit;
		 
		 //$this->load->view('admin/LotteryReport.php',$data);
		 
		 $this->load->view('admin/LotteryReportResult.php',$data);
		 
	}
	
	public function lotteryrecord(){
	  
	    if($this->input->post('lottery') != ''){
	        
	        $lottery_id = $this->input->post('lottery');
	        
	        
	        if($lottery_id == 0){
	            
	            $data['purches'] = $this->db->query("select * from ticket_purchased")->result_array();
	            //echo "<pre>";var_dump($data['lottery']);exit;
	            
	        }else{
	            
	            $lottery = $this->db->query("select * from lottery where lottery_id = '".$value['lottery_id']."'")->result_array()[0];
	            $data['purches'] = $this->db->query("select * from ticket_purchased where lottery_id = $lottery_id")->result_array();
	            
	            //$data['lottery'] = $this->db->query("select * from lottery where lottery_id='".$lottery_id."'")->result_array();
	            //echo "<pre>";var_dump($data['purches']);exit;
	        }
	        
	    }
	    
	    $this->load->view('admin/LotteryReportResult.php',$data);
	    
	}
	
	


	

	

}
?>
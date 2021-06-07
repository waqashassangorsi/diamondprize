<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->library('Check');
		$this->load->model('Common');
	}

	public function index(){

		//var_dump($this->session->userdata()); exit;
// =============================================fix data starts here====================================================
		$data['user'] = $this->check->Login(); 
	
// =============================================fix data ends here====================================================
		$con['conditions']=array();
		$data['totallottery'] = $this->common->count_record("lottery",$con);

		$con['conditions']=array("user_status"=>"0");
		$data['total_users'] = $this->common->count_record("users",$con);

		$data['total_earning'] = $this->db->query("select sum(damount-camount) as total from transactions where u_id='0'")->result_array()[0]['total'];
		
		$startdate = date("Y-m-1"); 
		$end_date = date("Y-m-t");
		
		$data['total_earning'] = $this->db->query("select sum(damount-camount) as total from transactions where u_id='0' and date between '$startdate' and '$end_date'")->result_array()[0]['total'];

		$con['conditions']=array("privilidge"=>"2");
		$data['Rejected'] = $this->common->count_record("users",$con);
		
		$this->load->view("admin/index",$data);
	}

	
}
?>
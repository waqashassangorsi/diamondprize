<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class Facialrecognition extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		 $this->load->library('Check');
		 $this->load->model('Common');
		
	}


	public function index(){ 
		
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "Facialrecognition/";
		 $data['Controller_name'] = "All Record";
		 $data['Newcaption'] = "All Record";
// =============================================fix data ends here====================================================


		 $con['conditions'] = array("user_status"=>"0");
         $data['users'] = $this->Common->get_rows("users", $con);
         //echo "<pre>"; var_dump($data['users']);
		 $this->load->view("Facialrecognition.php",$data);
	}
	
	public function detail($id){ 
		
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "Facialrecognition/";
		 $data['Controller_name'] = "All History";
		 $data['Newcaption'] = "All History";
// =============================================fix data ends here====================================================


		 $con['conditions'] = array("u_id"=>$id);
         $data['record'] = array_reverse($this->Common->get_rows("locations", $con));
         //echo "<pre>"; var_dump($data['users']);
		 $this->load->view("Facialrecognitiondetail.php",$data);
	}
	
	public function ok($id){ 

		 $query = $this->db->query("update locations set aprovalstatus='Ok' where id=(select max(id) from locations where u_id='$id')");
		 if($query){
		     $this->session->set_flashdata("success","Record Updated.");
		 }else{
		     $this->session->set_flashdata("fail","Record Updated.");
		 }
		 
		 redirect(SURL.'Facialrecognition');
	}
	
	public function notok($id){ 

		 $query = $this->db->query("update locations set aprovalstatus='Fail' where id=(select max(id) from locations where u_id='$id')");
		 if($query){
		     $this->session->set_flashdata("success","Record Updated.");
		 }else{
		     $this->session->set_flashdata("fail","Record Updated.");
		 }
		 
		 redirect(SURL.'Facialrecognition');
	}


}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class Ticketpurchased extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		 $this->load->library('Check');
		  $this->load->library('Uploadimage');
		 $this->load->model('Common');
		 $this->load->library('form_validation');
		 $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
	}


	public function index(){ 
		
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "admin/Ticketpurchased";
		 $data['Controller_name'] = "All Sold Ticket";
		 $data['Newcaption'] = "All Sold Ticket";
// =============================================fix data ends here====================================================

		 $con['conditions']=array();
		 $data['record'] = $this->common->get_rows("lottery",$con);
		 $this->load->view("admin/Ticketpurchased.php",$data);
	}

	public function AddLanguage(){ 

// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "admin/Language/";
		 $data['Controller_name'] = "admin/All Language";
		 $data['method_url'] = "admin/Language/AddLanguage";
		 $data['method_name'] = "admin/Add Language";
		
// =============================================fix data ends here====================================================		
		if(!empty($this->input->post("name"))){ //var_dump($this->input->post()); exit;
			$array = array("name"=>$this->input->post("name"));

			if(!empty($this->input->post("edit"))){

				$con['conditions']=array("id"=>$this->input->post("edit"));
				$query = $this->common->update("languages",$array,$con);
			}else{
				$query = $this->common->insert("languages",$array);
			}
			
			if($query){
				$this->session->set_flashdata('success','Language Added Successfully');
				 redirect("/Language");
			 }else{
				 $this->session->set_flashdata('fail','Some error occured,plz try again later');
				redirect("/Language");
			 }
		}
		$this->load->view("admin/addLanguage.php",$data);
		
	}

	public function edit($id){ 

	// =============================================fix data starts here====================================================
		$data['user'] = $this->check->Login(); 
		$data['Controller_url'] = "Language/";
		$data['Controller_name'] = "All Language";
		$data['method_url'] = "Language/AddLanguage";
		$data['method_name'] = "Add Language";
		
	// =============================================fix data ends here====================================================		
		
		$con['conditions']=array("id"=>$id);
		$data['record'] = $this->common->get_rows("languages",$con)[0];
		$this->load->view("admin/addLanguage.php",$data);
				
	}


	public function delete($id){
		$id = intval($id);
		$data['user'] = $this->check->Login();

		$query = $this->common->delete("languages",array("id"=>$id));

		if($query){
			$this->session->set_flashdata('success','Language Deleted Successfully');
         	redirect("/Language");
         }else{
         	$this->session->set_flashdata('fail','Some error occured,plz try again later');
			redirect("/Language");
         }

	}



}
?>
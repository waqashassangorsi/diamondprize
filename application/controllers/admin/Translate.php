<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class Translate extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		 $this->load->library('Check');
		  $this->load->library('Uploadimage');
		 $this->load->model('Common');
		
	}


	public function index(){ 
		
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "admin/Translate/";
		 $data['Controller_name'] = "All Translate";
		 $data['Newcaption'] = "All Translate";
// =============================================fix data ends here====================================================


		 $con['conditions'] = array();
		 $data['record'] = $this->Common->get_rows("questions", $con);
		 
		 

		 $this->load->view("admin/Questions.php",$data);
	}

	public function Add(){ 

// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "Translate/";
		 $data['Controller_name'] = "All Translate";
		 $data['method_url'] = "Translate/Add";
		 $data['method_name'] = "Add Translate";
	
// =============================================fix data ends here====================================================
		$query = $this->db->query("select * from languages where id not in(select lang_id from questions)")->result_array();
		
		if(empty($this->input->post("edit"))){
    		if(empty($query)){
    			$this->session->set_flashdata('fail','No language found that can be translated.');
    			redirect("/Translate");
    		}
		}
		//echo "<pre></pre>";var_dump($this->input->post());exit;
		$data['languages'] = $query;

		if(!empty($this->input->post("resend"))){

			$array = array(
							"identity_no"=>$this->input->post("identity_no"),
							"f_name"=>$this->input->post("f_name"),
							"l_name"=>$this->input->post("last_name"),
							"gender"=>$this->input->post("gender"),
							"Male"=>$this->input->post("Male"),
							"Female"=>$this->input->post("Female"),
							"dob"=>$this->input->post("dob"),
							"address_line_1"=>$this->input->post("addres_line_1"),
							"address_line_2"=>$this->input->post("addres_line_2"),
							"neighbourhood"=>$this->input->post("neighbourhood"),
							"city"=>$this->input->post("city"),
							"country"=>$this->input->post("country"),
							"mobile_no"=>$this->input->post("mobile_no"),
							"contract_no"=>$this->input->post("contract_no"),
							"Take_photo"=>$this->input->post("Take_photo"),
							"Next"=>$this->input->post("Next"),
							"primary_mobile_no"=>$this->input->post("primary_mobile_no"),
							"secondary_mobile_no"=>$this->input->post("secondary_mobile_no"),
							"otp_has_Sent_primary_no"=>$this->input->post("otp_has_Sent_primary_no"),
							"write_otp_here"=>$this->input->post("write_otp_here"),
							"didnt_get_code"=>$this->input->post("didnt_get_code"),
							"resend"=>$this->input->post("resend"),
							"lang_id"=>$this->input->post("lang"),
						 );

			if(!empty($this->input->post("edit"))){
				$con['conditions']=array("id"=>$this->input->post("edit"));
				$query = $this->common->update("questions",$array,$con);
			}else{
				$query = $this->common->insert("questions",$array);
			}			 
			
			
			if($query){
				$this->session->set_flashdata('success','Added Successfully');
				 redirect("/Translate");
			 }else{
				 $this->session->set_flashdata('fail','Some error occured,plz try again later');
				redirect("/Translate");
			 }
			
		}
	
		$this->load->view("admin/AddQuestions.php",$data);
	}

	public function edit($id){

		$data['user'] = $this->check->Login(); 
		$data['Controller_url'] = "Translate/";
		$data['Controller_name'] = "All Translate";
		$data['method_url'] = "Translate/Add";
		$data['method_name'] = "Add Translate";

		$query = $this->db->query("select * from languages where id not in(select lang_id from questions)
								   union
								   select languages.* from questions inner join languages on languages.id=lang_id where questions.id='$id'")->result_array();
		$data['languages'] = $query;

		$con['conditions'] = array("id"=>$id);
		$data['record'] = $this->Common->get_single_row("questions", $con);

		$this->load->view("admin/AddQuestions.php",$data);

	}

	
	public function delete($id){
		$id = intval($id);
		$data['user'] = $this->check->Login();

		$query = $this->common->delete("questions",array("id"=>$id));

		if($query){
			$this->session->set_flashdata('success','Deleted Successfully');
         	redirect("/Translate");
         }else{
         	$this->session->set_flashdata('fail','Some error occured,plz try again later');
			redirect("/Translate");
         }

	}



}
?>
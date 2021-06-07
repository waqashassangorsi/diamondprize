<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class Subcribers extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		 $this->load->library('Check');
		 $this->load->model('Common');
		 $this->load->library('form_validation');
		 $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
	}


	public function index(){ 
		
		$post=$this->input->post('subscribe');
		$array = array('email'=>$post);
		$query=$this->Common->insert('subscribers',$array);
		if($query)
		{
		    $this->session->set_flashdata("success","Subscribed Successfully");
			redirect(SURL."Home");
		}
		else
		{
		      $this->session->set_flashdata("fail","Something went wrong");
			redirect(SURL."Home");
		}
	}





 




}
?>
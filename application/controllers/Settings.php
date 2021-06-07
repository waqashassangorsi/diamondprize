<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class Lottery extends CI_Controller{
	
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
		 $data['Controller_url'] = "admin/Lottery/";
		 $data['Controller_name'] = "All Lottery";
		 $data['Newcaption'] = "All Lottery";
// =============================================fix data ends here====================================================

		$con['conditions']=array();
		$data['record'] = $this->common->get_rows("users",$con);
		 $this->load->view("Setting.php",$data);
	}





 




}
?>
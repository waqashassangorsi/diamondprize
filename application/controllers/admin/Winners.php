<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class Winners extends CI_Controller{
	
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
		 $data['Controller_url'] = "admin/Winners/";
		 $data['Controller_name'] = "All Winners";
		 $data['Newcaption'] = "All Winners";
// =============================================fix data ends here====================================================

		 $data['record'] = $this->db->query("select winners.*,users.*,lottery.* from winners inner join users on users.u_id=winners.u_id inner join lottery on lottery.lottery_id=winners.lottery_id")->result_array(); 
		 $this->load->view("admin/Winners.php",$data);
	}
	
	public function delete($id){
	    
    	$id = intval($id);
		$data['user'] = $this->check->Login();
		
		$query=$this->common->delete("winners",array("winner_id"=>$id));
		if($query)
		{
		      $this->session->set_flashdata('success','winners Deleted Successfully');
         	  redirect("admin/Winners");
		}
		
		else
		{
		    $this->session->set_flashdata('fail','Something wrong');
         	redirect("admin/Winners");
		    
		}
    }


}
?>
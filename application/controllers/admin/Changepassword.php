<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class changepassword extends CI_Controller{
	
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
		 $data['Controller_url'] = "admin/changepassword/";
		 $data['Controller_name'] = "Change Password";
		 $data['Newcaption'] = "Change Password";
// =============================================fix data ends here====================================================

		//$con['conditions']=array();
		//$data['record'] = $this->common->get_rows("lottery",$con);
		//$data['record'] = $this->Common->get_rows("tickets",$con);
		$con['conditions']=array("u_id"=>$this->session->userdata('user'));
       	$data['record'] = $this->common->get_single_row("users",$con);
		 $this->load->view("admin/changepassword.php",$data);
	}
	
	
		public function insert(){ 
		
		$data['user'] = $this->check->Login(); 
		$currentpass=sha1($this->input->post('currentpass'));
		$newpass=$this->input->post('newpass');
		$cofirmpass=$this->input->post('confirmpass');
		$userpass=$this->input->post('userpass');
		$uid2=$this->input->post('userid');
		
		if(	$currentpass==$userpass)
		{
		    if($newpass==$cofirmpass)
		    {
		    $array = array('password' => sha1($newpass),
						);
		    $con['conditions'] = array('u_id' =>$uid2); 
	 	    $query = $this->common->update("users",$array,$con);
	 	    
		    if($query){
		        
            $this->session->set_flashdata('success','Your Succefully Change the Password.');
            redirect(SURL.'admin/changepassword');
            }else{
                
            $this->session->set_flashdata('fail','Something went wrong.Please try again later.');
			 redirect(SURL.'admin/changepassword');
                }
                
		        
		    }
		    
		    else
		    {
		        
		    $this->session->set_flashdata('fail','New Password and Confirm Password  Not Matched.');
			redirect(SURL.'admin/changepassword');
		    }
		    
		}else
		{
		  $this->session->set_flashdata('fail','Password Not Matched.');
		  redirect(SURL.'admin/changepassword');
		}
		
		 $this->load->view("admin/changepassword.php",$data);
	}
	
	
	





}
?>
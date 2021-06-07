<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class AllUsers extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->library('Check');
		$this->load->model('Common');
		$this->load->library('form_validation');
		$this->load->library('Uploadimage');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		//error_reporting(E_ALL);
		
	}


	public function index(){ 
		
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "admin/Employee/";
		 $data['Controller_name'] = "All Users";
		 $data['Newcaption'] = "All Users";
// =============================================fix data ends here====================================================


		 $con['conditions'] = array("user_status" =>"0");
         $data['Employees'] = $this->Common->get_rows("users", $con);

		 $this->load->view("admin/AllUsers.php",$data);
	}
	
	public function viewuser($u_id){ 
		
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "admin/Employee/";
		 $data['Controller_name'] = "All Users";
		 $data['Newcaption'] = "All Users";
// =============================================fix data ends here====================================================

		 $con['conditions'] = array("u_id" =>$u_id);
         $data['record'] = $this->Common->get_rows("users", $con)[0];
         
         //echo "<pre>";var_dump($data['record']);

		 $this->load->view("admin/userdetail.php",$data);
	}
	
	public function EditUser($u_id){
	    // =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "admin/AllUsers/";
		 $data['Controller_name'] = "Edit Users";
		 $data['Newcaption'] = "Edit Users";
        // =============================================fix data ends here====================================================
	    
	    $con['conditions'] = array("u_id" =>$u_id);
        $data['result'] = $this->Common->get_rows("users", $con)[0];
        //var_dump($data['result']);exit;
	    
	    $this->load->view('admin/Edit_User.php',$data);
	}
	
	public function UpdateUser(){
	    
	    if(!empty($this->input->post("name"))){
	        
	        $directory = 'uploads/';
			$alowedtype = "*";
			$results = $this->uploadimage->singleuploadfile($directory,$alowedtype,"profile_image");
			
			$uid2 = $this->session->userdata('user');
			
    			if(!empty($results[0]['file_name'])){
    			    $dp = $directory.$results[0]['file_name'];
    			}else{
				    $sql = $this->db->query("select * from users where u_id = ".$uid2."")->result_array()[0];//echo $sql['dp'];exit;
			        $dp = $sql['dp'];
				}
			$array = array(
	                    "fname"=>$this->input->post("name"),
	                    "dp"=>$dp,
	            );
	           //echo "<pre>";var_dump($array);exit;
	       $user_id = $this->input->post('u_id');
	       //echo $user_id;exit;
	       $con['conditions']=array("u_id"=>"$user_id");
	       $query = $this->Common->update("users",$array,$con);
	       if($query){
	           $this->session->set_flashdata('success','record update');
	           redirect(SURL.'admin/AllUsers');
	       }else{
	           $this->session->set_flashdata('fail','sorry somethig is worng');
	       }
	    }
	    
	    $this->load->view('admin/Edit_User.php',$data);
	}


}
?>
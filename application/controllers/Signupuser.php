<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signupuser extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('url');
		$this->load->model('Common');
	}

	public function index()
	{   
	    if($this->session->userdata("Enduser")){
            redirect(SURL."Myaccount/Setting");            
        }
        
        if(!empty($this->input->post("email"))){
	        
	        $name = ucwords($this->input->post("name"));
			$email = $this->input->post("email");
			$pass = $this->input->post("pass");
			

			if($password==$repassword){

				$chkemail = $this->db->query("select * from users where email='$email'");
				
				if($chkemail->num_rows() > 0){
			        $this->session->set_flashdata("fail","Email Already Exists");
          	        redirect(SURL."Signupuser");
				}else{
					$this->db->trans_start();

					$array = array(
									"fname"=>$name,
									"email"=>$email,
									"password"=>sha1($pass),
									"dp"=>"assets/images/dp.png",
									"joining_date"=>date("Y-m-d"),
									"user_status"=>"0"
								);

					$lastrecord = $this->Common->insert("users",$array);   
					
					$data['email'] = $email;
					$html = $this->load->view("email.php",$data,true);
                    $emailsent = $this->Common->send_email($email, 'Diamond Prize', $html);
        
					$this->session->set_userdata("Enduser",$lastrecord);

					$this->db->trans_complete();
					
					if($this->db->trans_status() === FALSE){
					    $this->session->set_flashdata("fail","Something went wrong. please try again later.");
						redirect(SURL."Signupuser");
					}else{
					   	redirect(SURL."Myaccount/Setting");
					}
				}	
				
			}else{
			     $this->session->set_flashdata("fail","Password and Conform password does not match");
				//$data['error']="Password Doesnt match with each other.";
				redirect(base_url("Signupuser"));
			}
	    }
        
		$this->load->view("Signupuser", $data);
		
	}
	
    public function secondpage()
	{   
	    
	    
	  
        $this->load->view("Signupuser2", $data);
		
	}
	
	
	public function emailtemp(){
	    
	    $this->load->view('EmailAddcard');
	}
	
	
}

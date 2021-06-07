<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loginuser extends CI_Controller {

	public function __construct()
	{
	    
		parent::__construct();
		
		$this->load->helper('url');
		$this->load->model('Common');
		$this->load->library('Googleplus');
		$this->load->library('facebook');
	}

	public function index()
	{   
        
        if($this->session->userdata("Enduser")){
            redirect(SURL."Myaccount/Setting");            
        }
        
        $data['error'] = "";
	    if(!empty($this->input->post("user_email"))){
            $email = $this->input->post("user_email");
            $password = sha1($this->input->post("user_password"));
            
            $chkuser = $this->db->query("select * from users where email='$email' and password='$password'")->result_array()[0];
            //echo "<pre>";var_dump($query); exit;
            
            if($chkuser){
				$this->session->set_userdata("Enduser",$chkuser['u_id']);
				redirect(SURL.'Myaccount');
				
			}else{
				$this->session->set_flashdata("fail","Something Went Wrong Please fill all details");
				redirect(SURL.'Loginuser');
			}
        }

        $data['FBauthUrl'] = $this->facebook->login_url();
        $data['googleURL'] = $this->googleplus->loginURL();

		
		$this->load->view("Loginuser", $data);
    }
    
    public function google_response(){

        if(isset($_GET['code'])){

           $this->googleplus->getAuthenticate();
           $email=$this->googleplus->getUserInfo()['email']; 
           $fname=$this->googleplus->getUserInfo()['given_name']; 
           $lname=$this->googleplus->getUserInfo()['family_name']; 

           $con['conditions'] = array("email"=>$email);
           $userrecord = $this->Common->get_single_row("users", $con);

           if($userrecord == True){

                $this->session->set_userdata("Enduser",$userrecord->u_id);
                redirect(SURL."Myaccount/Setting");

           }else{

                if(empty($email)){
                    redirect(SURL."Loginuser");
                }

                $this->db->trans_start();
                $name = ucwords($fname." ".$lname);
               
                $array = array(
								"fname"=>$name,
								"email"=>$email,
								"dp"=>"assets/images/dp.png",
								"joining_date"=>date("Y-m-d"),
								"user_status"=>"0",
								"auth"=>"Google",
							);            

                $lastrecord = $this->Common->insert("users",$array);   
                $this->session->set_userdata("Enduser",$lastrecord);
                
                $data['email'] = $email;
				$html = $this->load->view("email.php",$data,true);
                $emailsent = $this->Common->send_email($email, 'Diamond Prize', $html);

                $this->db->trans_complete();
                
                if($this->db->trans_status() === FALSE){
                    redirect(SURL."Loginuser");
                }else{
                    redirect(SURL."Myaccount/Setting");
                }

           }

        }else{

             redirect(SURL."Loginuser");
        }

    }
    
   public function fb(){
        
        if(isset($_GET['code'])){
            $fbUser = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,link,gender,picture');
            $con['conditions'] = array("email"=>$fbUser['email']);
            $userrecord = $this->Common->get_single_row("users", $con);
            if($userrecord == True){

                $this->session->set_userdata("Enduser",$userrecord->u_id);
                redirect(SURL."Myaccount/Setting");

            }else{
                if(empty($fbUser['email'])){
                    redirect(SURL."Loginuser");
                }

                $this->db->trans_start();
                $name = ucwords($fbUser['first_name']." ".$fbUser['last_name']);
                
                $array = array(
								"fname"=>$name,
								"email"=>$fbUser['email'],
								"dp"=>"assets/images/dp.png",
								"joining_date"=>date("Y-m-d"),
								"user_status"=>"0",
								"auth"=>"Facebook",
							);               

                $lastrecord = $this->Common->insert("users",$array);   
                $this->session->set_userdata("Enduser",$lastrecord);
                
                $data['email'] = $fbUser['email'];
				$html = $this->load->view("email.php",$data,true);
                $emailsent = $this->Common->send_email($fbUser['email'], 'Diamond Prize', $html);

                $this->db->trans_complete();

                if($this->db->trans_status() === FALSE){
                    redirect(SURL."Loginuser");
                }else{
                    redirect(SURL."MyMyaccount/Setting");
                }
         
            }    
        } 
    }
	
	
}

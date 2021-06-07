<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Myaccount extends CI_Controller{

    public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('url');
		$this->load->model('common');
		error_reporting(0);
	}


    public function index(){
     if(!$this->session->userdata("Enduser")){
            redirect(SURL.'Loginuser');            
     }
     $this->load->view('Myaccount');
    }
        
        
    public function Order(){
        if(!$this->session->userdata("Enduser")){
            redirect(SURL.'Loginuser');            
        }
        $query="SELECT COUNT(*),lottery.* FROM `ticket_purchased` inner join lottery on lottery.lottery_id=ticket_purchased.lottery_id where ticket_purchased.is_paid='Yes' and u_id='".$this->session->userdata('Enduser')."' GROUP by ticket_purchased.lottery_id";
        $data['result']=$this->db->query($query)->result_array();
        
        //echo "<pre>";var_dump($data['result']);
        $this->load->view('Order',$data);
        
    }
    
    public function winners(){
        if(!$this->session->userdata("Enduser")){
            redirect(SURL.'Loginuser');            
     }
        $query="select winners.*,lottery.* from winners inner join lottery on lottery.lottery_id=winners.lottery_id where u_id='".$this->session->userdata('Enduser')."'";
        $data['result']=$this->db->query($query)->result_array();
        
        //echo "<pre>";var_dump($data['result']);
        $this->load->view('users_winners',$data);
        
    }
  
    public function Setting(){
        if(!$this->session->userdata("Enduser")){
            redirect(SURL.'Loginuser');            
     }
        $con['conditions']=array("u_id"=>$this->session->userdata('Enduser'));
       	$data['record'] = $this->common->get_single_row("users",$con);
        $this->load->view('Setting',$data);
    }
    
    
    
    public function changesetting(){
        if(!$this->session->userdata("Enduser")){
            redirect(SURL.'Loginuser');            
     }
        $name=$this->input->post("name");
        $email=$this->input->post("email");
        $uid=$this->input->post("edit");
        $address=$this->input->post("address");
        $number=$this->input->post("number");
        $town=$this->input->post("town");
        $country=$this->input->post("country");
        $postalcode=$this->input->post("postalcode");
        
        $array = array('fname' => $name,
					   'email' => $email,
					   'address' =>$address,
					   'phone_no' =>$number,
					   'country'=>$country,
					   'town'=>$town,
					   'postal_code'=>$postalcode
					);
		
		$chk_email = $this->db->query("select * from users where email='$email' and u_id!='".$this->session->userdata('Enduser')."'");	
		if($chk_email->num_rows() > 0){
		    $this->session->set_flashdata('fail','Email already taken.please choose another one');
			redirect(SURL.'Myaccount/Setting');
		}
						
		$con['conditions'] = array('u_id' =>$this->session->userdata('Enduser')); 
		$query = $this->common->update("users",$array,$con);
		
		if($query){
            $this->session->set_flashdata('success','Settings changed Succefully.');
            redirect(SURL.'Myaccount/Setting');
        }else{
            $this->session->set_flashdata('fail','Something went wrong.Please try again later.');
			redirect(SURL.'Myaccount/Setting');
        }				

    }
    
    
    public function Logout(){
        
        $this->session->sess_destroy();
		redirect(SURL.'Loginuser');
		
        $this->load->view('Loginuser');
    }
    
    
    public function changePasword(){
        if(!$this->session->userdata("Enduser")){
            redirect(SURL.'Loginuser');            
     }
        //echo "<pre>";var_dump($this->input->post()); exit;
        
        $current_pass = sha1($this->input->post('curpassword'));
        
        $oldpass = $this->db->query("select * from users where u_id='".$this->session->userdata('Enduser')."'")->result_array()[0]['password'];
        
        if(empty($oldpass) || $oldpass==""){
            if($this->input->post('npassword')==$this->input->post('cpassword')){
                
            }else{
                 $this->session->set_flashdata('fail','Password doesnt match with each other.');
        		 redirect(SURL.'Myaccount/Setting');
            }
        }else{
            if($oldpass==sha1($this->input->post('curpassword'))){
                
            }else{
                 $this->session->set_flashdata('fail','You have entered wrong old password.');
        		 redirect(SURL.'Myaccount/Setting');
            }
        }
        
        $array = array(
                        'password' => sha1($this->input->post('npassword')),
					  );
		$con['conditions'] = array('u_id' =>$this->session->userdata('Enduser')); 
	 	$query = $this->common->update("users",$array,$con);
	 	if($query){
	 	     $this->session->set_flashdata('success','Settings changed successfully.');
             redirect(SURL.'Myaccount/Setting');
	 	}else{
	 	    $this->session->set_flashdata('fail','Something went wrong.Please try again later.');
            redirect(SURL.'Myaccount/Setting');
	 	}
	 	        
        
        
    }
    
    
}
    
?>
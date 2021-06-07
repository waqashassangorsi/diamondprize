<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class Sitesettings extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		 $this->load->library('Check');
		 $this->load->model('common');
		 $this->load->library('Uploadimage');
		 error_reporting(0);
		
	}


	public function index(){ 
		//echo"test";exit;
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "admin/Sitesettings/";
		 $data['Controller_name'] = "Edit Site Settings";
	
// =============================================fix data ends here====================================================

        $data['general'] = $this->db->query("select * from general")->result_array();
        //echo "<pre>";var_dump($data['general']);exit;
        $this->load->view("admin/Add_settings",$data);
	}
	
	
	public function updateProfile(){
	    
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
	                    "email"=>$this->input->post('email'),
	                    "dp"=>$dp,
	            );
	       
	       $user_id = $this->session->userdata('user');
	       $con['conditions']=array("u_id"=>"$user_id");
	       $query = $this->common->update("users",$array,$con);
	       
	       if($query){
	           $this->session->set_flashdata('success','record update');
	           redirect(SURL.'admin/Sitesettings');
	       }else{
	           $this->session->set_flashdata('fail','sorry somethig is worng');
	       }
	        
	    }
	    $this->load->view("admin/Sitesettings",$data);    
	}
	
	
	
	public function updatePassword(){ 
		 
		$old_pass = sha1($this->input->post('old_pass'));
		$new_pass = $this->input->post('new_pass');
		$conf_pass = $this->input->post('conf_pass');
		$userpass = $this->input->post('userpass');
		$uid2 = $this->input->post('userid');
		
		if(	$old_pass==$userpass)
		{
		    if($new_pass==$conf_pass)
		    {
    		    $array = array('password' => sha1($new_pass),
    						);
    		    $con['conditions'] = array('u_id' =>$uid2); 
    	 	    $query = $this->common->update("users",$array,$con);
    	 	    
    		    if($query){
    		        
                    $this->session->set_flashdata('success','Your Succefully Change the Password.');
                    redirect(SURL.'admin/Sitesettings');
                }else{
                    
                    $this->session->set_flashdata('fail','Something went wrong.Please try again later.');
    			    redirect(SURL.'admin/Sitesettings');
                }
                
		        
		    }else{
		        
		        $this->session->set_flashdata('fail','New Password and Confirm Password  Not Matched.');
			    redirect(SURL.'admin/Sitesettings');
		    }
		    
		}else
		{
		  $this->session->set_flashdata('fail','Password Not Matched.');
		  redirect(SURL.'admin/Sitesettings');
		}
		
		 $this->load->view("admin/Sitesettings",$data);
	}
	
	
	
	public function updatePaypal(){
	    
	   // if(!empty($this->input->post("paypal_id"))){
	        
	        $array = array(
	                       'status'=>$this->input->post('paypalclient_id')
	                );
	        $array2 = array(
                            'status'=>$this->input->post('paypal_secret')
                        );
	       //echo "<pre>";var_dump($array);exit;
	       $pay_id = $this->input->post('pay_id');
	       $paysecret_id = $this->input->post('paysecret_id');
	       
	       $con['conditions']=array('id'=>$pay_id);
	       $query = $this->common->update("general",$array,$con);
	       
	       $con2['conditions']=array('id'=>$paysecret_id);
	       $query2 = $this->common->update("general",$array2,$con2);
	       //echo "<pre>";var_dump($con['conditions']);exit;
	        
	        
	       if($query){
	           $this->session->set_flashdata('success','record update');
	           redirect(SURL.'admin/Sitesettings'); 
	           
	       }else{
	           $this->session->set_flashdata('fail','sorry somethig is worng');
	       }
	        
	   // }
	   $this->load->view("admin/Add_settings",$data); 
	    
	}
	
	
	public function updateStripe(){
	   // echo "<pre>";var_dump($user);exit;
	    if(!empty($this->input->post("stripe_clientId"))){
	        
	        $array = array(
	                    'status'=>$this->input->post('stripe_clientId')
	                );
	       $array2 = array(
	                    'status'=>$this->input->post('stripe_scerte')
	                );
	       //echo "<pre>";var_dump($array2);exit;
	       
	       $stripeclient_id = $this->input->post('stripeclient_id');
	       $stripesectrte_id = $this->input->post('stripesectrte_id');
	       
	       $con['conditions']=array('id'=>$stripeclient_id);
	       $query = $this->common->update("general",$array,$con);
	       
	       $con2['conditions']=array('id'=>$stripesectrte_id);
	       $query2 = $this->common->update("general",$array2,$con2);
	        
	       if($query){
	           $this->session->set_flashdata('success','record update');
	           redirect(SURL.'admin/Sitesettings'); 
	           
	       }else{
	           $this->session->set_flashdata('fail','sorry somethig is worng');
	       }
	        
	    }
	    $this->load->view("admin/Add_settings",$data); 
	    
	}
	
	
	
	public function updateGoogleAnalytic(){
	    
	    
	    
	    if(!empty($this->input->post("googleanalytics"))){
	        
	        $array = array(
	                    'status'=>$this->input->post('googleanalytics')
	                );
	       $google_id = $this->input->post('googleanalytic_id');
	       //$test =$this->input->post('googleanalytic_id');echo $test;exit;
	       $con['conditions']=array('id'=>$google_id);
	       $query = $this->common->update("general",$array,$con);
	   
	       if($query){
	           $this->session->set_flashdata('success','record update');
	           redirect(SURL.'admin/Sitesettings');
	           
	       }else{
	           $this->session->set_flashdata('fail','sorry somethig is worng');
	       }
	        
	    }
	    $this->load->view("admin/Sitesettings",$data); 
	    
	}
	
	

	
}
?>
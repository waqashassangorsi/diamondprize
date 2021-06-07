<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class Subscribers extends CI_Controller{
	
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
		 $data['Controller_url'] = "admin/Subscribers/";
		 $data['Controller_name'] = "All Subscribers";
		 $data['Newcaption'] = "All Subscribers";
// =============================================fix data ends here====================================================


    	$query="select * from subscribers";
    	$data['result']=$this->db->query($query)->result_array();
    	$this->load->view("admin/Subscribers",$data);
    }
    
    
    public function AddSusbscibePost($id){
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "admin/Subscribers/";
		 $data['Controller_name'] = "Subscribers";
		 $data['Newcaption'] = "Add Subscribers Post";
// =============================================fix data ends here====================================================
        
        $data['record'] = $this->db->query("select * from subscribers where id = '".$id."'")->result_array()[0];
        //var_dump($data['record']);exit;
        
        $this->load->view("admin/AddSubscribe",$data);
    }
    
    public function Addpost(){
        
        if($this->input->post('subject')){
	       
	        
	        $u_id = $this->input->post('u_id');
	        $subject = $this->input->post('subject');
	        $description = $this->input->post('description');
	        
            $record = $this->db->query("select * from subscribers where id = '".$u_id."'")->result_array()[0];
		 	
		 	$email = $record['email'];
		 	
            $emailsent = $this->Common->send_email($email, $subject, $description);
            
                if($emailsent){        
        			$this->session->set_flashdata('success','Email Send Successfully');
        			redirect("admin/Subscribers");
    	        }else{
    			
        			$this->session->set_flashdata('fail','Try Again Later');
        			redirect("admin/Subscribers/Addpost");
    	        }
	    }
    }
    
    
    public function allsubscribe(){
        
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "admin/Subscribers/";
		 $data['Controller_name'] = "Subscribers";
		 $data['Newcaption'] = "All Subscribes Send Email";
// =============================================fix data ends here====================================================        
        
        if($this->input->post('subject')){
	       
	        
	        $subject = $this->input->post('subject');
	        $description = $this->input->post('description');
		 	
            $record = $this->db->query("select email from subscribers")->result_array();
		 	
		 	foreach($record as $value){
		 	    
		 	    $email = $value['email'];
                $emailsent = $this->Common->send_email($email, $subject, $description);
		 	}
		 	
		 	if($emailsent){        
    			$this->session->set_flashdata('success','Email Send Successfully');
    			redirect("admin/Subscribers");
	        }else{
			
    			$this->session->set_flashdata('fail','Try Again Later');
    			redirect("admin/Subscribers/Addpost");
	        }
		 	
	    }
        
        $this->load->view('admin/AllSubscribeEmail.php',$data);
    }
    
}
?>
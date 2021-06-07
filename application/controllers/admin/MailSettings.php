<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class MailSettings extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		 $this->load->library('Check');
		 $this->load->model('common');
		 error_reporting(0);
		
	}


	public function index(){ 
		
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "MailSettings/";
		 $data['Controller_name'] = "Edit Site Settings";
	
// =============================================fix data ends here====================================================
        if(!empty($this->input->post("email"))){
            //echo "<pre></pre>";var_dump($this->input->post());exit;
            $array = array(
                    "email"=>$this->input->post("email"),
                    "pass"=>$this->input->post("pass"),
            );

            $con['conditions']=array("id"=>1);
            $query = $this->common->update("site_settings",$array,$con);
            if($query){
                $this->session->set_flashdata('success','Record Updated');
			    redirect("/MailSettings");
            }else{
                $this->session->set_flashdata('fail','Something went wrong.');
			    redirect("/MailSettings");
            }
        }
		 $con['conditions'] = array("id"=>1); 
		 $data['record'] = $this->common->get_rows("site_settings",$con)[0];
         $this->load->view("MailSettings",$data);
	}

	
}
?>
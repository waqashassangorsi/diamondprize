<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class Customers extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		 $this->load->library('Check');
		 $this->load->model('Common');
		
	}


	public function index(){ 
		
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "admin/Customers/";
		 $data['Controller_name'] = "admin/All Workers";
		 $data['Newcaption'] = "admin/All Workers";
// =============================================fix data ends here====================================================


		 $con['conditions'] = array("user_status"=>"0");
         $data['users'] = $this->Common->get_rows("users", $con);
         //echo "<pre>"; var_dump($data['users']);
		 $this->load->view("admin/Customers.php",$data);
	}

	public function delete($id){
		
		$data['user'] = $this->check->Login(); 
		$this->db->trans_start(); //transation starts here

		$con['conditions'] = array("u_id"=>$id);
		$player_id = $this->common->get_single_row("users",$con)->playerid;
		
	    $img = SURL."assets/images/logo@2x.png";
        
        $title = "Account status";
        $body  ="Your account have been rejected by admin.please contact admin for approval";
        
        $this->sendNotification_post($title,$body,$player_id);
		
		$con['conditions']=array("u_id"=>$id);
		$this->common->update("users",array("privilidge"=>"2"),$con);
		

		$this->db->trans_complete(); //transation ends here

		if($this->db->trans_status() === FALSE){
			$this->session->set_flashdata('fail','Try Again Later');
	   }else{
			$this->session->set_flashdata('success','Information added Successfully');
	   }
	   redirect("/Customers");
	}	

	public function deleteuser($id){
		
		$data['user'] = $this->check->Login(); 
		$this->db->trans_start(); //transation starts here

		$this->db->query("delete from users where u_id='$id'");

		$this->db->trans_complete(); //transation ends here

		if($this->db->trans_status() === FALSE){
			$this->session->set_flashdata('fail','Try Again Later');
	   }else{
			$this->session->set_flashdata('success','User Deleted.');
	   }
	   redirect("/Customers");
	}

	public function auth($id){
		
		$data['user'] = $this->check->Login(); 
		$this->db->trans_start(); //transation starts here

		$con['conditions'] = array("u_id"=>$id);
		$player_id = $this->common->get_single_row("users",$con)->playerid;
		
	    $img = SURL."assets/images/logo@2x.png";
        
        $title = "Account status";
        $body  ="Please Login Now.";
        
        $array = array(
		                "u_id"=>$id,
		                "date"=>date("Y-m-d H:i:s"),
		              );
		$this->common->insert("ask_for_login",$array); 
        
        $this->sendNotification_post($title,$body,$player_id);

		$this->db->trans_complete(); //transation ends here

		if($this->db->trans_status() === FALSE){
			$this->session->set_flashdata('fail','Try Again Later');
	   }else{
			$this->session->set_flashdata('success','Information added Successfully');
	   }
	   redirect("/Customers");
	}
	
	public function sendNotification_post($title,$body,$token){

        $url = "https://fcm.googleapis.com/fcm/send";
       
        $serverKey = 'AAAA4louZts:APA91bGgtoN7alsYIfPIxwcyeAm9ZImEjP_vD946XMkqvxEh_cnYqK-q8wXRZofPZynxxG4Bd4mj6veI8B6A1l8gjPaxSiuYc16p0Ju526mrRhfGimRV5D8vhLj_5oTm4UzSnh2EBjkn';

        $notification = array('title' =>$title , 'body' => $body, 'sound' => 'noti.mp3', 'badge' => '1');
        $arrayToSend = array('to' => $token, 'notification' => $notification,'priority'=>'high');
        $json = json_encode($arrayToSend);
        $headers = array();
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Authorization: key='. $serverKey;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        //Send the request
        $response = curl_exec($ch);
        //Close request
        if ($response === FALSE) {
        die('FCM Send Error: ' . curl_error($ch));
        }
       
        curl_close($ch);
        
    }

	public function approve($id){
		
		$data['user'] = $this->check->Login(); 
		//$this->db->trans_start(); //transation starts here

		$con['conditions'] = array("u_id"=>$id);
		 $player_id = $this->common->get_single_row("users",$con)->playerid;
		
	    $img = SURL."assets/images/logo@2x.png";
        $title = "Account status";
        $body  ="Your account have been aproved by admin. Please login now.";
        
        $this->sendNotification_post($title,$body,$player_id);
		

		$con['conditions']=array("u_id"=>$id);
		$this->common->update("users",array("privilidge"=>"1"),$con);

		$this->db->trans_complete(); //transation ends here

		if($this->db->trans_status() === FALSE){
			$this->session->set_flashdata('fail','Try Again Later');
	    }else{
			$this->session->set_flashdata('success','Information added Successfully');
	    }
	    
	    redirect("/Customers");
	}
	
	public function detail($id){
		
		$data['user'] = $this->check->Login(); 
		$data['Controller_url'] = "Customers/";
		$data['Controller_name'] = "Worder Detail";
		$data['Newcaption'] = "Worker Detail";
		
		$data['record'] = $this->db->query("select * from users where u_id='$id'")->result_array()[0];
		//echo "<pre>";var_dump(	$data['record']);
		$this->load->view("userdetail.php",$data);
		
	}
	

	

	

}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class Paypal extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->library('Check');
		$this->load->model('Common');
		$this->load->library('cart');
		$this->load->library('paypal_lib');
	}


	public function PaypalSuccess(){ 
		
		echo "<pre>";var_dump($this->input->post()); exit;
	}
	
	public function PaypalCancel(){ 
		
		$data['products'] = $this->db->query("select * from products")->result_array();
		//echo "<pre>";var_dump($data['products']); exit;
		$this->load->view("Home.php",$data);
	}
	
	public function ipn(){ 
		
		$paypalInfo = $this->input->post();
        
        if(!empty($paypalInfo)){
            $ipnCheck = $this->paypal_lib->validate_ipn($paypalInfo);
            
            $file = json_encode($paypalInfo);
            
            $fp = fopen('lidn.txt', 'w');
            fwrite($fp, $file);
            
            //fclose($fp);

            if($ipnCheck){
                
                $master_id = $paypalInfo["item_number"];
			    $total_amt = $paypalInfo["mc_gross"];
			    $u_id = $paypalInfo["custom"];
			    $paymentid   = $paypalInfo["txn_id"];
			    
			    $this->db->trans_start();
			    //if($paypalInfo['payment_status']=="Completed"){
			        $this->db->query("update master set is_paid='Yes' where master_id='".$master_id."'");
			        $this->db->query("update ticket_purchased set is_paid='Yes' where masterid='".$master_id."'");
			        
			         $this->db->query("delete from transactions where ref_no='".$master_id."'");
			        
			        $array = array(
                        "u_id"=>"0", 
                        "damount"=>$total_amt,
                        "camount"=>"0",
                        "totalamt"=>$total_amt,
                        "date"=>date("Y-m-d H:i:s"),
                        "pg_transaction_id"=>$paymentid,
                        "payment_gateway"=>"paypal",
                        "ref_no"=>$master_id
                    );
                      
                    $this->Common->insert("transactions",$array);
                    
			    //}
			    $this->db->trans_complete();

            }
        }
        
	}
	
	public function complete(){
	    
	    $this->session->set_flashdata("success","You have purchased the tickets, we are verifying your payment.");
	    redirect(SURL.'Myaccount/Order');
	}
    

}
?>
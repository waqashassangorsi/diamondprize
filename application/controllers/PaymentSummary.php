<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class PaymentSummary extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->library('Check');
		$this->load->model('common');
		$this->load->library('cart');
		$this->load->library('Uploadimage');
		//$this->checksession();
 		$this->load->library('paypal_lib');
		$this->load->library('stripe_lib');
		error_reporting(0);
		
	}

	private function checksession(){

		if($this->session->userdata('Enduser') && !empty($this->cart->contents())){

		}else{

			$this->session->set_flashdata('fail','Your session expired. Please Login again.');
			redirect(SURL);

		}

	}


	public function index(){ 
	    
	    //echo "<pre>";var_dump($this->cart->contents()); exit;
	    
		$this->load->view("PaymentSummary",$data);
	}	
	
	public function pay(){
	    			
	    if($this->input->post("Paymentoption")=="1"){
	        if(!empty($this->input->post("stripeToken"))){
	            
	            $data['stripeToken'] = $this->input->post("stripeToken");
	            $data['total_money'] = $this->cart->total();
	            $data['reason']      = "Ticket Purchased";
		        $data['method']      = "stripecc";
		        
		        $this->db->trans_start();
		        
		        //echo "<pre>";var_dump($this->cart->contents()); exit;
		        
		        foreach($this->cart->contents() as $key=>$value){
	                $alltickets = explode(",",$value['tickets']);
	                
	                foreach($alltickets as $key=>$tickets){
	                    
	                    $chk_ticket = $this->db->query("select * from ticket_purchased where ticket_no='$tickets' and lottery_id='".$value['id']."'");
	                    
	                    if($chk_ticket->num_rows() > 0){
	                        $this->cart->destroy();
	                        $this->session->set_flashdata('fail','This ticket no has already been taken, please choose another one.');
    				        redirect(SURL."Competitons");
	                    }
	                    
            	        $array = array(
                            "lottery_id"=>$value['id'], 
                            "u_id"=>$this->session->userdata('Enduser'), 
                            "purchase_date"=>date("Y-m-d"),
                            "ticket_no"=>$tickets,
                        );
                          
                        $this->Common->insert("ticket_purchased",$array);
                    
	                }
                
        	    }
	            
	            $paymentID = $this->common->payment($data);
	            
		        if($paymentID){
		            
		            $data['paymentid']   = $paymentID;
		            
		            $array = array(
                        "u_id"=>"0", 
                        "damount"=>$data['total_money'],
                        "camount"=>"0",
                        "totalamt"=>$data['total_money'],
                        "date"=>date("Y-m-d H:i:s"),
                        "pg_transaction_id"=>$data['paymentid'],
                        "payment_gateway"=>$data['method']
                    );
                      
                    $this->Common->insert("transactions",$array);
        
        
		            $this->db->trans_complete();
				
    				if($this->db->trans_status() === FALSE){
    					$this->session->set_flashdata('fail','Payment Was not successful.Some error occured');
    				    redirect(SURL."PaymentSummary");
    				}else{
    				    $this->cart->destroy();
    				    $this->session->set_flashdata("success","Payment done.You have purchased the tickets.");
    				    redirect(SURL."Myaccount/Order");
		                
    				}
    	    
		            
		        }else{
		            $apiError = !empty($this->stripe_lib->api_error)?' ('.$this->stripe_lib->api_error.')':'';
    
    				$this->session->set_flashdata("fail",'Transaction has been failed!'.$apiError);
    				redirect(SURL."PaymentSummary");
		        }
    			        
	        }else{
	            $this->session->set_flashdata("fail","Something is missing.Please try again later.");
	        }
	    }else if($this->input->post("Paymentoption")=="2"){
	        
	        
	        // Set variables for paypal form
			$returnURL = SURL."Chat/index/".$detail['username']."/".$detail['job_slug']; //payment success url
			
			$cancelURL = SURL."PaymentSummary/acceptproposal/".$this->input->post("proposalno"); //payment cancel url
			$notifyURL = SURL.'Paypal/ipn'; //ipn url
		
			// Add fields to paypal form
			$this->paypal_lib->add_field('return', $returnURL);
			$this->paypal_lib->add_field('cancel_return', $cancelURL);
			$this->paypal_lib->add_field('notify_url', $notifyURL);
			$this->paypal_lib->add_field('item_name', 'Proposal Accepted');
			$this->paypal_lib->add_field('custom', $this->session->userdata("user"));
			$this->paypal_lib->add_field('item_number',$this->input->post("proposalno"));
			$this->paypal_lib->add_field('amount',$this->input->post("total_money"));
			
			// Render paypal form
			$this->paypal_lib->paypal_auto_form();
			
	    }

	}
	
	public function acceptinvoice($msgid){ 
	    
        $data['record'] = $this->db->query("select * from jobs_msgs where msg_id='$msgid'")->result_array()[0];
        $detail = $this->db->query("select users.username,jobs.job_slug from jobs_msgs inner join users on users.u_id=jobs_msgs.send_id inner join jobs on jobs.job_id=jobs_msgs.job_id where msg_id='".$msgid."'")->result_array()[0];
        
        $data['mybalance'] = $this->common->myblnc($this->session->userdata("user"));
    
        $escrowamt = $this->common->job_escrow_amt($data['record']['job_id']);
        
        if($escrowamt > $data['record']['invc_amt']){
            
            $this->db->trans_start();
            $this->common->accept_invoice_transaction($msgid);
            $this->db->trans_complete();
            
            if($this->db->trans_status() === FALSE){
				$this->session->set_flashdata('fail','Payment Was not successful.Some error occured');
			}else{
			    $this->session->set_flashdata("success","Invoice has accepted.");
                
			}
			
			redirect(SURL."Chat/index/".$detail['username']."/".$detail['job_slug']);
        
        }else{
            $data['record']['invc_amt'] = $data['record']['invc_amt'] - $escrowamt;
            $data['url'] = SURL.'PaymentSummary/process_accept_invoice';
		    $this->load->view("PaymentSummary",$data);
        }
        
	}
	
	public function process_accept_invoice(){
	    //echo "<pre>";var_dump($this->input->post()); exit;
	    
	    $detail = $this->db->query("select users.username,jobs.* from jobs_msgs inner join users on users.u_id=jobs_msgs.send_id inner join jobs on jobs.job_id=jobs_msgs.job_id where msg_id='".$this->input->post("proposalno")."'")->result_array()[0];
    			
	    if($this->input->post("Paymentoption")=="1"){
	        if(!empty($this->input->post("stripeToken")) && !empty($this->input->post("total_money")) && !empty($this->input->post("proposalno"))){
	            
	            $data['stripeToken'] = $this->input->post("stripeToken");
	            $data['total_money'] = $this->input->post("total_money");
	            $data['reason']      = "Invoice Accepted";
	            $data['proposal_no'] = $this->input->post("proposalno");
		        $data['method']      = "stripecc";
		        $data['job_id']      = $detail['job_id'];
	            
	            $paymentID = $this->common->payment($data);
	            
		        if($paymentID){
		            
		            $data['paymentid']   = $paymentID;
		            
		            $this->db->trans_start();
		            $this->common->accept_invoice_transaction($data);	
		            $this->db->trans_complete();
				
    				if($this->db->trans_status() === FALSE){
    					$this->session->set_flashdata('fail','Payment Was not successful.Some error occured');
    				    redirect(SURL."PaymentSummary/acceptinvoice/".$this->input->post("proposalno"));
    				}else{
    				    
    				    $this->session->set_flashdata("success","You have accepted the Invoice.");
    				    redirect(SURL."Chat/index/".$detail['username']."/".$detail['job_slug']);
		                
    				}
    	    
		            
		        }else{
		            $apiError = !empty($this->stripe_lib->api_error)?' ('.$this->stripe_lib->api_error.')':'';
    
    				$this->session->set_flashdata("fail",'Transaction has been failed!'.$apiError);
    				redirect(SURL."PaymentSummary/acceptinvoice/".$this->input->post("proposalno"));
		        }
    			        
	        }else{
	            $this->session->set_flashdata("fail","Something is missing.Please try again later.");
	        }
	        
	    }else if($this->input->post("Paymentoption")=="2"){
	        
	        
	        // Set variables for paypal form
			$returnURL = SURL."Chat/index/".$detail['username']."/".$detail['job_slug']; //payment success url
			
			$cancelURL = SURL."PaymentSummary/acceptinvoice/".$this->input->post("proposalno"); //payment cancel url
			$notifyURL = SURL.'Paypal/invoiceipn'; //ipn url
		
			// Add fields to paypal form
			$this->paypal_lib->add_field('return', $returnURL);
			$this->paypal_lib->add_field('cancel_return', $cancelURL);
			$this->paypal_lib->add_field('notify_url', $notifyURL);
			$this->paypal_lib->add_field('item_name', 'Invoice Accepted');
			$this->paypal_lib->add_field('custom', $this->session->userdata("user"));
			$this->paypal_lib->add_field('item_number',$this->input->post("proposalno"));
			$this->paypal_lib->add_field('amount',$this->input->post("total_money"));
			
			// Render paypal form
			$this->paypal_lib->paypal_auto_form();
			
	    }
	    else if($this->input->post("Paymentoption")=="3"){
	        
	    }
	  
	}
	
	public function jobadons($jobid){ 
        $data['record'] = $this->db->query("select * from jobs where job_id='$jobid'")->result_array()[0];
        
        $data['url'] = SURL.'PaymentSummary/process_adons';
        $data['mybalance'] = $this->common->myblnc($this->session->userdata("user"));
		$this->load->view("PaymentSummary",$data);
	}
	
	public function process_adons(){
	    
	    if($this->input->post("Paymentoption")=="1"){
	        if(!empty($this->input->post("stripeToken")) && !empty($this->input->post("total_money")) && !empty($this->input->post("job_id"))){
	            
	            $data['stripeToken'] = $this->input->post("stripeToken");
	            $data['total_money'] = $this->input->post("total_money");
	            $data['reason']      = "Job Adons Purchased";
	            $data['job_id']      = $this->input->post("job_id");
		        $data['method']      = "stripecc";
	            
	            $paymentID = $this->common->payment($data);
	            
		        if($paymentID){
		            
		            $data['paymentid']   = $paymentID;
		            
		            $this->db->trans_start();
		            $this->common->jobadons_transactions($data);	
		            $this->db->trans_complete();
				
    				if($this->db->trans_status() === FALSE){
    					$this->session->set_flashdata('fail','Payment Was not successful.Some error occured');
    				    redirect(SURL."PaymentSummary/jobadons/".$this->input->post("job_id"));
    				}else{
    				    
    				    $this->session->set_flashdata("success","Adons Purchased.");
    				    redirect(SURL."Postproject");
		                
    				}
    	    
		            
		        }else{
		            $apiError = !empty($this->stripe_lib->api_error)?' ('.$this->stripe_lib->api_error.')':'';
    
    				$this->session->set_flashdata("fail",'Transaction has been failed!'.$apiError);
    				redirect(SURL."PaymentSummary/jobadons/".$this->input->post("job_id"));
		        }
    			        
	        }else{
	            $this->session->set_flashdata("fail","Something is missing.Please try again later.");
	            redirect(SURL."PaymentSummary/jobadons/".$this->input->post("job_id"));
	        }
	        
	    }else if($this->input->post("Paymentoption")=="2"){
	        
	        
	        // Set variables for paypal form
			$returnURL = SURL."Postproject"; //payment success url
			
			$cancelURL = SURL."PaymentSummary/jobadons/".$this->input->post("job_id"); //payment cancel url
			$notifyURL = SURL.'Paypal/jobadonsipn'; //ipn url
		
			// Add fields to paypal form
			$this->paypal_lib->add_field('return', $returnURL);
			$this->paypal_lib->add_field('cancel_return', $cancelURL);
			$this->paypal_lib->add_field('notify_url', $notifyURL);
			$this->paypal_lib->add_field('item_name', 'Job Adons Purchased');
			$this->paypal_lib->add_field('custom', $this->session->userdata("user"));
			$this->paypal_lib->add_field('item_number',$this->input->post("job_id"));
			$this->paypal_lib->add_field('amount',$this->input->post("total_money"));
			
			// Render paypal form
			$this->paypal_lib->paypal_auto_form();
			
	    }
	    else if($this->input->post("Paymentoption")=="3"){
	        
	        if(!empty($this->input->post("total_money")) && !empty($this->input->post("job_id"))){
	            
	            $escrowamt = $this->Common->myblnc($this->session->userdata("user"));
	            
	            if($this->input->post("total_money") > $escrowamt){
	                $this->session->set_flashdata('fail','You have insufficient balance in your wallet');
				    redirect(SURL."PaymentSummary/jobadons/".$this->input->post("job_id"));
	            }
	            
	            $this->db->trans_start();
		            
	            $array = array(
                            "u_id"=>$this->session->userdata("user"), 
                            "damount"=>"0",
                            "camount"=>$this->input->post("total_money"),
                            "totalamt"=>$this->input->post("total_money"),
                            "job_id"=>$this->input->post("job_id"),
                            "trans_type"=>"jobs_adons",
                            "date"=>date("Y-m-d H:i:s"),
                            "in_escrow"=>"No",
                            "is_clear"=>"Yes",
                            "payment_gateway"=>"gigweb"
                        );
              
                $this->Common->insert("transactions",$array);
                
                $array = array(
                            "u_id"=>"0", 
                            "damount"=>$this->input->post("total_money"),
                            "camount"=>"0",
                            "totalamt"=>$this->input->post("total_money"),
                            "job_id"=>$this->input->post("job_id"),
                            "trans_type"=>"jobs_adons",
                            "date"=>date("Y-m-d H:i:s"),
                            "in_escrow"=>"No",
                            "is_clear"=>"Yes",
                            "payment_gateway"=>"gigweb"
                        );
              
                $this->Common->insert("transactions",$array);
                
                $this->db->query("update jobs set privilidge_status='Pending' where job_id='".$this->input->post("job_id")."'");
                
                $this->db->trans_complete();
                
                if($this->db->trans_status() === FALSE){
					$this->session->set_flashdata('fail','Payment Was not successful.Some error occured');
				    redirect(SURL."PaymentSummary/jobadons/".$this->input->post("job_id"));
				}else{
				    $this->session->set_flashdata("success","Adons Purchased.");
				    redirect(SURL."Postproject");
				}
        
	        }else{
	            $this->session->set_flashdata("fail","Something is missing.Please try again later.");
	            redirect(SURL."PaymentSummary/jobadons/".$this->input->post("job_id"));
	        }
	    }
	    
	}
    
    public function buyservice($service_id){ 
        

        $data['service_data'] = $this->db->query("select * from services where service_id='".$service_id."'")->result_array()[0];
        if(empty($data['service_data'])){
            redirect(SURL);
        }
        
        $data['service_portfolio'] = $this->db->query("select * from service_portfolio where service_id='".$service_id."'")->result_array()[0]['image'];
        $data['service_adons'] = $this->db->query("select * from services_adons where service_id='".$service_id."'")->result_array();
        
        $data['url'] = SURL.'PaymentSummary/buyservicetransaction';
        
        $data['mybalance'] = $this->common->myblnc($this->session->userdata("user"));
		$this->load->view("PaymentSummary",$data);
	}
	
	public function buyservicetransaction(){
	    //echo "<pre>";var_dump($this->input->post()); exit;
	    
	    if($this->input->post("Paymentoption")=="1"){
	        if(!empty($this->input->post("stripeToken")) && !empty($this->input->post("total_money")) && !empty($this->input->post("service_id")) && !empty($this->input->post("servicesbuydetails"))){
	            
	            $data['stripeToken'] = $this->input->post("stripeToken");
	            $data['total_money'] = $this->input->post("total_money");
	            $data['reason']      = "Service Purchased";
	            $data['service_id']  = $this->input->post("service_id");
		        $data['method']      = "stripecc";
		        $data['who_purchased'] = $this->session->userdata("user");
		        
		        if(!empty($this->input->post("adonspurchased"))){
		            $data['adons'] = implode("-",$this->input->post("adonspurchased"));
		        }else{
		            $data['adons'] = "";
		        }
		        
	            
	            $paymentID = $this->common->payment($data);
	            
		        if($paymentID){
		            
		            $data['paymentid']   = $paymentID;
		            
		            $this->db->trans_start();
		            $this->common->servicepurchased_transactions($data);
		            
		            $this->db->trans_complete();
				
    				if($this->db->trans_status() === FALSE){
    					$this->session->set_flashdata('fail','Payment Was not successful.Some error occured');
    				    redirect(SURL.'PaymentSummary/buyservice/'.$this->input->post("service_id"));
    				}else{
    				    
    				    $this->session->set_flashdata("success","Service Purchased.");
    				    redirect(SURL."Postproject");
		                
    				}
    	    
		            
		        }else{
		            $apiError = !empty($this->stripe_lib->api_error)?' ('.$this->stripe_lib->api_error.')':'';
    
    				$this->session->set_flashdata("fail",'Transaction has been failed!'.$apiError);
    				redirect(SURL.'PaymentSummary/buyservice/'.$this->input->post("service_id"));
		        }
    			        
	        }else{
	            $this->session->set_flashdata("fail","Something is missing.Please try again later.");
	            redirect(SURL.'PaymentSummary/buyservice/'.$this->input->post("service_id"));
	        }
	        
	    }else if($this->input->post("Paymentoption")=="2"){
	        
	        if(empty($this->input->post("total_money")) || empty($this->input->post("service_id")) || empty($this->input->post("servicesbuydetails"))){
	            
	            $this->session->set_flashdata("fail","Something is missing.Please try again later.");
	            redirect(SURL.'PaymentSummary/buyservice/'.$this->input->post("service_id"));
	        }
	        
	        $service_owner_id = $this->db->query("select * from services where service_id='".$this->input->post("service_id")."'")->result_array()[0]['u_id'];
		        
	        if(!empty($this->input->post("adonspurchased"))){
	            $data['adons'] = implode("-",$this->input->post("adonspurchased"));
	        }else{
	            $data['adons'] = "";
	        }
		        
	        $array = array(
                "service_id"=>$this->input->post("service_id"),
                "service_owner_id"=>$service_owner_id,
                "who_purchased"=>$this->session->userdata("user"),
                "date"=>date("Y-m-d H:i:s"),
                "status"=>"Ongoing",
                "adons"=>$data['adons'],
                "content"=>$this->input->post("servicesbuydetails"),
                "is_paid"=>"No"
              );
              
            $service_purchase_id = $this->Common->insert("services_purchased",$array);

	        // Set variables for paypal form
			$returnURL = SURL."Postproject"; //payment success url
			
			$cancelURL = SURL."PaymentSummary/buyservice/".$this->input->post("service_id"); //payment cancel url
			$notifyURL = SURL.'Paypal/servicepurchasedipn'; //ipn url
		
			// Add fields to paypal form
			$this->paypal_lib->add_field('return', $returnURL);
			$this->paypal_lib->add_field('cancel_return', $cancelURL);
			$this->paypal_lib->add_field('notify_url', $notifyURL);
			$this->paypal_lib->add_field('item_name', 'Service Purchased');
			$this->paypal_lib->add_field('custom', $service_purchase_id);
			$this->paypal_lib->add_field('item_number',$this->input->post("service_id"));
			$this->paypal_lib->add_field('amount',$this->input->post("total_money"));
			
			// Render paypal form
			$this->paypal_lib->paypal_auto_form();
			
	    }
	    else if($this->input->post("Paymentoption")=="3"){
	        
	        if(!empty($this->input->post("total_money")) && !empty($this->input->post("service_id")) && !empty($this->input->post("servicesbuydetails"))){
	            
	            $escrowamt = $this->Common->myblnc($this->session->userdata("user"));
	            
	            if($this->input->post("total_money") > $escrowamt){
	                $this->session->set_flashdata('fail','You have insufficient balance in your wallet');
				    redirect(SURL."PaymentSummary/buyservice/".$this->input->post("service_id"));
	            }
	            
	            $this->db->trans_start();
		        
		        $service_owner_id = $this->db->query("select * from services where service_id='".$this->input->post("service_id")."'")->result_array()[0]['u_id'];
		        
		        if(!empty($this->input->post("adonspurchased"))){
		            $data['adons'] = implode("-",$this->input->post("adonspurchased"));
		        }else{
		            $data['adons'] = "";
		        }
		        
		        $array = array(
                    "service_id"=>$this->input->post("service_id"),
                    "service_owner_id"=>$service_owner_id,
                    "who_purchased"=>$this->session->userdata("user"),
                    "date"=>date("Y-m-d H:i:s"),
                    "status"=>"Ongoing",
                    "adons"=>$data['adons'],
                    "is_paid"=>"Yes",
                    "content"=>$this->input->post("servicesbuydetails"),
                  );
              
                $service_purchase_id = $this->Common->insert("services_purchased",$array);
                
                $notification = "Client has bought your service.";
        
                $link = "";
                
                $array = array(
                        "notification"=>$notification,
                        "noti_date"=>date("Y-m-d H:i:s"),
                        "noti_recvr_id"=>$service_owner_id,
                        "noti_sender_id"=>$this->session->userdata("user"),
                        "link"=>$link
                      );
                      
                $this->Common->insert("notifications",$array);
                
                $this->db->query("update users set notifications=notifications+1 where u_id='$service_owner_id'");
                
        
	            $array = array(
                            "u_id"=>$this->session->userdata("user"), 
                            "damount"=>"0",
                            "camount"=>$this->input->post("total_money"),
                            "totalamt"=>$this->input->post("total_money"),
                            "service_id"=>$this->input->post("service_id"),
                            "service_p_id"=>$service_purchase_id,
                            "trans_type"=>"service_purchased",
                            "date"=>date("Y-m-d H:i:s"),
                            "in_escrow"=>"No",
                            "is_clear"=>"Yes",
                            "payment_gateway"=>"gigweb"
                        );
              
                $this->Common->insert("transactions",$array);
                
                $array = array(
                            "u_id"=>"0", 
                            "damount"=>$this->input->post("total_money"),
                            "camount"=>"0",
                            "totalamt"=>$this->input->post("total_money"),
                            "service_id"=>$this->input->post("service_id"),
                            "service_p_id"=>$service_purchase_id,
                            "trans_type"=>"service_purchased",
                            "date"=>date("Y-m-d H:i:s"),
                            "in_escrow"=>"Yes",
                            "is_clear"=>"No",
                            "payment_gateway"=>"gigweb"
                        );
              
                $this->Common->insert("transactions",$array);
                
                $array = array(
                        "recv_id"=>"$service_owner_id", 
                        "send_id"=>$this->session->userdata("user"),
                        "date"=>date("Y-m-d H:i:s"),
                        "msg_status"=>"Service",
                        "service_id"=>$this->input->post("service_id"),
                        "service_p_id"=>$service_purchase_id,
                        "service_requiremnt"=>$this->input->post("servicesbuydetails"),
                      );
                      
                $this->Common->insert("jobs_msgs",$array);
                
                $this->db->trans_complete();
                
                if($this->db->trans_status() === FALSE){
					$this->session->set_flashdata('fail','Payment Was not successful.Some error occured');
				    redirect(SURL."PaymentSummary/buyservice/".$this->input->post("service_id"));
				}else{
				    $this->session->set_flashdata("success","Adons Purchased.");
				    redirect(SURL."Postproject");
				}
        
	        }else{
	            $this->session->set_flashdata("fail","Something is missing.Please try again later.");
	            redirect(SURL."PaymentSummary/buyservice/".$this->input->post("service_id"));
	        }
	    }
	    
	}
    
    public function buycredits($userid){ 
        
        $query = $this->db->query("select * from users where u_id='$userid'");
        if($query->num_rows() > 0){
           
        }else{
           redirect(SURL);
        }
        
        $data['credit_price'] = $this->db->query("select * from general where id='11'")->result_array()[0]['price'];
        $data['url'] = SURL.'PaymentSummary/buycreditstransaction';
        
        $data['mybalance'] = $this->common->myblnc($this->session->userdata("user"));
		$this->load->view("PaymentSummary",$data);
	}
	
	public function buycreditstransaction(){
	    
	    if($this->input->post("Paymentoption")=="1"){
	        if(!empty($this->input->post("stripeToken")) && !empty($this->input->post("total_money"))){
	            
	            $data['stripeToken'] = $this->input->post("stripeToken");
	            $data['total_money'] = $this->input->post("total_money");
	            $data['credits'] = $this->input->post("credits");
	            $data['reason']      = "Credits Purchased";
	            $data['u_id']   = $this->session->userdata("user");
		        $data['method']      = "stripecc";
	            
	            $paymentID = $this->common->payment($data);
	            
		        if($paymentID){
		            
		            $data['paymentid']   = $paymentID;
		            
		            $this->db->trans_start();
		            $this->common->creditspurchased_transactions($data);
		            
		            $this->db->trans_complete();
				
    				if($this->db->trans_status() === FALSE){
    					$this->session->set_flashdata('fail','Payment Was not successful.Some error occured');
    				    redirect(SURL."PaymentSummary/buycredits/".$this->session->userdata("user"));
    				}else{
    				    
    				    $this->session->set_flashdata("success","Credits Purchased.");
    				    redirect(SURL."Postproject");
		                
    				}
    	    
		            
		        }else{
		            $apiError = !empty($this->stripe_lib->api_error)?' ('.$this->stripe_lib->api_error.')':'';
    
    				$this->session->set_flashdata("fail",'Transaction has been failed!'.$apiError);
    				redirect(SURL."PaymentSummary/buycredits/".$this->session->userdata("user"));
		        }
    			        
	        }else{
	            $this->session->set_flashdata("fail","Something is missing.Please try again later.");
	            redirect(SURL."PaymentSummary/buycredits/".$this->session->userdata("user"));
	        }
	        
	    }else if($this->input->post("Paymentoption")=="2"){
	        
	        
	        // Set variables for paypal form
			$returnURL = SURL."Postproject"; //payment success url
			
			$cancelURL = SURL."PaymentSummary/buycredits/".$this->session->userdata("user"); //payment cancel url
			$notifyURL = SURL.'Paypal/creditsipn'; //ipn url
		
			// Add fields to paypal form
			$this->paypal_lib->add_field('return', $returnURL);
			$this->paypal_lib->add_field('cancel_return', $cancelURL);
			$this->paypal_lib->add_field('notify_url', $notifyURL);
			$this->paypal_lib->add_field('item_name', 'Credits Purchased');
			$this->paypal_lib->add_field('custom', $this->input->post("credits"));
			$this->paypal_lib->add_field('item_number',$this->session->userdata("user"));
			$this->paypal_lib->add_field('amount',$this->input->post("total_money"));
			
			// Render paypal form
			$this->paypal_lib->paypal_auto_form();
			
	    }
	    else if($this->input->post("Paymentoption")=="3"){
	        
	        if(!empty($this->input->post("total_money"))){
	            
	            $escrowamt = $this->Common->myblnc($this->session->userdata("user"));
	            
	            if($this->input->post("total_money") > $escrowamt){
	                $this->session->set_flashdata('fail','You have insufficient balance in your wallet');
				    redirect(SURL."PaymentSummary/buycredits/".$this->session->userdata("user"));
	            }
	            
	            $this->db->trans_start();
		        
		        $array = array(
                    "u_id"=>$this->session->userdata("user"),
                    "credits"=>$this->input->post("credits"),
                    "is_paid"=>"Yes",
                    "date"=>date("Y-m-d H:i:s"),
                    "used"=>"0",
                  );
              
                $credit_purchase_id = $this->Common->insert("proposal_credits",$array);
        
		        $array = array(
                        "u_id"=>$this->session->userdata("user"), 
                        "damount"=>"0", 
                        "camount"=>$this->input->post("total_money"),
                        "totalamt"=>$this->input->post("total_money"),
                        "proposal_credits_purchase_id"=>$credit_purchase_id,
                        "trans_type"=>"prop_credits_purchased",
                        "date"=>date("Y-m-d H:i:s"),
                        "in_escrow"=>"No",
                        "is_clear"=>"Yes",
                      );
                      
                $this->Common->insert("transactions",$array);
        
                $array = array(
                        "u_id"=>"0", 
                        "damount"=>$this->input->post("total_money"),
                        "camount"=>"0",
                        "totalamt"=>$$this->input->post("total_money"),
                        "proposal_credits_purchase_id"=>$credit_purchase_id,
                        "trans_type"=>"prop_credits_purchased",
                        "date"=>date("Y-m-d H:i:s"),
                        "in_escrow"=>"No",
                        "is_clear"=>"Yes", 
                      );
                      
                $this->Common->insert("transactions",$array);
        
                
                $this->db->trans_complete();
                
                if($this->db->trans_status() === FALSE){
					$this->session->set_flashdata('fail','Payment Was not successful.Some error occured');
				    redirect(SURL."PaymentSummary/buycredits/".$this->session->userdata("user"));
				}else{
				    $this->session->set_flashdata("success","Credits Purchased.");
				    redirect(SURL."Postproject");
				}
        
	        }else{
	            $this->session->set_flashdata("fail","Something is missing.Please try again later.");
	            redirect(SURL."PaymentSummary/buycredits/".$this->session->userdata("user"));
	        }
	    }
	    
	}
}
?>
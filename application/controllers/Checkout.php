<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller{
        
    public function __construct(){
		parent::__construct();
		$this->load->library('Check');
		$this->load->model('common');
		$this->load->library('cart');
		$this->load->library('Uploadimage');
		$this->checksession();
		
		//$getloc = json_decode(file_get_contents("http://ipinfo.io/".$this->input->ip_address()));
		$getloc = json_decode(file_get_contents("https://api.ipgeolocationapi.com/geolocate/".$this->input->ip_address()));

        //echo "<pre>";var_dump($getloc);
        if($getloc->name=="Ireland"){
            
            $this->config->load('stripe');
            $this->config->set_item('stripe_currency', 'EUR');
        
            $this->config->load('paypal');
            $this->config->set_item('paypal_lib_currency_code', 'EUR');
        }
        

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
        
        // echo $this->config->item('stripe_currency');
        // echo "<br>";
        // echo $this->config->item('paypal_lib_currency_code');
        
        
        
        //echo "<pre>";var_dump($this->cart->contents());
        $user = $this->session->userdata['Enduser'];
        $data['record'] = $this->db->query("select * from users where u_id = '$user'")->result_array()[0];

        $this->load->view('Checkout',$data);
    }
    
    public function pay(){
	    
	   // echo "<pre>";var_dump($this->input->post());
	   // exit;
	    
	    if($this->input->post("Paymentoption")=="1"){
	        if(!empty($this->input->post("stripeToken"))){
	            
	            $data['stripeToken'] = $this->input->post("stripeToken");
	            $data['total_money'] = $this->input->post("payableamt");
	            $data['reason']      = "Ticket Purchased";
		        $data['method']      = "stripecc";
		        
		        $this->db->trans_start();
		        
		        $array = array(
                            "fname"=>$this->input->post("first_name"), 
                            "address"=>$this->input->post("address"),  
                            "town"=>$this->input->post("town"),  
                            "country"=>$this->input->post("county"), 
                            "postal_code"=>$this->input->post("post_code"),
                            "phone_no"=>$this->input->post("phone"),
                        );
                
                $con['conditions'] = array("u_id"=>$this->session->userdata('Enduser'));          
                $this->Common->update("users",$array,$con);
                
		        //echo "<pre>";var_dump($this->cart->contents()); exit;
		        
		        $array = array(
                            "u_id"=>$this->session->userdata('Enduser'), 
                            "total_amt"=>$this->input->post("totalamt"),  
                            "payableamt"=>$data['total_money'],
                            "date"=>date("Y-m-d"), 
                            "discountamt"=>$this->input->post("discountamt"),
                            "coupon"=>$this->input->post("coupon"),
                            "is_paid"=>"Yes",
                        );
                          
                $master = $this->Common->insert("master",$array);
                        
		        foreach($this->cart->contents() as $key=>$value){
	                $alltickets = explode(",",$value['tickets']);
	                
	                foreach($alltickets as $key=>$tickets){
	                    
	                    $chk_ticket = $this->db->query("select * from ticket_purchased where ticket_no='$tickets' and lottery_id='".$value['id']."' and is_paid='Yes'");
	                    
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
                            "masterid"=>$master,
                            "is_paid"=>"Yes",
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
                        "payment_gateway"=>$data['method'],
                        "ref_no"=>$master
                    );
                      
                    $this->Common->insert("transactions",$array);
        
        
		            $this->db->trans_complete();
				
    				if($this->db->trans_status() === FALSE){
    					$this->session->set_flashdata('fail','Payment Was not successful.Some error occured');
    				    redirect(SURL."Checkout");
    				}else{
    				    $this->cart->destroy();
    				    $this->session->set_flashdata("success","Payment done.You have purchased the tickets.");
    				    redirect(SURL."Myaccount/Order");
		                
    				}
    	    
		            
		        }else{
		            $apiError = !empty($this->stripe_lib->api_error)?' ('.$this->stripe_lib->api_error.')':'';
    
    				$this->session->set_flashdata("fail",'Transaction has been failed!'.$apiError);
    				redirect(SURL."Checkout");
		        }
    			        
	        }else{
	            $this->session->set_flashdata("fail","Something is missing.Please try again later.");
	            redirect(SURL.'Checkout');
	        }
	    }else if($this->input->post("Paymentoption")=="2"){
	        
	            $data['total_money'] = $this->input->post("payableamt");
		        
		        $this->db->trans_start();
		        
		        //echo "<pre>";var_dump($this->cart->contents()); exit;
		        
		        $array = array(
                            "fname"=>$this->input->post("first_name"), 
                            "address"=>$this->input->post("address"),  
                            "town"=>$this->input->post("town"),  
                            "country"=>$this->input->post("county"), 
                            "postal_code"=>$this->input->post("post_code"),
                            "phone_no"=>$this->input->post("phone"),
                        );
                
                $con['conditions'] = array("u_id"=>$this->session->userdata('Enduser'));          
                $this->Common->update("users",$array,$con);
                
                
                
		        $array = array(
                            "u_id"=>$this->session->userdata('Enduser'), 
                            "total_amt"=>$this->input->post("totalamt"),  
                            "payableamt"=>$data['total_money'],
                            "date"=>date("Y-m-d"), 
                            "discountamt"=>$this->input->post("discountamt"),
                            "coupon"=>$this->input->post("coupon"),
                            "is_paid"=>"No",
                        );
                          
                $master = $this->Common->insert("master",$array);
                        
		        foreach($this->cart->contents() as $key=>$value){
	                $alltickets = explode(",",$value['tickets']);
	                
	                foreach($alltickets as $key=>$tickets){
	                    
	                    $chk_ticket = $this->db->query("select * from ticket_purchased where ticket_no='$tickets' and lottery_id='".$value['id']."' and is_paid='Yes'");
	                    
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
                            "masterid"=>$master,
                            "is_paid"=>"No",
                        );
                          
                        $this->Common->insert("ticket_purchased",$array);
                    
	                }
                
        	    }
        	
        	$this->db->trans_complete();
				
			if($this->db->trans_status() === FALSE){
				$this->session->set_flashdata('fail','Payment Was not successful.Some error occured');
			    redirect(SURL."Checkout");
			}else{
			    // Set variables for paypal form
    			$returnURL = SURL."Paypal/complete"; //payment success url
    			
    			$cancelURL = SURL."Checkout"; //payment cancel url
    			$notifyURL = SURL.'Paypal/ipn'; //ipn url
    		
    			// Add fields to paypal form
    			$this->paypal_lib->add_field('return', $returnURL);
    			$this->paypal_lib->add_field('cancel_return', $cancelURL);
    			$this->paypal_lib->add_field('notify_url', $notifyURL);
    			$this->paypal_lib->add_field('item_name', 'Ticket Purchased');
    			$this->paypal_lib->add_field('custom', $this->session->userdata("Enduser"));
    			$this->paypal_lib->add_field('item_number',$master);
    			$this->paypal_lib->add_field('amount',$data['total_money']);
    			$this->cart->destroy();
    			// Render paypal form
    			$this->paypal_lib->paypal_auto_form();
                
			}    
			
	    }

	}
	
	
}
?>
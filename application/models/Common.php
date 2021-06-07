<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 */
class common extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function insert($table,$data = array()){
		
		$query = $this->db->insert($table,$data);
		if($query){
			return $this->db->insert_id();
		}else{
			return false;
		}
	}

	public function send_email($to_email, $subject, $html, $attachments = array()){
		$from_email = "no-reply@diamondprizes.com"; 
		$this->load->library('email'); 
		$config = array('charset'=>'utf-8', 'wordwrap'=> TRUE, 'mailtype' => 'html');
		$this->email->initialize($config);
		$this->email->from($from_email, 'Diamond prizes');
		$this->email->to($to_email);
		$this->email->subject($subject);
		foreach($attachments as $attach){
			$this->email->attach($attach);
		}
		$logo = IMG."Untitled-2.png";
		$html = str_replace("[LOGO]","<img src='".$logo."'>",$html);
	
		$this->email->message($html);
		
		if($this->email->send()){
			return true;
		}else{
			return false;
		}
	}
	
	
	public function user_email($email1, $subject1, $html,$attachments = array()){
	  
		$from_email =$email1; 
		$this->load->library('email'); 
		$config = array('charset'=>'utf-8', 'wordwrap'=> TRUE, 'mailtype' => 'html');
		$this->email->initialize($config);
		$this->email->from($from_email, 'Diamond prizes');
		$this->email->to("no-reply@diamondprizes.com");
		$this->email->subject($subject1);
		$this->email->message($html);
		foreach($attachments as $attach){
			$this->email->attach($attach);
		}
		$logo = IMG."Untitled-2.png";
		$html = str_replace("[LOGO]","<img src='".$logo."'>",$html);
	
		$this->email->message($html);
		
		if($this->email->send()){
			return true;
		}else{
			return false;
		}
	}

	public function get_rows($table, $params = array()){
		$this->db->select('*');
		$this->db->from($table);

		if(array_key_exists("conditions", $params)){

			foreach ($params['conditions'] as $key => $value) {
				 $this->db->where($key,$value);
			}
        	

			$query = $this->db->get();
			if($query->num_rows() > 0){

			 	return $query->result_array();
			}else{
			 	return false;
			}

		}else{
			return false;
		}
	}

	public function get_rows_by_limit($table, $params = array(),$field,$limit,$sort){
		$this->db->select('*');
		$this->db->from($table);

		if(array_key_exists("conditions", $params)){

			foreach ($params['conditions'] as $key => $value) {
				 $this->db->where($key,$value);
			}
			if(!empty($field) &&(!empty($limit))){
				$this->db->order_by($field,$sort);
				$this->db->limit($limit);
				
			}

			
        	

			$query = $this->db->get();
			if($query->num_rows() > 0){

			 	return $query->result_array();
			}else{
			 	return false;
			}

		}else{
			return false;
		}
	}


	public function get_single_row($table_name, $params = array()){
		$this->db->select('*');
		$this->db->from($table_name);

		if(array_key_exists("conditions",$params)){
			foreach ($params['conditions'] as $key => $value) {
				$this->db->where($key,$value);
			}

			$query = $this->db->get();
			if($query->num_rows() > 0){

				return $query->row();

			}else{
				return false;
			}
			
		

		}else{
			return false;
		}
	}


	public function count_record($table_name , $params=array()){
		$this->db->select("*");
		$this->db->from($table_name);

		if(array_key_exists("conditions", $params)){
			foreach ($params['conditions'] as $key => $value) {
				$this->db->where($key,$value);
			}

			$query = $this->db->get();
			return $query->num_rows();

		}else{
			return false;
		}
	}

	public function update($table, $data = array(), $params = array()){
		if(array_key_exists("conditions",$params)){
			foreach ($params['conditions'] as $key => $value) {
				$this->db->where($key,$value);
			}
			if($this->db->update($table, $data)){
				return true;
			}
		}else{

			return false;

		}
		
	}

	public function update_new($table, $data = array(), $params = array()){
		
			foreach ($params as $key => $value) {
				$this->db->where($key,$value);
			}
			if($this->db->update($table, $data)){
				return true;
			}
		
	}

	public function delete($table,$record){
		$query = $this->db->delete($table,$record);
		if($query){
			return true;;
		}else{
			return false;
		}
	}
	
	public function rating_user($id){
	    $ratingquery = $this->db->query("select count(*) as total,sum(stars) as stars from user_rating where u_id='".$id."'")->result_array()[0];
        $data['totalrating'] = floatval($ratingquery['stars']*100/($ratingquery['total']*5));
        $data['votes'] = floatval($ratingquery['total']);
        return $data;
	}
	
	public function rating_service($id){
	    $ratingquery = $this->db->query("select count(*) as total,sum(stars) as stars from service_rating where service_id='".$id."'")->result_array()[0];
        $data['totalrating'] = floatval($ratingquery['stars']*100/($ratingquery['total']*5));
        $data['votes'] = floatval($ratingquery['total']);
        return $data;
	}
	
	public function user_rank($id){
	   return 1;
	}
	
	function payment($postData){
		
		// If post data is not empty
		if(!empty($postData)){
			
			// Add customer to stripe
			$customer = $this->stripe_lib->addCustomer($postData['email'], $postData['stripeToken']);
			
			if($customer){
				// Charge a credit or a debit card
				$charge = $this->stripe_lib->createCharge($customer->id, $postData['reason'],$postData['total_money']);
				
				if($charge){ 
				    //echo "<pre>";var_dump($charge); exit;
					// Check whether the charge is successful
					if($charge['amount_refunded'] == 0 && empty($charge['failure_code']) && $charge['paid'] == 1 && $charge['captured'] == 1){
					    
						return $charge['id'];
						
					}else{
					    return false;
					}

				}else{
					return false;
				}

			}else{
				return false;
			}
		}else{
			return false;
		}
		
    }
	
	public function servicepurchased_transactions($data){
	    
	    $service_owner_id = $this->db->query("select * from services where service_id='".$data['service_id']."'")->result_array()[0]['u_id'];
	    
	    $array = array(
                "service_id"=>$data['service_id'],
                "service_owner_id"=>$service_owner_id,
                "who_purchased"=>$data['who_purchased'],
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
                "noti_sender_id"=>$data['who_purchased'],
                "link"=>$link
              );
              
        $this->Common->insert("notifications",$array);
        
        $this->db->query("update users set notifications=notifications+1 where u_id='$service_owner_id'");
        
        $array = array(
                "u_id"=>$data['who_purchased'], 
                "damount"=>$data['total_money'], 
                "camount"=>$data['total_money'],
                "totalamt"=>$data['total_money'],
                "service_id"=>$data['service_id'],
                "service_p_id"=>$service_purchase_id,
                "trans_type"=>"service_purchased",
                "date"=>date("Y-m-d H:i:s"),
                "in_escrow"=>"No",
                "is_clear"=>"Yes",
                "pg_transaction_id"=>$data['paymentid'],
                "payment_gateway"=>$data['method']
              );
              
        $this->Common->insert("transactions",$array);
        
        $array = array(
                "u_id"=>"0", 
                "damount"=>$data['total_money'],
                "camount"=>"0",
                "totalamt"=>$data['total_money'],
                "service_id"=>$data['service_id'],
                "service_p_id"=>$service_purchase_id,
                "trans_type"=>"service_purchased",
                "date"=>date("Y-m-d H:i:s"),
                "in_escrow"=>"Yes",
                "is_clear"=>"No", 
                "pg_transaction_id"=>$data['paymentid'],
                "payment_gateway"=>$data['method']
              );
              
        $this->Common->insert("transactions",$array);
        
        $array = array(
                "recv_id"=>"$service_owner_id", 
                "send_id"=>$data['who_purchased'],
                "date"=>date("Y-m-d H:i:s"),
                "msg_status"=>"Service",
                "service_id"=>$data['service_id'],
                "service_p_id"=>$service_purchase_id,
                "service_requiremnt"=>$this->input->post("servicesbuydetails"),
              );
              
        $this->Common->insert("jobs_msgs",$array);

	}
	
	public function creditspurchased_transactions($data){
	    
	    $array = array(
                "u_id"=>$data['u_id'],
                "credits"=>$data['credits'],
                "is_paid"=>"Yes",
                "date"=>date("Y-m-d H:i:s"),
                "used"=>"0",
              );
              
        $credit_purchase_id = $this->Common->insert("proposal_credits",$array);

        $array = array(
                "u_id"=>$data['u_id'], 
                "damount"=>$data['total_money'], 
                "camount"=>$data['total_money'],
                "totalamt"=>$data['total_money'],
                "proposal_credits_purchase_id"=>$credit_purchase_id,
                "trans_type"=>"prop_credits_purchased",
                "date"=>date("Y-m-d H:i:s"),
                "in_escrow"=>"No",
                "is_clear"=>"Yes",
                "pg_transaction_id"=>$data['paymentid'],
                "payment_gateway"=>$data['method']
              );
              
        $this->Common->insert("transactions",$array);
        
        $array = array(
                "u_id"=>"0", 
                "damount"=>$data['total_money'],
                "camount"=>"0",
                "totalamt"=>$data['total_money'],
                "proposal_credits_purchase_id"=>$credit_purchase_id,
                "trans_type"=>"prop_credits_purchased",
                "date"=>date("Y-m-d H:i:s"),
                "in_escrow"=>"No",
                "is_clear"=>"Yes", 
                "pg_transaction_id"=>$data['paymentid'],
                "payment_gateway"=>$data['method']
              );
              
        $this->Common->insert("transactions",$array);


	}
	
	public function job_escrow_amt($jobid){
	    $amt = $this->db->query("select sum(damount-camount) as amt from transactions where job_id='$jobid' and u_id='0' and in_escrow='Yes'")->result_array()[0]['amt'];
	    return $amt;
	    
	}
	
	public function myblnc($u_id){
	    $amt = $this->db->query("select sum(damount-camount) as amt from transactions where u_id='$u_id' and in_escrow='No' and is_clear='Yes'")->result_array()[0]['amt'];
	    return intval($amt);
	    
	}
	
	public function myproposalleft($u_id){
	    $proposal = $this->db->query("select sum(credits-used) as proposal from proposal_credits where u_id='$u_id'")->result_array()[0]['proposal'];
	    return intval($proposal);
	    
	}
	
	public function jobadons_transactions($data){
	    
	    $array = array(
                    "u_id"=>"0", 
                    "damount"=>$data['total_money'],
                    "camount"=>"0",
                    "totalamt"=>$data['total_money'],
                    "job_id"=>$data['job_id'],
                    "trans_type"=>"jobs_adons",
                    "date"=>date("Y-m-d H:i:s"),
                    "in_escrow"=>"No",
                    "is_clear"=>"Yes",
                    "pg_transaction_id"=>$data['paymentid'],
                    "payment_gateway"=>$data['method']
                );
              
        $this->Common->insert("transactions",$array);
        
        $user = $this->db->query("select * from jobs where job_id='".$data['job_id']."'")->result_array()[0]['u_id'];
        $array = array(
                    "u_id"=>$user, 
                    "damount"=>$data['total_money'],
                    "camount"=>$data['total_money'],
                    "totalamt"=>$data['total_money'],
                    "job_id"=>$data['job_id'],
                    "trans_type"=>"jobs_adons",
                    "date"=>date("Y-m-d H:i:s"),
                    "in_escrow"=>"No",
                    "is_clear"=>"Yes",
                    "pg_transaction_id"=>$data['paymentid'],
                    "payment_gateway"=>$data['method']
                );
              
        $this->Common->insert("transactions",$array);
        
        $this->db->query("update jobs set privilidge_status='Pending' where job_id='".$data['job_id']."'");
        
	}
	
	public function accept_invoice_transaction($mydata){
	    
	    $msg_id = $mydata['proposal_no'];
	    $data['record'] = $this->db->query("select * from jobs_msgs where msg_id='".$msg_id."'")->result_array()[0];
	    
	    $escrowamt = $this->Common->job_escrow_amt($data['record']['job_id']);
	    
	    $array = array(
                "u_id"=>"0", 
                "damount"=>"0",
                "camount"=>$escrowamt,
                "totalamt"=>$escrowamt,
                "job_id"=>$data['record']['job_id'],
                "trans_type"=>"invoice_acept",
                "date"=>date("Y-m-d H:i:s"),
                "in_escrow"=>"Yes",
                "is_clear"=>"No",
            );
              
        $this->Common->insert("transactions",$array);
        
        $deductionperc = $this->db->query("select * from general where id='9'")->result_array()[0]['price'];
        $deductionamt = $escrowamt * $deductionperc/100;
        
        $array = array(
            "u_id"=>"0", 
            "damount"=>$deductionamt,
            "camount"=>"0",
            "totalamt"=>$deductionamt,
            "job_id"=>$data['record']['job_id'],
            "trans_type"=>"invoice_acept",
            "date"=>date("Y-m-d H:i:s"),
            "in_escrow"=>"No",
            "is_clear"=>"Yes",
          );
          
        $this->Common->insert("transactions",$array);
        
        $earnedamt = $escrowamt - $deductionamt;
        
        $array = array(
            "u_id"=>$data['record']['send_id'], 
            "damount"=>$earnedamt,
            "camount"=>"0",
            "totalamt"=>$earnedamt,
            "job_id"=>$data['record']['job_id'],
            "trans_type"=>"invoice_acept",
            "date"=>date("Y-m-d H:i:s"),
            "in_escrow"=>"No",
            "is_clear"=>"No",
          );
          
        $this->Common->insert("transactions",$array);
        
        $this->db->query("update jobs_msgs set custom_status_extent='5' where msg_id='$msg_id'");
        
        $this->db->query("update users set notifications=notifications+1 where u_id='".$data['record']['send_id']."'");
        
        $notification = "Client has accepted your invoice.";
        
	    $job_details = $this->db->query("select users.*,jobs.* from jobs_msgs inner join jobs on jobs.job_id=jobs_msgs.job_id inner join users on users.u_id=jobs.u_id where msg_id='".$data['record']['msg_id']."'")->result_array()[0];

	    $link = "Chat/index/".$job_details['username']."/".$job_details['job_slug'];
	    $array = array(
	                    "notification"=>$notification,
	                    "noti_date"=>date("Y-m-d H:i:s"),
	                    "noti_recvr_id"=>$data['record']['send_id'],
	                    "noti_sender_id"=>$data['record']['recv_id'],
	                    "link"=>$link
	                  );
	                  
	    $this->Common->insert("notifications",$array);
	    
	    
	    if($escrowamt < $data['record']['invc_amt']){
	        
	        $amtleft = $data['record']['invc_amt'] - $escrowamt;
	        
	        $deductionamt = $amtleft * $deductionperc/100;
	        
	        $array = array(
                "u_id"=>"0", 
                "damount"=>$deductionamt,
                "camount"=>"0",
                "totalamt"=>$deductionamt,
                "job_id"=>$data['record']['job_id'],
                "trans_type"=>"invoice_acept",
                "date"=>date("Y-m-d H:i:s"),
                "in_escrow"=>"No",
                "is_clear"=>"No",
                "pg_transaction_id"=>$mydata['paymentid'],
                "payment_gateway"=>$mydata['method']
              );
              
            $this->Common->insert("transactions",$array);
            
            $earnedamt = $amtleft - $deductionamt;
            
            $array = array(
                "u_id"=>$data['record']['send_id'], 
                "damount"=>$earnedamt,
                "camount"=>"0",
                "totalamt"=>$earnedamt,
                "job_id"=>$data['record']['job_id'],
                "trans_type"=>"invoice_acept",
                "date"=>date("Y-m-d H:i:s"),
                "in_escrow"=>"No",
                "is_clear"=>"No",
                "pg_transaction_id"=>$mydata['paymentid'],
                "payment_gateway"=>$mydata['method']
              );
              
            $this->Common->insert("transactions",$array);
        
	    }
    	    

	}

	

	
}





?>
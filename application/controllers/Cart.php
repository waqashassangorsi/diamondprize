<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('url');
		$this->load->model('Common');
		$this->load->library('cart');
		
	}

	public function index()
	{   
	    //$this->cart->destroy();
	    if(!$this->session->userdata("Enduser")){
            redirect(SURL."Home");            
        }
        
	    
	    $record=array();
	    
	    foreach($this->input->post("tickets") as $key=>$value){
	        if(empty($value)){
	            continue;
	        }else{
	            $record[] = $value;
	        }
	    }
	    
	    //echo "<pre>";var_dump($this->cart->contents()); 
	    
	    if($this->cart->contents() && empty($this->input->post("tickets"))){
	        
	    }else{
	        if(!empty($record)){
	            
	            $totaltickets = count($record);
	   
	            $tickets = implode(",",$record);
	          
	            $lotery_record = $this->db->query("select * from lottery where lottery_id='".$this->input->post("lottery_id")."'")->result_array()[0];
            	$img = $this->db->query("select * from lottery_images where lottery_id='".$this->input->post("lottery_id")."'")->result_array()[0]['images'];
                $lotery_record['product_name'] = str_replace( array( '\'', '"', ',','+', ';','(',')', '<', '>','£' ), ' ', $lotery_record['product_name']);
                    
	            $data = array(
                            'id'      => $this->input->post("lottery_id"),
                            'qty'     => $totaltickets,
                            'price'   => $lotery_record['price'],
                            'name'    => $lotery_record['product_name'],
            				'image'   => $img,
            				'tickets' => $tickets,
                );
                
                $insert = $this->cart->insert($data);
                
                $array = array(
                            'lottery_id'      => $this->input->post("lottery_id"),
                            'qty'     => $totaltickets,
            				'tickets' => $tickets,
            				'u_id' => $this->session->userdata("Enduser"),
                );
                
                $this->Common->insert("carts",$array);
	            
	            $this->session->set_flashdata("success","Added to Cart");
	            
	            redirect(SURL.'Tickets/index/'.$this->input->post("lottery_id"));
	            
               
	        }else{
	            $this->session->set_flashdata("fail","Something went wrong.Please try again later.");
	            redirect(SURL.'Home');
	        }
	    }
	    
	    //echo count($this->cart->contents());
	    //echo "<pre></pre>";var_dump($this->cart->contents());
	    
	    
		$this->load->view("Cart", $data);
		
	} 

	public function add(){
		//echo "<pre>";var_dump($this->input->post()); 
		$this->cart->destroy();

		$i=0;
		foreach($this->input->post("lottery_id") as $key=>$value){
		   
			$data = array(
				'id' => $value,
				'qty'     => $this->input->post("quantity")[$i],
				'price'   => $this->input->post("price")[$i],
				'name'    => $this->input->post("name")[$i],
				'image'    => $this->input->post("image")[$i],
				'tickets' => $this->input->post("tickets")[$i],
				
			);
	
			$insert = $this->cart->insert($data);
			
			$array = array(
				'lottery_id' => $value,
				'qty'     => $this->input->post("quantity")[$i],
				'tickets' => $this->input->post("tickets")[$i],
				'u_id' => $this->session->userdata("Enduser"),
			);
	
			$this->Common->insert("carts",$array);
			
			$i++;
		}
		
		redirect(SURL.'Cart');

	}

	public function updateqty(){
		$data = array(
			'rowid'=> $this->input->post("id"),
			'qty'=>$this->input->post("qty"),
		);
		

		$insert = $this->cart->update($data);
		if($insert){
			echo 0;
		}else{
			echo 1;
		}

	}

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class Tickets extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		 $this->load->library('Check');
		  $this->load->library('Uploadimage');
		 $this->load->model('Common');
		 $this->load->library('form_validation');
		 $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
	}


	public function index(){ 
		
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "admin/Tickets/";
		 $data['Controller_name'] = "All Tickets";
		 $data['Newcaption'] = "All Tickets";
// =============================================fix data ends here====================================================

		$con['conditions']=array();
		//$data['record'] = $this->common->get_rows("lottery",$con);
		$data['record'] = $this->Common->get_rows("tickets",$con);
		 $this->load->view("admin/Tickets.php",$data);
	}
	
		public function Addtickets(){ 
		
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "admin/Tickets/";
		 $data['Controller_name'] = "All Tickets";
		 $data['method_url'] = "admin/Tickets/Addtickets";
		 $data['method_name'] = "Add Tickets";
// =============================================fix data ends here====================================================
        
	
		$data['name'] = $this->db->query("select * from lottery where lottery_id not in(select lottery_id from tickets)")->result_array();
        
        //echo "<pre>";var_dump($data['name']);
        $this->load->view("admin/Addtickets.php",$data);
     
	}
	
	
	 public  function insertticket(){
		     
		//echo "<pre>";var_dump($this->input->post()); exit; 
		
        $array = array(
					   'Ticket_price' => $this->input->post("ticketprice"),
					   'TicketA' =>$this->input->post("ticketa"),
					   'lottery_id'=>$this->input->post("lotteryname")
					);
               

        if(!empty($this->input->post("edit"))){
	        $insert = $this->input->post("edit");
	        $con['conditions'] = array("id"=>$insert);
	        $query = $this->Common->update("tickets",$array,$con);
	    }else{
	          $query = $this->Common->insert("tickets",$array);;
	    }      
		
		if($query){
	           $this->session->set_flashdata('success','Information added Successfully');
	           redirect(SURL1."Tickets/Addtickets");
	   }else{
	           $this->session->set_flashdata('fail','Try Again Later');
	          redirect(SURL1."Tickets/Addtickets");
	   }

		     
	}
	
	
	public  function editticket($id){
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "admin/Tickets/";
		 $data['Controller_name'] = "All Tickets";
		 $data['method_url'] = "admin/Tickets/Addtickets";
		 $data['method_name'] = "Add Tickets";
	
// =============================================fix data ends here====================================================
	     $data['name'] = $this->db->query("select * from lottery where lottery_id not in(select lottery_id from tickets)")->result_array();
	
	     $data["record"]= $this->db->query("select * from tickets where id='$id'")->result_array()[0];
        //echo "<pre>";var_dump($data["result"]);
         $con['conditions']=array();
	
		$data['name'] = $this->Common->get_rows("lottery",$con);
		$this->load->view("admin/Addtickets",$data);
		      
       

		     
	}
	
	
	
	
	
	public function delete($id)
{
    	$id = intval($id);
		$data['user'] = $this->check->Login();
		
		$query=$this->common->delete("tickets",array("id"=>$id));
		if($query)
		{
		      $this->session->set_flashdata('success','Ticket Deleted Successfully');
         	  redirect("admin/Tickets");
		}
		
		else
		{
		    $this->session->set_flashdata('fail','Something wrong');
         	redirect("admin/Tickets");
		    
		}
}

	





}
?>
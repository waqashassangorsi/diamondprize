<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class Promocode extends CI_Controller{
	
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
		 $data['Controller_url'] = "admin/Promocode/";
		 $data['Controller_name'] = "All Promocode";
		 $data['Newcaption'] = "All Promocode";
// =============================================fix data ends here====================================================

		$con['conditions']=array();
		$data['record'] = $this->common->get_rows("promo",$con);
		 $this->load->view("admin/Promocode.php",$data);
	}




	public function Addpromocode(){ 
		
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "admin/Promocode/";
		 $data['Controller_name'] = "All Promocode";
		 $data['method_url'] = "admin/Promocode/Addpromocode";
		 $data['method_name'] = "Add Promocode";
// =============================================fix data ends here====================================================

             $con['conditions'] = array(); 
			 $data['customer2'] = $this->Common->get_rows("lottery",$con);
        $this->load->view("admin/Addpromocode.php",$data);
     
	}
	
	public function initiate($id){ 
		
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "admin/Lottery/";
		 $data['Controller_name'] = "All Lottery";
		 $data['method_url'] = "admin/Lottery/Addlottery";
		 $data['method_name'] = "Add Lottery";
// =============================================fix data ends here====================================================
         $query = $this->db->query("select ticket_no from ticket_purchased where lottery_id='$id'")->result_array();
         
        $chkwiner = $this->db->query("select * from winners where lottery_id='$id'");
        
        if($chkwiner->num_rows() > 0){
            $this->session->set_flashdata("fail","You have already choosen a winner for this lottery. please choose another one");
            redirect(SURL1.'Lottery');
        }else{
            
            $data['no'] = $query[0]['ticket_no'];
            
            $u_id = $this->db->query("select * from ticket_purchased where lottery_id='$id'")->result_array()[0]['u_id'];
            
           
            $array = array(
                            "u_id"=>$u_id,
                            "lottery_id"=>$id,
                            "ticket_no"=>$data['no'],
                            "winer_date"=>date("Y-m-d")
                          );
            
            $query = $this->common->insert("winners",$array); 
            
            $email = $this->db->query("select * from users where u_id='$u_id'")->result_array()[0]['email'];
            $data['product_name'] = $this->db->query("select * from lottery where lottery_id='$id'")->result_array()[0]['product_name'];
			$html = $this->load->view("wishprize.php",$data,true);
            $emailsent = $this->common->send_email($email, 'Diamond Prize', $html);
            //var_dump($emailsent);
            
            if($query){
                
            }else{
                $this->session->set_flashdata("fail","Something went wrong. please try again later.");
            }
        }
        
        
        
         
        $this->load->view("admin/initiatelottery.php",$data);
     
	}
		 
    public  function insertpromocode(){
		     
      
        $array = array(
                       'code' => $this->input->post("promocode"),
               	       'useable' =>$this->input->post("validfor"),
					   'promopercentage' =>$this->input->post("promopercentage"),
					);
					
					
		if(!empty($this->input->post("edit"))){
	        $insert = $this->input->post("edit");
	        $con['conditions'] = array("promo_id"=>$insert);
	        $this->Common->update("promo",$array,$con);
	    }else{
	        $insert = $this->Common->insert("promo",$array);
	    }	
	    
	   if($insert){    
        $this->session->set_flashdata('success','Information Uploaded');
	     redirect(SURL1."Promocode/Addpromocode");  
             
        }else{
        $this->session->set_flashdata('fail','Something wrong');
	   redirect(SURL1."Promocode/Addpromocode");  
        }

	}
	
	
	public function Editpromocode($id){ 

// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "admin/Promocode/";
		 $data['Controller_name'] = "All Promocode";
		 $data['method_url'] = "admin/Promocode/AddPromocode";
		 $data['method_name'] = "Edit Promocode";
	
// =============================================fix data ends here====================================================
	    
	    $con['conditions'] = array(); 
		$data['customer2'] = $this->Common->get_rows("lottery",$con);
			 
	    $con['conditions'] = array("promo_id"=>$id);
	    $data["record"]= $this->common->get_single_row("promo",$con);
	   
		$this->load->view("admin/Addpromocode",$data);

	}
	

    public function delete($id)
    {
    	$id = intval($id);
		$data['user'] = $this->check->Login();
		
		$query=$this->common->delete("promo",array("promo_id"=>$id));
		if($query)
		{
		    	$this->session->set_flashdata('success','Data Deleted Successfully');
         	      redirect("admin/promocode");
		}
		
		else
		{
		    	$this->session->set_flashdata('fail','Something wrong');
         	      redirect("admin/promocode");
		    
		}
    }
    




}
?>
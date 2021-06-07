<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class Lottery extends CI_Controller{
	
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
		 $data['Controller_url'] = "admin/Lottery/";
		 $data['Controller_name'] = "All Lottery";
		 $data['Newcaption'] = "All Lottery";
// =============================================fix data ends here====================================================

		$con['conditions']=array();
		$data['record'] = $this->common->get_rows("lottery",$con);
		 $this->load->view("admin/Lottery.php",$data);
	}




	public function Addlottery(){ 
		
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "admin/Lottery/";
		 $data['Controller_name'] = "All Lottery";
		 $data['method_url'] = "admin/Lottery/Addlottery";
		 $data['method_name'] = "Add Lottery";
// =============================================fix data ends here====================================================

        $this->load->view("admin/Addlottery.php",$data);
     
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
            foreach($query as $key=>$value){
                $record[] = $value['ticket_no'];
            }
            
            $randIndex = array_rand($record);
            
            $data['no'] = $record[$randIndex];
            
            $u_id = $this->db->query("select * from ticket_purchased where lottery_id='$id' and ticket_no='".$data['no']."'")->result_array()[0]['u_id'];
            
           
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
		 
    public  function insertlottery(){
		     
        $file="";	  

        //echo "<pre>";var_dump($_FILES['files']); exit;
        
        $this->db->trans_start();
        
        $description=$this->input->post('description');
        
        $maximum_buy_limit=$this->input->post('maximum_buy_limit');
        
       
             
         
        $array = array(
               	       'product_name' =>$this->input->post("name"),
					   'price' => $this->input->post("price"),
					   'priceeuro' => $this->input->post("priceineuro"),
					   'start_date' =>$this->input->post("startingdate"),
					   'ending_date' =>$this->input->post("enddate"),
					   'maximum_buy_limit'=>$this->input->post("maximum_buy_limit"),
					   'lottery_name'=>$this->input->post("lotteryname"),
					   'description'=>$this->input->post("description"),
					);
					
					
		if(!empty($this->input->post("edit"))){
	        $insert = $this->input->post("edit");
	        $con['conditions'] = array("lottery_id"=>$insert);
	        $this->Common->update("lottery",$array,$con);
	    }else{
	        $insert = $this->Common->insert("lottery",$array);
	    }	
	    
	    
	    if($_FILES['files']['size'][0] > 0){  
            $directory = 'uploads/';
            $alowedtype = "jpeg|jpg|png";
            $results = $this->uploadimage->uploadfile($directory,$alowedtype,"files");
            //echo "<pre>";var_dump($results);exit;    
            
            if(!empty($results[0]["file_name"])){
                
                foreach($results as $key=>$value){
                    
                    $file = $directory.$value['file_name'];
                    $array = array(
               	       'lottery_id' =>$insert,
					   'images' => $file,
					);
					
					$this->Common->insert("lottery_images",$array);
					
                }
            }
            
            
            
            
        }else{
            if(!empty($this->input->post("edit"))){
                $chkimages = $this->db->query("select * from lottery_images where lottery_id='$insert'");
                if($chkimages->num_rows() > 0){
                    
                }else{
                    $this->session->set_flashdata('fail','Image is missing');
	                redirect(SURL1."Lottery/AddLottery");  
                }
            }else{
                $this->session->set_flashdata('fail','Image is missing');
	            redirect(SURL1."Lottery/AddLottery");  
            }
            
        }
					
        $this->db->trans_complete();       
			  	
		if($this->db->trans_status() === FALSE){
	         $this->session->set_flashdata('fail','Try Again Later');
	         redirect(SURL1."Lottery/AddLottery");  
	    }else{
	         $this->session->set_flashdata('success','Information added Successfully');
	         redirect(SURL1."Lottery/AddLottery");
	    }

        

		     
	}
	
	
	public function Editlottery($id){ 

// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "admin/Lottery/";
		 $data['Controller_name'] = "All Lottery";
		 $data['method_url'] = "admin/Lottery/Addlottery";
		 $data['method_name'] = "Edit Lottery";
	
// =============================================fix data ends here====================================================
	    
	    $con['conditions'] = array("lottery_id"=>$id);
	    $data["record"]= $this->common->get_single_row("lottery",$con);
	    
	    $data['images'] = $this->db->query("select * from lottery_images where lottery_id='$id'")->result_array();
        //echo "<pre>";var_dump($data["result"]);
        
		$this->load->view("admin/Addlottery",$data);

	}
	

    public function delete($id)
    {
    	$id = intval($id);
		$data['user'] = $this->check->Login();
		
		$query=$this->common->delete("lottery",array("lottery_id"=>$id));
		if($query)
		{
		    	$this->session->set_flashdata('success','User Deleted Successfully');
         	      redirect("admin/Lottery");
		}
		
		else
		{
		    	$this->session->set_flashdata('fail','Something wrong');
         	      redirect("admin/Lottery");
		    
		}
    }
    
    public function deleteimage(){
        $loteryid = $this->uri->segment("4");
        $imgid = $this->uri->segment("5");
        
        $query = $this->db->query("delete from lottery_images where id='$imgid'");
        if($query){
            $this->session->set_flashdata('success','Image Deleted Successfully');
         	redirect("admin/Lottery/EditLottery/$loteryid");
        }
    }




}
?>
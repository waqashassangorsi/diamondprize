<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class Cart extends CI_Controller{
	
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
		 $data['Controller_url'] = "admin/Cart/";
		 $data['Controller_name'] = "All Cart";
		 $data['Newcaption'] = "All Cart";
// =============================================fix data ends here====================================================

		$con['conditions']=array();
		$data['record'] = $this->common->get_rows("carts",$con);
		 $this->load->view("admin/Cart",$data);
	}
	
	public function sendmail(){ 
	    
        $cart_record = $this->db->query("select carts.*,users.* from carts inner join users on users.u_id=carts.u_id where id='".$this->input->post('id')."'")->result_array()[0];
        // echo "<pre>";var_dump($cart_record);
        // exit;
        
        $data['record'] = $cart_record;
        $email = $cart_record['email'];
        
		$html = $this->load->view("EmailAddcard.php",$data,true);
        $emailsent = $this->Common->send_email($email, 'Diamond Prizes', $html);
        
        if( $emailsent)
        {
            $this->session->set_flashdata("success","Email send to your email address.");
        }
        
        else{
                $this->session->set_flashdata("fail","Something went wrong. please try again later.");
        }
        
        redirect(SURL1.'Cart');
        
	}

}
?>
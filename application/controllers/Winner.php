<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Winner extends CI_Controller{
        
    public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('url');
		$this->load->model('Common');
		
	}
	
    public function index(){
            
        $data['winners'] = $this->db->query("select winners.*,users.*,lottery.* from winners inner join users on winners.u_id=users.u_id inner join lottery on lottery.lottery_id=winners.lottery_id order by winer_date")->result_array();
        //echo "<pre>";var_dump($data['winners']); 
        $this->load->view('Winner',$data);
    }

}
?>
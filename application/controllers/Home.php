<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{


    public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('url');
		$this->load->model('Common');
		
	}



    public function index(){
            
        $today_date = date("Y-m-d");
        $data['lottery'] = $this->db->query("SELECT lottery.* FROM lottery inner join tickets on tickets.lottery_id=lottery.lottery_id where ending_date > '$today_date' and TicketA!='300' limit 6")->result_array();
        
        $data['upcoming_events'] = $this->db->query("SELECT * FROM lottery where start_date > '$today_date'")->result_array();
            
        $data['reviews'] = $this->db->query('SELECT * FROM reviews')->result_array();
        
        $data['blog'] = $this->db->query('SELECT * FROM blog')->result_array();
        //echo "<pre>";var_dump($data['blog']);exit;
        
        $this->load->view('Home',$data);
            
    }
}
?>
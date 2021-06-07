<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class TermsnConditions extends CI_Controller{
        
        public function __construct()
	{
	    
		parent::__construct();
		
    		$this->load->helper('url');
    		$this->load->model('Common');
    	}
	
        public function index(){
            
            $this->load->view('TermCondation');
        }
    }
?>
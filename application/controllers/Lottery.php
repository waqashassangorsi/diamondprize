<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Winner extends CI_Controller{

public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('url');
		$this->load->model('common');
		error_reporting(0);
	}


        public function index(){
            $this->load->view('Lottery');
        }
    }
?>
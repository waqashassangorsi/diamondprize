<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Eror404 extends CI_Controller{

        public function index(){
            $this->load->view('Eror404');
        }
    }
?>
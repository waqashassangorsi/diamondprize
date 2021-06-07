<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Contact extends CI_Controller{

        public function index(){
            $this->load->view('Contact');
        }
        
         public function sendemail(){
             
             $name=$this->input->post('name');
             $email1=$this->input->post('email');
             $subject1=$this->input->post('subject');
             $html=$this->input->post('message');
             
              $emailsent = $this->Common->user_email($email1,$subject1,$html);
              
              if($emailsent)
              {
                     $this->session->set_flashdata("success","Email Sent.");
                  	 redirect(SURL."Contact");
              }
              else
              {
                     $this->session->set_flashdata("fail","Something went wrong. please try again later.");
                  	redirect(SURL."Contact");
                  
              }
             
             
        }
    }
?>
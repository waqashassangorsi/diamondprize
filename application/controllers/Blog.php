<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Blog extends CI_Controller{

        public function index(){
            
            $data['blog'] = $this->db->query("select * from blog ")->result_array();
            //var_dump($data['blog']);exit;
            $this->load->view('Bloglist',$data);
        }
        
        public function singleblog($id){
            
            $data['singleBlog'] = $this->db->query("select * from blog where id = ".$id."")->result_array()[0];
            
            $data['record'] = $this->db->query("select * from blog ")->result_array();
            
           // var_dump($data['record']);exit;
            
            $this->load->view('Blog',$data);
        }
    }
?>
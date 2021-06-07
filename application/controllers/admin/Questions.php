<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class Questions extends CI_Controller{
	
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
		 $data['Controller_name'] = "All Questions";
		 $data['Newcaption'] = "All Questions";
// =============================================fix data ends here====================================================

		$data['record'] = $this->db->query("select questions.*,lottery.* from questions inner join lottery on questions.lottery_id=lottery.lottery_id")->result_Array();
		 $this->load->view("admin/questions.php",$data);
	}




	public function Add(){ 
		
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "admin/Questions/";
		 $data['Controller_name'] = "All Quesions";
		 $data['method_url'] = "admin/Questions/Add";
		 $data['method_name'] = "Add Quesions";
// =============================================fix data ends here====================================================
        
        $data['lottery'] = $this->db->query("select * from lottery")->result_array();
        $this->load->view("admin/Addquestions.php",$data);
     
	}
	
	public function addquestion(){ 
        
        //echo "<pre>";var_Dump($); exit;
        
        if(!empty($this->input->post("edit"))){
            
            $edit = $this->input->post("edit");
            
            $this->db->query("delete from questions where id='$edit'");
            $this->db->query("delete from answers where question_id='$edit'");
        }
        
        $array = array(
                      "question"=>$this->input->post("title"),
                      "lottery_id"=>$this->input->post("lottery_id"),
                      );
                      
        $questionid = $this->Common->insert("questions",$array); 
        
        $i=1;
        foreach($this->input->post("answers") as $key=>$value){
            
            if($i==$this->input->post("rightanswer")){
                $is_true = "Yes";
            }else{
                $is_true = "No";
            }
            $array = array(
                      "myanswer"=>$value,
                      "question_id"=>$questionid,
                      "is_true"=>"$is_true",
                      );
                      
            $this->Common->insert("answers",$array); 
            $i++;
        }
        
        $this->session->set_flashdata("success","Question added successfully.");
        redirect(SURL1.'Questions');
	}
	
	public function edit($questionid){ 
		
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "admin/Questions/";
		 $data['Controller_name'] = "All Quesions";
		 $data['method_url'] = "admin/Questions/Add";
		 $data['method_name'] = "Add Quesions";
// =============================================fix data ends here====================================================
        
         $data['lottery'] = $this->db->query("select * from lottery")->result_array();
         
        $data['question'] = $this->db->query("select * from questions where id='$questionid'")->result_array()[0];
        $data['answers'] = $this->db->query("select * from answers where question_id='$questionid'")->result_array();
        
        $i=1;
        foreach($data['answers'] as $key=>$value){
            if($value['is_true']=="Yes"){
                $data['corectanswer'] = $i;
            }
            $i++;
        }
        
        //echo "<pre>";var_dump($data['answers']);
        
        $this->load->view("admin/Addquestions.php",$data);
     
	}
	
	




}
?>
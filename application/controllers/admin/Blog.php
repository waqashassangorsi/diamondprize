<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class Blog extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		 $this->load->library('Check');
		 $this->load->library('Uploadimage');
		 $this->load->model('Common');
	}


	public function index(){ 
		
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "admin/Blog/";
		 $data['Controller_name'] = "All Blog";
		 $data['Newcaption'] = "All Blog";
// =============================================fix data ends here====================================================


		 
         $data['blog'] = $this->db->query("select * from blog")->result_array();
         //echo "<pre>"; var_dump($data['blog']);exit;
		 $this->load->view("admin/Blog.php",$data);
	}
	
	public function Addblog(){
	   
	    if($this->input->post('blog_heading')){
	       
	        
	        $file="";	    
		    if($_FILES['files']['size'] > 0){ 
               //echo "<pre>";var_dump($_FILES['files']['name']);exit;
                $directory = 'uploads/';
                $alowedtype = "gif|jpg|png|jpeg";
                $results = $this->uploadimage->singleuploadfile($directory,$alowedtype,"files");
               
              
                if(!empty($results[0]["file_name"])){
                   
                    $file = $directory.$results[0]['file_name'];
                }else{
                     $query = $this->db->query("select * from blog where id = $id")->result_array()[0];
                     $file = $query['image'];
                 }
            }
	        
	        $heading = $this->input->post('blog_heading');
	        $description = $this->input->post('description');
	        $title = $this->input->post('blog_title');
	        $date = $this->input->post('blog_date');
	        $metadesciption= $this->input->post('meta_description');
	        $array = array(
	                    'heading' => $heading,
	                    'title' => $title,
	                    'description' => $description,
	                    'date' => $date,
	                    'image' => $file,
	                    'meta_description'=>$metadesciption
	            );
	        if(empty($this->input->post("edit"))){

		 		$query = $this->Common->insert("blog",$array);

		 	}else{

		 		$con['conditions'] = array('id' =>$this->input->post("edit")); 
		 		//echo "<pre>";var_dump($array);exit;
				$query = $this->Common->update("blog",$array,$con);
				
			

		 	}
		 	
	 		if($query){
    			$this->session->set_flashdata('success','Blog Update Successfully');
    			redirect("admin/Blog");
	        }else{
			
    			$this->session->set_flashdata('fail','Try Again Later');
    			redirect("Blog/Addblog");
	        }
	    }
	    
	    $this->load->view('admin/Addblog.php');
	}
	
// 	public function ediBlog(){
	    
// 	    if($this->input->post("heading")){
// 	        $file="";	    
// 		    if($_FILES['opngbl']['size'] > 0){ 
//               //echo "<pre>";var_dump($_FILES['opngbl']['name']);exit;
//                 $directory = 'uploads/';
//                 $alowedtype = "gif|jpg|png|jpeg";
//                 $results = $this->uploadimage->singleuploadfile($directory,$alowedtype,"opngbl");
               
              
//                 if(!empty($results[0]["file_name"])){
                   
//                     $file = $directory.$results[0]['file_name'];
//                 }else{
//                     $query = $this->db->query("select * from blog where id = $id")->result_array()[0];
//                     $file = $query['image'];
//                 }
//             }
// 	        $array = array('heading' => $this->input->post("heading"),
// 						   'sub_heading' => $this->input->post("subheading"),
// 						   'image' => $file
// 						);
            
// 		 	$id = $this->input->post('id');
		 	
// 		 	$con['conditions']=array("id"=>$id);
// 		 	//echo "<pre>";var_dump($con['conditions']);exit;
// 		 	$query= $this->common->update("blog",$array,$con);
		 	
// 		 	//echo "<pre>";var_dump($query);exit;
		 	
//             if($query){
// 			    $this->session->set_flashdata('success','Edit Successfully');
// 				 redirect("Blog");
// 			}else{
// 			    $this->session->set_flashdata('fail','Some error occured,plz try again later');
// 				 redirect("admin/Blog/Addblog");
// 			}
// 	    }
// 	    $this->load->view("Addblog");
	    
// 	}

public function EditBlog($id){ 

// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "Employee/";
		 $data['Controller_name'] = "All Blog";
		 $data['method_url'] = "Blog/Addblog";
		 $data['method_name'] = "Edit Blog";
	
// =============================================fix data ends here====================================================
		$id = intval($id);

		$con['conditions']=array("id"=>$id);
		$userrecord = $this->common->get_single_row("blog",$con);
		
		$data['record'] = $userrecord;

		$this->load->view("admin/Addblog.php",$data);

	}
	

	public function delete($id){
	

		$this->db->query("delete from blog where id='$id'");

		$this->db->trans_complete(); //transation ends here

		if($this->db->trans_status() === FALSE){
			$this->session->set_flashdata('fail','Try Again Later');
	   }else{
			$this->session->set_flashdata('success','User Deleted.');
	   }
	   redirect("admin/Blog");
	}


	
	

	
	
	

	

	

}
?>
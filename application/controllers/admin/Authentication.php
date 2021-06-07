<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

// Load the Rest Controller library
require APPPATH . '/libraries/REST_Controller.php';

class Authentication extends REST_Controller {

    public function __construct() { 
        parent::__construct();
        
        // Load the user model
        $this->load->model('Common');
        $this->load->library('Uploadimage');

        error_reporting(0);
    }

    
    
    public function record_post(){
        $identityno = $this->input->post("identityno");
        $f_name = $this->input->post("f_name");
        $l_name = $this->input->post("l_name");
        $gender = $this->input->post("gender");
        $dob = $this->input->post("dob");
        $adres1 = $this->input->post("adres1");
        $adres2 = $this->input->post("adres2");
        $neighbourhood = $this->input->post("neighbourhood");
        $city = $this->input->post("city");
        $country = $this->input->post("country");
        $house_phone_no = $this->input->post("house_phone_no");
        $contract_no = $this->input->post("contract_no");
        $lat = $this->input->post("lat");
        $long = $this->input->post("long");
        $imei = $this->input->post("imei");
        $model = $this->input->post("model");
        $serialno = $this->input->post("serialno");
        $ethernetmacaddress = $this->input->post("ethernetmacaddress");
        $androidversion = $this->input->post("androidversion");
        $primaryno = $this->input->post("primaryno");
        $secondaryno = $this->input->post("secondaryno");
        $player_id = $this->input->post("player_id");
        
        // $chino = $this->db->query("select * from users where primaryno='$primaryno'");
        // if($chino->num_rows() > 0){
        //      $this->response(['status' => FALSE, 'message' => "Number Already exist","data" =>''], REST_Controller::HTTP_OK); 
        // }
       
                
        if($_FILES['file']['size']>0){
            $directory = 'uploads/';
            $alowedtype = "*";
            $results = $this->uploadimage->singleuploadfile($directory,$alowedtype,"file");
           
            if($results){
                if(empty($results[0]['file_name'])){
                  $this->response(['status' => FALSE, 'message' => "Image is missing","data" =>$data], REST_Controller::HTTP_OK); 
                }
                
              $filename = $directory.$results[0]['file_name']; 

              $array = array("fname"=>$f_name,
                             "l_name"=>$l_name,
                             "identityno"=>$identityno,
                             "gender"=>$gender,
                             "dob"=>$dob,
                             "adres1"=>$adres1,
                             "adres2"=>$adres2,
                             "neighbourhood"=>$neighbourhood,
                             "city"=>$city,
                             "country"=>$country,
                             "house_phone_no"=>$house_phone_no,
                             "contract_no"=>$contract_no,
                             "image"=>$filename,
                             "datentime"=>date("Y-m-d H:i:s"),
                             "primaryno"=>$primaryno,
                             "serialno"=>$serialno,
                             "ethernetmacaddress"=>$ethernetmacaddress,
                             "androidversion"=>$androidversion,
                             "secondaryno"=>$secondaryno,
                             "lati"=>$lat,
                             "longi"=>$long,
                             "imei"=>$imei,
                             "model"=>$model,
                             "playerid"=>$player_id,
                      );

                $insert_id = $this->Common->insert("users",$array);
                
                $con['conditions']=array("u_id"=>$insert_id);
                $data = $this->Common->get_rows("users",$con);
                
        
                $this->response(['status' => TRUE, 'message' => "Record inserted","data" =>$data], REST_Controller::HTTP_OK);
               
            }   
            

        }else{
             $this->response(['status' => FALSE, 'message' => "File is missing","data" =>''], REST_Controller::HTTP_OK);
        }

    }
    
     public function chk_for_no_post(){
         $no = $this->input->post("primaryno");
         $query = $this->db->query("select * from users where primaryno='$no'");
         if($query->num_rows() > 0){
             $this->response(['status' => FALSE, 'message' => "Record Already exist.please contact admin","data" =>''], REST_Controller::HTTP_OK);
         }else{
             $this->response(['status' => TRUE, 'message' => "Record doesnt exist,proceed further","data" =>''], REST_Controller::HTTP_OK);
         }
     }
    
    public function user_login_post(){
        
        $finger_status = $this->input->post("finger_status");
        $Lati = $this->input->post("Lati");
        $Longi = $this->input->post("Longi");
        $Batry_lvl = $this->input->post("Batry_lvl");
      
                
        if($_FILES['file']['size']>0){
            $directory = 'uploads/';
            $alowedtype = "*";
            $results = $this->uploadimage->singleuploadfile($directory,$alowedtype,"file");
           
            if($results){
                if(empty($results[0]['file_name'])){
                  $this->response(['status' => FALSE, 'message' => "Image is missing","data" =>$data], REST_Controller::HTTP_OK); 
                }
                
              $filename = $directory.$results[0]['file_name']; 

              $array = array("fname"=>$f_name,
                             "l_name"=>$l_name,
                             "identityno"=>$identityno,
                             "gender"=>$gender,
                             "dob"=>$dob,
                             "adres1"=>$adres1,
                             "adres2"=>$adres2,
                             "neighbourhood"=>$neighbourhood,
                             "city"=>$city,
                             "country"=>$country,
                             "house_phone_no"=>$house_phone_no,
                             "contract_no"=>$contract_no,
                             "image"=>$filename,
                             "datentime"=>date("Y-m-d H:i:s"),
                             "primaryno"=>$primaryno,
                             "serialno"=>$serialno,
                             "ethernetmacaddress"=>$ethernetmacaddress,
                             "androidversion"=>$androidversion,
                             "secondaryno"=>$secondaryno,
                             "lati"=>$lat,
                             "longi"=>$long,
                             "imei"=>$imei,
                             "model"=>$model,
                      );

                $insert_id = $this->Common->insert("users",$array);
                
                $con['conditions']=array("u_id"=>$insert_id);
                $data = $this->Common->get_rows("users",$con);
                
        
                $this->response(['status' => TRUE, 'message' => "Record inserted","data" =>$data], REST_Controller::HTTP_OK);
               
            }   
            

        }else{
             $this->response(['status' => FALSE, 'message' => "File is missing","data" =>''], REST_Controller::HTTP_OK);
        }


    }
    
    public function uploadnumber_post(){
        $primaryno = $this->input->post("primaryno");
        $secondaryno = $this->input->post("secondaryno");
        $u_id = $this->input->post("u_id");
        $lat = $this->input->post("lat");
        $long = $this->input->post("long");
        $imei = $this->input->post("imei");
        $model = $this->input->post("model");
        $serialno = $this->input->post("serialno");
        $ethernetmacaddress = $this->input->post("ethernetmacaddress");
        $androidversion = $this->input->post("androidversion");
        
        $this->db->query("update users set primaryno='$primaryno',serialno='$serialno',ethernetmacaddress='$ethernetmacaddress',androidversion='$androidversion',secondaryno='$secondaryno',lati='$lat',longi='$long',imei='$imei',model='$model' where u_id='$u_id'");
        $this->response(['status' => TRUE, 'message' => "Record updated","data" =>''], REST_Controller::HTTP_OK);
    }

    
    public function updateplayerid_post(){
        $player_id = $this->input->post("player_id");
        $u_id = $this->input->post("u_id");
        
        $this->db->query("update users set playerid='$player_id' where u_id='$u_id'");
        $this->response(['status' => TRUE, 'message' => "Record updated","data" =>''], REST_Controller::HTTP_OK);
    }
    
    public function updatelocationonthumbscan_post(){
        $u_id = $this->input->post("u_id");
        $lat = $this->input->post("lat");
        $long = $this->input->post("long");
        $finger_status = $this->input->post("finger_status");
        $Batry_lvl = $this->input->post("Batry_lvl");
        $filename="";
        
        if($_FILES['file']['size']>0){
            $directory = 'uploads/';
            $alowedtype = "*";
            $results = $this->uploadimage->singleuploadfile($directory,$alowedtype,"file");
           
            if($results){
                if(empty($results[0]['file_name'])){
                   $filename = "";
                }else{
                   $filename = $directory.$results[0]['file_name']; 
                }
            }   
        }
        
        if($filename==""){
            $this->response(['status' => FALSE, 'message' => "Image is missing","data" =>''], REST_Controller::HTTP_OK);
        }
        
         $array = array("u_id"=>$u_id,
                        "lati"=>$lat,
                        "longi"=>$long,
                        "fingerstatus"=>$finger_status,
                        "btrylvl"=>$Batry_lvl,
                        "image"=>$filename,
                        "time"=>date("Y-m-d H:i:s")
                       );

        $insert_id = $this->Common->insert("locations",$array);
        
        $this->db->query("delete from ask_for_login where u_id='$u_id'");
        
        if($insert_id){
             $this->response(['status' => TRUE, 'message' => "Record Inserted","data" =>''], REST_Controller::HTTP_OK);
        }else{
             $this->response(['status' => FALSE, 'message' => "Record not inserted.","data" =>''], REST_Controller::HTTP_OK);
        }
        
       
    }
    
    public function languages_post(){
        $u_id = $this->input->post("u_id");
        $lat = $this->input->post("lat");
        $long = $this->input->post("long");
        
         $con['conditions'] = array();

        $data = $this->db->query("select languages.* from languages inner join questions on lang_id=languages.id")->result_array();
        
        if($data){
             $this->response(['status' => TRUE, 'message' => "All Languages","data" =>$data], REST_Controller::HTTP_OK);
        }else{
             $this->response(['status' => TRUE, 'message' => "Location mis matched","data" =>''], REST_Controller::HTTP_OK);
        }
        
       
    }
    
    public function get_first_record_post(){
        $lang_id = $this->input->post("lang_id");
        
         $con['conditions'] = array("lang_id"=>$lang_id);

        $data = $this->Common->get_rows("questions",$con);
        
        if($data){
             $this->response(['status' => TRUE, 'message' => "All Languages","data" =>$data], REST_Controller::HTTP_OK);
        }else{
             $this->response(['status' => TRUE, 'message' => "Location mis matched","data" =>''], REST_Controller::HTTP_OK);
        }
        
       
    }
    
    public function check_user_post(){
        $u_id = $this->input->post("u_id");
        
         $con['conditions'] = array("u_id"=>$u_id);

        $data = $this->Common->get_rows("users",$con)[0];
        if($data['privilidge']=="1"){
             $this->response(['status' => TRUE, 'message' => "Request Approved","data" =>''], REST_Controller::HTTP_OK);
        }else if($data['privilidge']=="2"){
            $this->response(['status' => FALSE, 'message' => "Admin has rejected your application please contact admin for approval","data" =>''], REST_Controller::HTTP_OK);
        }else{
            $this->response(['status' => FALSE, 'message' => "Admin has not approved your request.Please wait","data" =>''], REST_Controller::HTTP_OK);
        }
        
       
    }
    
    public function check_user_privilidge_post(){
        $u_id = $this->input->post("u_id");
      
        
        $query = $this->db->query("select * from users where u_id='$u_id'");
        if($query->num_rows($query) > 0){
            $fetch_row = $query->result_array()[0];
            if($fetch_row['privilidge']=="0"){
                $this->response(['status' => "PENDING", 'message' => "Admin has not approved your request.Please wait","data" =>''], REST_Controller::HTTP_OK);
            }else if($fetch_row['privilidge']=="1"){
                
                $hktime = $this->db->query("select * from ask_for_login where u_id='$u_id' order by date desc limit 1")->result_array()[0]['date'];
                $newtime = date("Y-m-d H:i:s", strtotime( date( "Y-m-d H:i:s", strtotime( date("$hktime") ) ) . "+2 minutes" ) );
                $curentime = date("Y-m-d H:i:s");
                
                if($curentime <= $newtime){
                    $this->response(['status' => "LOGIN", 'message' => "Login krdo yar ab kisi ko to","data" =>''], REST_Controller::HTTP_OK);
                }else{
                    $this->response(['status' => "APPROVED", 'message' => "your application is approved please wait for the admin request to login","data" =>''], REST_Controller::HTTP_OK);
                }
                
               
            }else if($fetch_row['privilidge']=="2"){
                $this->response(['status' => "REJECTED", 'message' => "Admin has rejected your application","data" =>''], REST_Controller::HTTP_OK);
            }
        }else{
            $this->response(['status' => "DELETE", 'message' => "Redirect to sign Up screen","data" =>''], REST_Controller::HTTP_OK);
        }

       
        
       
    }
    
    
    public function Getallvideo_post() {

        $userid = $this->input->post("u_id");
        $data = new stdClass();

      
		    
		    $con['conditions']=array();   
		    $record = $this->Common->get_rows("videos",$con);
		    
		            
            if($record){
                 $this->response(["status" => TRUE, 'message' => "My videos",'data'=>$record], REST_Controller::HTTP_OK);
            }else{
                $this->response(["status" => False, 'message' => "Some error occured",'data'=>$data], REST_Controller::HTTP_OK);
            }
            


    }
    
    public function SignupByMobile_post(){
        $username = $this->input->post("username");
        $email = $this->input->post("email");
        $password = $this->input->post("password");
        $mobile_no = $this->input->post("Mobile_no");
         $data = new stdClass();
        
        $data="";
        
        if(!empty($username) && (!empty($mobile_no)) && (!empty($password))){

            $con['conditions']=array("phone_no"=>$mobile_no,);
            $query = $this->Common->count_record("users",$con);
            
            if($query>0){
               
                 $this->response(['status' => FALSE, 'message' => 'Phone no already exists,Plz login','data' =>$data], REST_Controller::HTTP_OK);

            }else{

                 $array = array("username"=>$username,
                                "password"=>sha1($password),
                                "email"=>$email,
                                "phone_no"=>$mobile_no,
                                "joining_date"=>date("Y-m-d"),
                                "user_status"=>"0",
                              );

                $insert_id = $this->Common->insert("users",$array);

                if($insert_id){
                            
		                        
                    $con['conditions']=array("u_id"=> $insert_id);
                   
                    $user = $this->Common->get_rows("users",$con)[0];
                    $this->response(['status' => TRUE, 'message' => "Record inserted successfully","data" =>$user], REST_Controller::HTTP_OK);
                }
            }
            
        }else{
            
             $this->response(['status' => FALSE, 'message' => "Please Enter Phone no and password",'data' => $data], REST_Controller::HTTP_OK);
        }

    }
    
    public function update_lyrics_post(){
        $id = $this->input->post("videoid");
        $lyrics = $this->input->post("lyrics");
        
        if(!empty($id)){
            $con['conditions']=array("id"=>$id);
            
            $this->Common->update("videos",array("lyrics"=>$lyrics),$con);
            $this->response(['status' => True, 'message' => "Record Inserted",'data' =>''], REST_Controller::HTTP_OK);
        }else{
            $this->response(['status' => FALSE, 'message' => "Some Record is missing",'data' =>''], REST_Controller::HTTP_OK);
        }
    }
    
    public function SignUpFb_post(){
        $username = $this->input->post("username");
        $email = $this->input->post("email");
        
         $data = new stdClass();
        
        if(!empty($username) && (!empty($email))){

            $con['conditions']=array("email"=>$email,);
            $query = $this->Common->get_rows("users",$con);

            if($query){
                
                 $this->response(['status' => TRUE, 'message' => 'User detail','data' =>$query], REST_Controller::HTTP_OK);

            }else{

                 $array = array("username"=>$username,
                                "email"=>$email,
                                "joining_date"=>date("Y-m-d"),
                                "user_status"=>"0",
                              );

                $insert_id = $this->Common->insert("users",$array);

                if($insert_id){
                          
		                        
                    $con['conditions']=array("u_id"=> $insert_id);
                   
                    $user = $this->Common->get_rows("users",$con);
                    $this->response(['status' => TRUE, 'message' => "User detail","data" =>$user], REST_Controller::HTTP_OK);
                }
            }
            
        }else{
             $this->response(['status' => FALSE, 'message' => "Please Enter Phone no and password",'data' => $data], REST_Controller::HTTP_OK);
        }

    }
    
    public function SignUpGmail_post(){
        $username = $this->input->post("username");
        $email = $this->input->post("email");
         $data = new stdClass();
        
        if(!empty($username) && (!empty($email))){

            $con['conditions']=array("email"=>$email,);
            $query = $this->Common->get_rows("users",$con)[0];

            if($query){

                 $this->response(['status' => TRUE, 'message' => 'User detail','data' =>$query], REST_Controller::HTTP_OK);

            }else{

                 $array = array("username"=>$username,
                                "email"=>$email,
                                "joining_date"=>date("Y-m-d"),
                                "user_status"=>"0",
                              );

                $insert_id = $this->Common->insert("users",$array);

                if($insert_id){
                          
		                        
                    $con['conditions']=array("u_id"=> $insert_id);
                   
                    $user = $this->Common->get_rows("users",$con)[0];
                    $this->response(['status' => TRUE, 'message' => "User detail","data" =>$user], REST_Controller::HTTP_OK);
                }
            }
            
        }else{
             $this->response(['status' => FALSE, 'message' => "Please Enter Phone no and password",'data' => $data], REST_Controller::HTTP_OK);
        }

    }
    
    public function login_user_post() {
        // Get the post data
        $email = $this->input->post('email');
        $password = trim($this->input->post('password')," ");
        $data = new stdClass();
        
        // Validate the post data
        if(!empty($email) && !empty($password)){
            
            $con['conditions']=array("email"=>$email,"password"=>sha1($password));
            $user = $this->Common->get_rows("users",$con)[0];
           //echo "<pre>";var_dump( $user);
            if($user==True){

               
                $this->response([
                    'status' => TRUE,
                    'message' => 'Success',
                    'data' => $user
                ], REST_Controller::HTTP_OK);
                
            }else{


                $this->response(['status' => FALSE, 'message' => "Wrong Phone no or password.",'data' => $data], REST_Controller::HTTP_OK);
            }
        }else{
            $this->response(["status" => FALSE, 'message' => "Provide Phone no and password.",'data'=>$data], REST_Controller::HTTP_OK);
        }
    }


    public function ForgotPassword_post() {

        $email = $this->input->post("email");
         $data = new stdClass();

        if(!empty($email)){
            $random = rand(1000,9900);
            $html = "<p>Your Otp code is: $random</p>";
		    
		    $con['conditions']=array("email"=>$email);   
		    $this->Common->update("users",array("code"=>$random),$con);
		    
		     $emailsent = $this->Common->send_email($email, 'Forgot Password', $html);
		            
            if($emailsent){
                 $this->response(["status" => TRUE, 'message' => "Otp has been sent,plz check your email",'data'=>$data], REST_Controller::HTTP_OK);
            }

        }else{
             $this->response(["status" => FALSE, 'message' => "Please insert all records.",'data'=>$data], REST_Controller::HTTP_OK);
        }

    } 
    
    public function VerifyOtp_post() {

        $email = $this->input->post("email");
        $otp = $this->input->post("otp");
        $data = new stdClass();

        if(!empty($email) && !empty($otp)){
           
		    
		    $con['conditions']=array("email"=>$email,"code"=>$otp);   
		    $record = $this->Common->count_record("users",$con);
		    
		            
            if($record){
                 $this->response(["status" => TRUE, 'message' => "OTP verified",'data'=>$data], REST_Controller::HTTP_OK);
            }else{
                $this->response(["status" => False, 'message' => "OTP Couldn't verified",'data'=>$data], REST_Controller::HTTP_OK);
            }
            

        }else{
             $this->response(["status" => FALSE, 'message' => "Something is missing.",'data'=>$data], REST_Controller::HTTP_OK);
        }

    } 
    
    public function ResetPassword_post() {

        $email = $this->input->post("email");
        $password = $this->input->post("password");
         $data = new stdClass();

        if(!empty($email) && !empty($password)){
           
		    
		    $con['conditions']=array("email"=>$email);   
		    $record = $this->Common->update("users",array("password"=>sha1($password)),$con);
		    
		            
            if($record){
                 $this->response(["status" => TRUE, 'message' => "Password Changed",'data'=>$data], REST_Controller::HTTP_OK);
            }else{
                $this->response(["status" => False, 'message' => "Password Couldnt change",'data'=>$data], REST_Controller::HTTP_OK);
            }
            

        }else{
             $this->response(["status" => FALSE, 'message' => "Something is missing.",'data'=>$data], REST_Controller::HTTP_OK);
        }

    }
    

    public function HeaderSearch_post(){

        $con['conditions']=array();
        $array[] = array("id"=>"1","name"=>"Search 1");
        $array[] = array("id"=>"2","name"=>"Search 2");
         $data = new stdClass();
        
        if($array){
            $this->response(["status" => TRUE, 'message' => "Search Result.",'data'=>$array], REST_Controller::HTTP_OK);
        }else{
             $this->response(["status" => FALSE, 'message' => "No Data found.",'data'=>$data], REST_Controller::HTTP_OK);
        }

    }


    
    
    
    
   
    
}
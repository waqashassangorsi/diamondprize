
<?php include('front_head.php'); ?>

   
<style>
       
    .dropdown .dropbtn {
      font-size: 16px;  
      border: none;
      outline: none;
      color: white;
      padding: 8px 8px;
      background-color: inherit;
      font-family: inherit;
      margin: 0;
    }
    
    
    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }
    
    .dropdown-content a {
      float: none;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      text-align: left;
    }
    
    .dropdown-content a:hover {
      background-color: #ddd;
    }
    
    .dropdown:hover .dropdown-content {
      display: block;
       color:#fff;
      
    }
    #sticker {
      background-color: #0f1c28;
    }
    
    .sticky {
      position: fixed;
      top: 0;
      width: 100%;
    }
    
    .sticky + .content {
      padding-top: 60px;
    }
    .dropdown-content
    {
        background-color: #0f1c28;
        color:#fff;
    }
    .mobile_menu li{
        padding: 10px;
    }
    .mobile_menu a{
        color: #fff;
    
    }
    .mobile_icon{
        padding-left: 100px;
    }
    .navbar-expand-sm .navbar-nav .nav-link{
        font-size: 15px;
    }
    .search_slide_btn:hover{
        background: transparent;
    }
    .mobile_searchcont{
        padding-top: 35px;
    }
    @media screen and (min-width: 340px) and (max-width: 700px){
        .mobile_icon{
            padding-left: 0px!important;
            padding-top: 10px;
        }
        .logo img {
            width: 91px;
        }
        .mobile_searchcont{
            padding-top: 24px!important;
        }
        .fa-times {
            font-size: 17px;
            margin-right: 30px;
            margin-top: 21px;
        }
        .cart_dropdownn{
            margin-right: 0;
        }
        .fa-search{
            font-size: 16px;
        }
        .mobile_searchcont form{
            width: 89%;
            margin: auto;
        }
        .breadcrumb{
            padding: 114px 0px 27px;
        }
        .carticon_dro{
            padding-top: 30px!important;
            padding-right: 0;
            padding-left: 18px!important;
        }
        .mobile_menu{
            overflow: scroll!important;
            height: 455px!important;
        }
        /*.cart_count{*/
        /*    top: -37px;*/
        /*    left: 16px;*/
        /*}*/
    }

    .carticon_dro{
        padding-top: 33px;
        padding-left:0;
    }
    .profile_icon{
        color:#fff;
        font-size: 21px;
    }
    .profile_icon:hover{
        color: #b49449 ;
    }
    .join_button{
        margin-top:0!important;
    }
    .login_btnss{
        margin-top: 24px!important;
    }
    .active{
        color: #b49449;
    }
    .cart_drop{
        width: 80px;
        height: 72px;
    }
    .{
        width: 300px;
        left: -72px;
    }
    .cart_btndrop{
        background: #b49449;
        color: #fff;
        padding: 10px 15px;
        border-radius: 20px;
    }
    .cart_btndrop:hover{
        background: #b49449;
        color: #fff;
    }
    .dropdown-toggle::after{
        content: "";
    }
    .cart_dropdownn_menu{
        width: 300px;
        padding:10px;
        left: -43px!important;
        top:22px!important;
        transform: translate3d(-194px, 30px, 0px);
    }
    #dropdownMenuButton{
        cursor: pointer;
    }
   </style>
   <?php 
        if($this->session->userdata['Enduser'] == false){ 
            ?>
            <style>
                .header_icon {
                    position: absolute;
                    left: 68px;
                }
            </style>
    <?php } ?>
<header>
    <div id="sticker" class="main_header">
        <div class="container">
            <div class="row">
                <!-- logo start -->
                <div class="col-md-2 col-sm-3 col-8">
                    <div class="logo">
                        <!-- Brand -->
                        <?php $query=$this->db->query("select * from general where status = 'logo'")->result_array()[0]; ?>
                        <a class="navbar-brand " href="<?php echo base_url().'Home' ?>">
                            <img src="<?php echo base_url($query['image']) ?>" alt="image Error">
                        </a>
                    </div>
                    <!-- logo end -->
                </div>
                <div class="col-md-8 col-sm-7 d-none d-sm-block">
                    <?php 
                        $uri = $_SERVER['REQUEST_URI'];  
                        
                        
                    ?>
                    <!-- mainmenu start -->
                    <nav class="navbar navbar-expand-sm" style="padding-left: 135px;">
                        <!-- Links -->
                        <ul class="navbar-nav mainmenu_header pt-4">
                            <li class="nav-item ">
                                <a class=" nav-link <?php if($this->uri->segment("1")=="Home"){ echo "active";} ?>" href="<?php echo base_url().'Home' ?>">Home</a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link <?php if($this->uri->segment("1")=="Competitons"){ echo "active";} ?>" href="<?php echo base_url().'Competitons' ?>">Live Competitions</a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link <?php if($this->uri->segment("1")=="Club"){ echo "active";} ?>" href="<?php echo base_url().'Club' ?>">300 Club</a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link <?php if($this->uri->segment("1")=="Winner"){ echo "active";} ?>" href="<?php echo base_url().'Winner' ?>">Winners</a>
                            </li>
                            <li class="nav-item">
                                <a class=" nav-link <?php if($this->uri->segment("1")=="Result"){ echo "active";} ?>" href="<?php echo base_url().'Result' ?>">Results</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php if($this->uri->segment("1")=="Blog"){ echo "active";} ?>" href="<?php echo base_url().'Blog' ?>">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php if($this->uri->segment("1")=="Faq"){ echo "active";} ?>" href="<?php echo base_url().'Faq' ?>">FAQS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php if($this->uri->segment("1")=="About"){ echo "active";} ?>" href="<?php echo base_url().'About' ?>">About</a>
                            </li>
                        </ul>
                        </nav>
                    <!-- mainmenu end -->
                </div>
                <?php 
                    if($this->session->userdata['Enduser']){ 
                        $email = $this->db->query("select * from users where u_id='".$this->session->userdata('Enduser')."'")->result_array()[0]['email'];
                        
                        $invoicesentquery = $this->db->query("select * from master where u_id='".$this->session->userdata('Enduser')."' and invoice_sent='No' and is_paid='Yes'")->result_array();
                        
                        foreach($invoicesentquery as $key=>$value){
                            $data['masterid'] = $value['master_id'];
                            $html = $this->load->view("Invoicenew.php",$data,true);
                            $emailsent = $this->Common->send_email($email, 'Diamond Prize', $html);
                            if($emailsent){
                                $this->db->query("update master set invoice_sent='Yes' where master_id='".$value['master_id']."'");
                            }
                        }
                        
                        
                        
                        
                ?>
                    <div class="col-sm-2 col-md-2 col-2 carticon_dro" style="">
                        <ul class="d-flex">
                            <li class="mr-3 d-none d-sm-block"style="padding-top:7px;"><a href="<?php echo base_url('Myaccount'); ?>" class="profile_icon"><i class="fa fa-user-o  " style="" aria-hidden="true"></i></a></li>
                            <li class="dropdown mr-2 cart_dropdownn">
                                <i class="fa fa-shopping-cart dropdown-toggle pt-2 text-white" id="dropdownMenuButton" style="font-size: 22px;" data-toggle="dropdown"></i>
                                <?php 
                                    if(count($this->cart->contents())>0){
                                        
                                ?>
                                <span class="cart_count"><?php echo count($this->cart->contents());?></span>
                                <?php }else{ 
                                $this->db->query("delete from carts where u_id='".$this->session->userdata('Enduser')."'");
                                }?>
                                <div class="dropdown-menu bg-dark cart_dropdownn_menu" aria-labelledby="dropdownMenuButton">
                                    <?php 
                                        foreach($this->cart->contents() as $key=>$value){
                                    ?>
                                    <ul class="d-flex">
                                        <li>
                                            <img src="<?php echo $value['image'];?>" class="cart_drop"/>
                                        </li>
                                        <li class="pl-2 pr-2">
                                            <a href="#" class="text-white text-decoration-none"><?php echo $value['name'];?></a>
                                            <h5 class="text-white pt-3"><?php echo $value['qty'];?> x 
                                                <?php
                                                if($this->session->userdata("location")==1){
                                                    $priceeuro = $this->db->query("select * from lottery where lottery_id='".$value['id']."'")->result_array()[0]['priceeuro'];
                                                    $totalcartprice +=$priceeuro*$value['qty'];
                                                ?>
                                                €<?php echo $priceeuro;?>
                                               <?php
                                               }else{
                                                   $totalcartprice +=$value['subtotal'];
                                               ?>
                                               £<?php echo $this->cart->format_number($value['subtotal']);?>
                                              <?php
                                              }
                                              ?>
                                       </h5>
            
                                             
                                             
                                             
                                             
                                        </li>
                                    </ul>
                                    <?php } ?>
                                    <?php 
                                        if(count($this->cart->contents())){
                                            
                                    ?>
                                    <ul class="d-flex mb-3 mt-1">
                                        <li><p class="text-white">Subtotal:</p></li>
                                        <li class="ml-5" style="margin-left: 5rem!important;"><p class="text-white ml-5"> 
                                        
                                        <?php 
                                        if($this->session->userdata("location")==1){
                                        ?>
                                        €<?php echo number_format($totalcartprice,2); ?>
                                       <?php
                                       }else{
                                       ?>
                                       £<?php echo ($this->cart->format_number($this->cart->total())); ?>
                                      <?php
                                       }
                                      ?> </p></li>
                                        
                                                                        
                                    </ul>
                                    <ul class="d-flex">
                                        <li class="ml-5"><a href="<?php echo SURL.'Cart';?>" class="btn cart_btndrop ">View Cart</a></li>
                                         <li><a href="<?php echo SURL.'Checkout';?>" class="btn cart_btndrop ml-3">Checkout</a></li>
                                    </ul>
                                    <?php } ?>
                                </div>
                            </li>
                            <li class="d-none d-sm-block"><a href="<?php echo base_url().'Logout' ?>" class="btn join_button btn-fill-out" >Logout</a></li>
                            
                        </ul>
                        
                    </div>
                   
                <?php }else{ ?>
                    <div class="col-sm-2 col-md-1 d-none d-sm-block" style="padding-top: 10px;">
                        <a href="<?php echo base_url().'Loginuser' ?>" class="btn join_button login_btnss btn-fill-out" >Login</a>
                    </div>
                <?php } ?>
                <div class="col-sm-2 col-md-1 col-3 mobile_searchcont d-none" >
                    <a href="javascript:void(0);" class="nav-link search_trigger d-inline text-white pt-2 d-none d-sm-block" style="font-size: 23px; display:inline-block;"><i class="fa fa-search"></i></a>
                        <div class="search_wrap">
                            <span class="close-search"><i class="fa fa-times"></i></span>
                            <form>
                                <input type="text" placeholder="Search" class="form-control" id="search_input">
                                <button type="submit" class="search_icon search_slide_btn"><i class="fa fa-search "></i></button>
                            </form>
                        </div>
                </div>
                <div class="col-sm-2 col-md-2 col-2 text-right d-block d-sm-none mobile_icon">
                 <a class="fa fa-bars header_icon fa-2x text-white pt-4 text-decoration-none" href="#mobilemenu_collapse"  aria-hidden="true" data-toggle="collapse" data-target="#mobilemenu_collapse"></a>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div id="mobilemenu_collapse" class="collapse">
                        <div class="mobile_menu">
                            <ul>
                                <li><a href="<?php echo base_url() ?>Home">Home</a></li>
                                <li><a href="<?php echo base_url().'Competitons' ?>">Live Competitions</a></li>
                                <li><a href="<?php echo base_url().'Club' ?>">300 Club</a></li>
                                <li><a href="<?php echo base_url().'Winner' ?>">Winners</a></li>
                                <li><a href="<?php echo base_url().'Result' ?>">Results</a></li>
                                <li><a href="<?php echo base_url().'Blog' ?>">Blog</a></li>
                                <li><a href="<?php echo base_url().'Faq' ?>">FAQS</a></li>
                                <li><a href="<?php echo base_url().'About' ?>">About</a></li>
                                <li><a href="<?php echo base_url().'Contact' ?>">Contact</a></li>
                                <?php if($this->session->userdata['Enduser']){ ?>
                                <li><a href="<?php echo base_url().'Myaccount' ?>">My Account</a></li>
                                <li><a href="<?php echo base_url().'Logout' ?>">Logout</a></li>
                                <?php }else{ ?>
                                <li><a href="<?php echo base_url().'Loginuser' ?>">Login</a></li>
                                <?php } ?>
                            <!--    <li><a href="javascript:void(0);" class="nav-link search_trigger d-inline text-white pt-2" style="font-size: 23px; display:inline-block;"><i class="fa fa-search"></i></a></li> -->
                            </ul>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>
<?php include("modalboxalert.php");?>

<script>
    window.onscroll = function() {myFunction()};
    
    var navbar = document.getElementById("sticker");
    var sticky = navbar.offsetTop;
    
    function myFunction() {
      if (window.pageYOffset >= sticky) {
        navbar.classList.add("sticky")
      } else {
        navbar.classList.remove("sticky");
      }
    }
    
    
</script>





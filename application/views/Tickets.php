<?php include('includes/front_header.php'); ?>
<!--<script src="<?php echo base_url('assets/js/zommimage/jquery-1.12.4.min.js') ?>"></script>-->
<!--<script src="<?php echo base_url('assets/js/zommimage/magnific-popup.min.js') ?>"></script>-->
<!--<script src="<?php echo base_url('assets/js/zommimage/jquery.elevatezoom.js') ?>"></script>-->
<!--<script src="<?php echo base_url('assets/js/zommimage/scripts.js') ?>"></script>-->



<!--<link rel="stylesheet" href="assets_front/css/animate.css">	-->

<!--<link rel="stylesheet" href="assets_front/css/all.min.css">-->
<!--<link rel="stylesheet" href="assets_front/css/ionicons.min.css">-->
<!--<link rel="stylesheet" href="assets_front/css/themify-icons.css">-->
<!--<link rel="stylesheet" href="assets_front/css/linearicons.css">-->
<!--<link rel="stylesheet" href="assets_front/css/flaticon.css">-->
<!--<link rel="stylesheet" href="assets_front/css/simple-line-icons.css">-->
<!--- owl carousel CSS-->
<!--<link rel="stylesheet" href="assets_front/owlcarousel/css/owl.carousel.min.css">-->
<!--<link rel="stylesheet" href="assets_front/owlcarousel/css/owl.theme.css">-->
<!--<link rel="stylesheet" href="assets_front/owlcarousel/css/owl.theme.default.min.css">-->
<!-- Magnific Popup CSS -->
<!--<link rel="stylesheet" href="assets_front/css/magnific-popup.css">-->
<!-- Slick CSS -->
<!--<link rel="stylesheet" href="assets_front/css/slick.css">-->
<!--<link rel="stylesheet" href="assets_front/css/slick-theme.css">-->
<!-- Style CSS -->
<!--<link rel="stylesheet" href="assets_front/css/style.css">-->
<!--<link rel="stylesheet" href="assets_front/css/responsive.css">-->





<style>
    @font-face{
    	font-family: poppins;
    	src: url("assets/font/glyphicons-halflings-regular.ttf");
    }
    .button_select{
        width: 60px;
        height: 60px;
        background-color: rgb(51, 51, 51);
        cursor: default!important;
        border-color: 1px solid rgb(203, 47, 45);
        border-radius: 1px!important;
        margin: 1px;
        float: left;
        font-size: inherit;
        text-decoration:none;
        
   }
   
   .button_select:hover{
        text-decoration:none;
        cursor: pointer!important;
   }
   
   .button_sold{
        width: 60px;
        height: 60px;
        background-color: rgb(203, 47, 45);
        cursor: default!important;
        border-color: 1px solid rgb(203, 47, 45);
        border-radius: 1px!important;
        margin: 1px;
        float: left;
        font-size: inherit;
        text-decoration:none;
   }
   .button_sold:hover{
        text-decoration:none;
   }
   
   .button_unselect{
        width: 60px;
        height: 60px;
        background-color: rgb(42, 42, 42)!important;
        cursor: default!important;
        border-color: 1px solid rgb(203, 47, 45);
        border-radius: 1px!important;
        margin: 1px;
        float: left;
        font-size: inherit;
   }
   .selectbtn_div{
        padding-top: 15px;
        font-size: 15px;
        line-height: 17px;
        /*width: 28px;*/
        /*margin-left: -5px;*/
   }
   .selectbtn_div span{
       font-size: 11px;
   }
   .unselectbtn_div{
        padding-top:20px;
        /*width: 28px;*/
        /*margin-left: -5px;*/
   }
   .tab_menu{
       padding: .5rem 1rem;
       background: #eee;
       text-decoration: none!important;
       color: #111;
       margin-left: 1px;
       border-top-left-radius: 5px;
       border-top-right-radius: 5px;
   }
   .tabmenu_li{
       margin-bottom: 3px;
   }
   .answer_1{
        width: 150px;
        height: 150px;
        margin: 10px;
        border-radius: 50%;
        background: #fff;
        display: inline-block;
        box-shadow: 0 0 10px -3px gray;
        padding: 62px 57px; 
        cursor: pointer!important;
        text-align: center;
        text-decoration: none!important;
   }
   .answer_1:hover{
       background: #b49449 ;
       color: #fff;
   }
   .btn-line-fill{
       border: none;
   }
  
 
 .pr_detail .product_price {
    float: left;
}
.product_price {
    margin-bottom: 10px;
    margin-top: -4px;
    
}
.pr_detail .price {
    font-size: 17px;
    font-weight: normal;
}
.price {
    color: #ec2227;
    font-weight: 600;
}
.pr_detail .rating_wrap {
    float: right;
    margin-top: 7px;
}
.rating_wrap .rating {
    overflow: hidden;
    position: relative;
    height: 20px;
    font-size: 12px;
    width: 70px;
    font-family: "Font Awesome 5 Free";
    display: inline-block;
    vertical-align: middle;
}
.product_rate {
    overflow: hidden;
    float: left;
    top: 0;
    left: 0;
    position: absolute;
    padding-top: 1.5em;
    color: #F6BC3E;
}

.rating_num {
    font-size: 14px;
    margin-left: 5px;
    vertical-align: middle;
    display: inline-block;
}
.pr_detail .pr_desc {
    display: inline-block;
}
.pr_detail .pr_desc p {
    margin-bottom: 15px;
}
.product_sort_info {
    margin-bottom: 15px;
}
.cart_extra {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
}
.cart-product-quantity {
    margin: 7px 10px 7px 0;
    display: table;
}
.quantity {
    display: table;
}
.quantity .minus {
    padding-left: 4px;
}
.quantity .minus {
    background-color: #eee;
    display: block;
    float: left;
    border-radius: 50px;
    cursor: pointer;
    border: 0;
    padding: 0;
    width: 34px;
    height: 34px;
    line-height: 36px;
    text-align: center;
    font-size: 20px;
    margin: 4px;
}
.quantity .qty {
    float: left;
    width: 55px;
    height: 36px;
    border: 1px solid #ddd;
    background-color: transparent;
    text-align: center;
    padding: 0;
    margin: 3px;
}
.quantity .plus {
    background-color: #eee;
    display: block;
    float: left;
    border-radius: 50px;
    cursor: pointer;
    border: 0;
    padding: 0;
    width: 34px;
    height: 34px;
    line-height: 36px;
    text-align: center;
    font-size: 20px;
    margin: 4px;
}
.btn-fill-out {
    background-color: transparent;
    border: 1px solid #b49449;
    color: #fff;
    position: relative;
    overflow: hidden;
    z-index: 1;
}
.btn-fill-out::before {
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    background-color: #b49449;
    z-index: -1;
    transition: all 0.3s ease-in-out;
    width: 51%;
}
.btn i {
    font-size: 16px;
    margin-right: 5px;
    vertical-align: middle;
    line-height: 1;
}
.cart_btn .add_wishlist{
    font-size: 20px;
    display: inline-block;
    margin-left: 15px;
    vertical-align: middle;
}
.product_title{
    margin-bottom: 0;
}
.product_title a{
    color: #000;
    text-decoration: none;
}
.product_title a:hover{
    color: #b49449;
}
.btn-addtocart{
    background: #b49449;
}
.progress .progress-bar {
    background-color: #b49449;
}
.right_sidetickets ul li{
    padding: 10px 0;
    border: 1px solid #eee;
    padding-left: 10px;
}
.test{
    width: 70%;
}
#product_img{
    width: 300px;
    height: 300px;
}
.test b{
    font-size: 12px;
    color: #222;
}
#pr_item_gallery{
    justify-content: center;
}
.answer_titckets {
    margin: auto!important;
    width: 65%!important;
}
.select-ticket{
    
}
.area-padding{
    padding-bottom: 40px;
}
.answer_titckets ul li{
    text-align: center;
}
@media only screen and (max-width:760px){
    .answer_1 {
        width: 25%;
        height: 45px;
        margin: 10px;
        padding-top: 11px;
        padding-left: 19px;
        padding-right: 27px;
        padding-bottom: 13px;
    }
    .answe_sec{
        width: 100%;
        margin: auto;
        padding-top: 40px;
        padding-bottom: 10px;
    }
    .answer_titckets {
        margin: auto;
        width: 100%!important;
    }
    .select_ticketcont{
        margin-top: 0!important;
    }
    .test{
        width: 100%;
    }
    .product_title{
        font-size: 17px;
    }
    .pr_detail .price{
        font-size: 13px;
    }
    .right_sidetickets p{
        font-size: 12px;
    }
    .section-headline{
        padding-bottom: 0!important;
    }
}
</style>
<div class="container">
<div class="select-ticket area-padding">
    
<style>
    .tick-group{margin-left:0;}
</style>
        <div class="row mt-5">
             <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
              <div class="product-image">
                    <div class="product_img_box text-center">
                        <img id="product_img" src="<?php echo $images[0]['images']; ?>" data-zoom-image="assets/images/product_zoom_img1.jpg" alt="product_img1" />
                        <!--<a href="#" class="product_img_zoom" title="Zoom">-->
                        <!--    <span class="fa fa-search-plus" aria-hidden="true"></span>-->
                        <!--</a>-->
                    </div>
                    <div id="pr_item_gallery" class="product_gallery_item slick_slider d-flex text-center" data-slides-to-show="4" data-slides-to-scroll="1" data-infinite="false">
                        <?php foreach($images as $key=>$value){?>
                        <div class="item">
                            <a href="javascript:void(0)"  class="product_gallery_item image_galary" data-image="<?php echo $value['images'];?>" data-zoom-image="<?php echo $value['images'];?>">
                                <img src="<?php echo $value['images'];?>" class="selecimg" alt="product_small_img1" style="height:80px;width:80px;" />
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <script>
                $(document).ready(function(){
                    $('.selecimg').click(function(){
        			var	imgsrc=$(this).attr('src');
        				
        				$('#product_img').attr('src',imgsrc);
        				
        			});
                });
            </script>
            <div class="col-md-6 right_sidetickets">
                <div class="pr_detail">
                    <div class="product_description">
                        <h4 class="product_title"><?php echo $lottery['product_name']?></h4>
                        <div class="product_price">
                            <span class="price">   <?php 
                            if($this->session->userdata("location")==1){
                            ?>
                            
                            <span class="win-money">
                                €<?php echo $lottery['priceeuro']; ?>
                            </span>
                            
                            <?php
                            }else{
                            ?>
                            
                            <span class="win-money">
                                £<?php echo $lottery['price']; ?>
                            </span>
                            
                            <?php    
                            }
                            ?></span>
                        </div>
                    </div>
                </div>
                <p style="clear:both;"style="color:#737373;letter-spacing: 1px;"><?php echo $lottery['description']?></p>
                <div style="clear:both;">
                    <div style="margin-left:0;margin-top: 21px;" class="tick counter_flix mb-3" data-did-init="handleTickInit_<?php echo $lottery['lottery_id'];?>">
    					<div data-repeat="true"
    						data-layout="horizontal center fit"
    						data-transform="preset(d, h, m, s) -> delay">
    						<div class="tick-group"><div data-key="value" data-repeat="true" data-transform="pad(00) -> split -> delay">
    								<span data-view="flip"></span>
    							</div>
    							<span data-key="label" data-view="text" class="tick-label"></span>
    						</div>
    					</div>
    				</div>
                </div>
                <div class="test">
                    <ul style="display:flex;">
                        <li style="width:50%;"><b>LIVE DRAW DATE</b></li>
                        <li style="width:50%;"><b><?php echo $lottery['ending_date'];?></b></li>
                    </ul>
                    
                    <ul style="display:flex;">
                        <li style="width:50%;"><b>NUMBER OF TICKETS</b></li>
                        <li style="width:50%;"><b><?php echo $ticket['TicketA'];?></b></li>
                    </ul>
                    <?php 
                    $ticket_sold = $this->db->query("select count(*) as count from ticket_purchased where is_paid='Yes' and lottery_id='".$lottery['lottery_id']."'")->result_array()[0]['count'];
                    ?>
                    <ul style="display:flex;">
                        <li style="width:50%;"><b>TICKETS SOLD</b></li>
                        <li style="width:50%;"><b><?php echo $ticket_sold; ?></b></li>
                    </ul>
                    <?php 
                    $total_sales = $this->db->query("select count(*) as total from ticket_purchased where lottery_id='".$lottery['lottery_id']."'")->result_array()[0]['total'];
    	            $total_ticket = $this->db->query("select * from tickets where lottery_id='".$lottery['lottery_id']."'")->result_array()[0]['TicketA'];
    	            $percentage = intval($total_sales * 100/$total_ticket);
    	            
                    ?>
                    <div class="progress mt-2" style="width: 100%;">
                        <div class="progress-bar "  style="width:<?php echo $percentage;?>%;margin-top: 0!important;">
                            <?php echo $percentage;?>%
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
	function handleTickInit_<?php echo $lottery['lottery_id'];?>(tick) {
        var nextYear = "<?php echo $lottery['ending_date']; ?>";

		Tick.count.down(nextYear).onupdate = function(value) {
			tick.value = value;
			 
        };

	}
</script>

<!--Select your tickets Start   -->
<div class="container">
<div class="select-ticket select_ticketcont mt-5">
    
        <div class="row">
            <div class="col-md-12 col-sm-12 col-12">
                <div class="section-headline text-center">
                    <h3>Select your tickets</h3>
                </div>
            </div>
        </div>
        <form  method="post" action="<?php echo SURL.'Cart'?>">
            <div class="row" >
            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    <li class="active tabmenu_li"><a data-toggle="tab" href="#selecttab_A" class="tab_menu">1-<?php echo $ticket['TicketA'];?></a></li>
                    <!--<li class="tabmenu_li"><a data-toggle="tab" href="#selecttab_B" class="tab_menu">B</a></li>-->
                    <!--<li class="tabmenu_li"><a data-toggle="tab" href="#selecttab_C" class="tab_menu">C</a></li>-->
                    <!--<li class="tabmenu_li"><a data-toggle="tab" href="#selecttab_D" class="tab_menu">D</a></li>-->
                </ul>
                <div class="tab-content mt-3">
                    <div id="selecttab_A" class="selectbutton_wapar tab-pane fade in active show">
                        <?php 
                            for($i=1;$i<=$ticket['TicketA'];$i++){ 
                                $loteryid = $this->uri->segment("3");
                                $is_purchased = $this->db->query("select * from ticket_purchased where lottery_id='$loteryid' and ticket_no='$i' and is_paid='Yes'");
                                if($is_purchased->num_rows() > 0){
                        ?>
                                <a href="javascript:void(0)" class="button_sold text-center text-white tickets">
                                    <div class="selectbtn_div"><?php echo $i; ?><span class=" d-block">SOLD</span></div>
                                    
                                </a>
                        <?php
                                }else{
                        ?>
                            <a href="javascript:void(0)" class="button_select text-center text-white tickets" data-id1="<?php echo $i; ?>">
                                <input type="hidden" value="" name="tickets[]" id="myticket_<?php echo $i; ?>"/>
                                <div class="unselectbtn_div"><?php echo $i; ?></div>
                            </a>
                        <?php }} ?>
                        
                    </div>
                </div>
                <input type="hidden" value="<?php echo $this->uri->segment("3");?>" name="lottery_id"/>
            </div>
            </div>
            <?php 
            
            ?>
            <div class="select-ticket area-padding answe_sec">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-12">
                            <div class="section-headline text-center">
                                <h3>ANSWER QUESTION</h3>
                                <?php foreach($questions as $key=>$value){?>
                                <p><?php echo $value['question'];?>?</p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="answer_titckets">
                                <ul class="d-flex">
                                    <?php 
                                    $answers = $this->db->query("select * from answers where question_id='".$value['id']."'")->result_array();
                                    foreach($answers as $key=>$value){
                                    ?>
                                    <li class=" ">
                                       <a href="javascript:void(0)" data-id1="<?php echo $value['is_true'];?>" class="answer_1 btn-line-fill"><span><?php echo $value['myanswer'];?></span>
                                       </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php if($this->session->userdata("Enduser")){?>
            <div class="col-sm-12 text-center mt-3 mb-5">
                <button type="submit" disabled class="btn save_btn btn-block" style="background-color:#b49449;width:50%" name="submit" value="Submit">Add To Cart</button>
            </div>
            <?php } ?>
        </form>
    </div>
</div>

<input type="hidden" value="<?php echo $total_purchased_tickets;?>" id="ticket_purchased"/>
<input type="hidden" value="<?php echo $lottery['maximum_buy_limit'];?>" id="max_buy_limit"/>

<script>
    
    $(document).on('click','.answer_1',function(){
        var id1 = $(this).data("id1");
        
        $(".answer_1").css("background-color","white");
        $(this).css("background-color","#b49449");
        $(this).css("color","white");
        
        if(id1=="Yes"){
            $(".save_btn").attr("disabled",false);
        }else{
            $(".save_btn").attr("disabled",true);
        }
        
    });
    
    $(document).on('click','.button_select',function(){
        
        <?php if($this->session->userdata("Enduser")){?>
        var id = $(this).data("id1");
        var color = $(this).css("background-color");
        var ticket_purchased = parseInt($("#ticket_purchased").val());
        var max_buy_limit = parseInt($("#max_buy_limit").val());
        
        if(color=="rgb(51, 51, 51)"){ 
            
            if(ticket_purchased >= max_buy_limit){
                alert("You cant buy more than <?php echo $lottery['maximum_buy_limit'];?> tickets");
                return false;
            }else{
                $("#ticket_purchased").val(parseInt(ticket_purchased)+parseInt(1));
            }
        
            $(this).css("background-color","rgb(203, 47, 45)");
            $("#myticket_"+id).val(id);
            
        }else{ 
            
            $("#ticket_purchased").val(ticket_purchased-1);
            
            $(this).css("background-color","rgb(51, 51, 51)");
            $("#myticket_"+id).val("");
        }
        
        <?php }else{ ?>
        
        jQuery('#showlogin').modal('show');
    
        <?php } ?>
       
    });
    
    $(document).on('click','.answer_1',function(){
        
        <?php if($this->session->userdata("Enduser")){?>
         
         var bg_color = $(this).css("background-color");
           
             if(bg_color=="rgb(255, 255, 255)"){ 
                //  alert('test');
                // $(this).css({"background":"#000","color":"#fff"});
            }else{ 
                // alert('test 2');
                // $(this).css({"background":"#fff","color":"#000"});
                //$("#myticket_"+id).val("");
            }
         
        <?php }else{ ?>
         
            jQuery('#showlogin').modal('show');
         
         <?php } ?>
    });
</script>


<?php include('includes/front_footer.php'); ?>
<?php include('includes/front_header.php');?>

<style>
   .show_all a{
       background: #b49449;
       border: 1px solid #b49449;
       color: #fff;
   }
   .show_all a:hover{
        background: #fff;
        border: 1px solid #b49449;
        color: #b49449;
   }
	
	.stars_color
	{
	    color: #fec731;
	}
	
	@media only screen and (max-width:760px){
	    .intro-home{
	        margin-top: 89px;
	    }
	    .layer-1{
	        padding-left: 26px;
	    }
	    .ready-btn{
	        font-size: 12px;
	        padding: 2px 7px;
	    }
	    .title2{
	        font-size: 19px;
	        margin-bottom: 0;
	    }
	    .best-title {
            font-size: 13px;
            margin-bottom: 0;
	    }
	    .layer-2 p {
            font-size: 14px;
            padding-left: 26px;
	    }
	   
	    .section-headline{
	        padding-bottom: 0;
	    }
	    .area-padding {
            padding: 18px 0px;
        }
        .draw-date {
            right: -47px;
            top: 12px;
            width: 145px;
            text-align: center;
            height: 24px;
            line-height: 27px;
            font-size: 9px;
        }
        .flex_upcoming{
            box-shadow: 0 0 10px -6px gray!important;
        }
        .counter_flix2{
            width: 146px!important;
        }
        .single-testi{
            box-shadow: 0 0 10px -6px gray!important;
        }
        .single-how.first-item {
            top: 0px;
        }
        .single-how {
            margin-bottom: 30px;
        }
        .single-how.thired-item {
            top: 0;
        }
        .playtowin{
            font-size: 11px;
            width: 215px;
            font-weight: normal;
        }

	}
	@media screen and (max-width: 760px) and (min-width: 320px){
        .owl-carousel .owl-item {
            width: 365px!important;
        }
	}
	.h-number{left: 0;right: 0;}
	.how-img{margin-top:5px;}


</style>
<div class="intro-area intro-home">
    <div class="bg-wrapper">
        <img src="assets/images/cover_image2.png" alt="image Error">
    </div>
    <div class="intro-content">
        <div class="slider-content">
            <div class="container">
                <div class="row" style="margin-left: -42px;">
                    <div class="col-md-12 col-sm-12 col-12 responisve_cont">
                        <!-- layer 1 -->
                        <div class="layer-1 wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                            <p  class="best-title">Win your dreams</p>
                            <h1 class="title2">Diamond Prizes</h1>
                            <!-- layer 2 -->
                            <div class="layer-2 wow fadeInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                                
                                <h6 class="playtowin" style="color:#4d4d4d">PLAY TO WIN LUXURY PRIZES WITH DIAMOND PRIZES COMPETITIONS</h6>
                            </div>
                            <!-- layer 3 -->
                            <div class="layer-3 wow fadeInUp" data-wow-delay="0.7s" style="visibility: visible; animation-delay: 0.7s; animation-name: fadeInUp;">
                                <a href="<?php echo SURL.'Competitons';?>" class="ready-btn left-btn btn-fill-out ">Live Competitions</a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- How to Start Section -->
<div class="how-to-area bg-color area-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-12">
                <div class="section-headline text-center">
                    <h3>HOW TO START</h3>
                 <!--   <p>Help agencies to define their new business objectives and then create professional software.</p> -->
                </div>
            </div>
        </div>
        <div class="all-how">
            <div class="row">
            
                <!-- single-well end-->
                <div class="col-md-4 col-sm-4 col-12  test">
                    <div class="single-how first-item firs_card">
                        <span class="h-number">01</span>
                        <div class="how-img">
                            <a class="big-icon" href="#"><img src="assets/images/h1.png" alt="image Error"></a>
                        </div>
                        <div class="how-wel">
                            <div class="how-content">
                                <h4>REGISTER FREE OF CHARGE</h4>
                                <p>You won't be able to enter without an account so sign up with your email address and contact details. Make sure they're up to date in case you win!</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- single-well end-->
                <div class="col-md-4 col-sm-4 col-12  test">
                    <div class="single-how position-relative">
                        <span class="h-number">02</span>
                        <div class="how-img">
                            <a class="big-icon" href="#"><img src="assets/images/h2.png" alt="image Error"></a>
                        </div>
                        <div class="how-wel">
                            <div class="how-content">
                                <h4>PICK YOUR TICKETS </h4>
                                <p>You can choose from the available ticket numbers, pick your lucky number and you might win!</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- single-well end-->
                <div class="col-md-4 col-sm-4 col-12  test ">
                    <div class="single-how thired-item firs_card">
                        <span class="h-number">03</span>
                        <div class="how-img">
                            <a class="big-icon" href="#"><img src="assets/images/h3.png" alt="image Error"></a>
                        </div>
                        <div class="how-wel">
                            <div class="how-content">
                                <h4>WINNER SELECTED AT RANDOM</h4>
                                <p>Watch us draw the prize in a live draw on our Facebook page. We'll use the Google random number generator to select the winning ticket number for each competiton</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- How to start section END -->





<!-- ABOUT AREA START -->
<div class="about-area about-area-3 fix area-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-12">
                <div class="about-video ">
                    <video src="assets/video.mp4" controls style="height: 344px"></video>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-12">
                <div class="about-content">
                    <div class="section-headline" style="margin-top: 63px;" >
                        <h3>WHO ARE DIAMOND PRIZES ?</h3>
                        <p>Diamond Prizes are a new high end, innovative competitions service built with you in mind. Our aim is to provide our users with the chance to win amazing prizes. You can win some exclusive prizes from Designer Clothing, Televisions, Motorbikes, Cash, Holidays and Vouchers plus much more.
Diamond prizes, Win your dreams.</p>
                    </div>
                    <!--
                    <div class="about-company">
                        <div class="single-about">
                            <span class="about-text">Professional team</span>
                            <span class="about-text">Server secure payments</span>
                            <span class="about-text">Live hat upport</span>
                        </div>
                        <div class="single-about">
                            <span class="about-text">Goal achivment</span>
                            <span class="about-text">Worldwide services company</span>
                            <span class="about-text">Marketing expert policy</span>
                        </div>
                    </div>
                    -->
                </div>
            </div>
            </div>
    </div>
</div>

<!-- ABOUT SECTION ENDD -->

<div class="ticket-area bg-color area-padding-2">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-12">
                <div class="section-headline text-center">
                    <h3>ONGOING  COMPETITONS</h3>
                  <!--  <p>Dummy text is also used to demonstrate the appearance of different typefaces and layouts</p> -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="owl-carousel owl-theme">
                <?php 
	            foreach($lottery as $key=>$value){
	                $total_sales = $this->db->query("select count(*) as total from ticket_purchased where lottery_id='".$value['lottery_id']."'")->result_array()[0]['total'];
	                $total_ticket = $this->db->query("select * from tickets where lottery_id='".$value['lottery_id']."'")->result_array()[0]['TicketA'];
	                $percentage = intval($total_sales * 100/$total_ticket);
	                
	                $left_time = time() - strtotime($value['ending_date']);
	                
	                $product_image = $this->db->query("select * from lottery_images where lottery_id='".$value['lottery_id']."'")->result_array()[0]['images'];
	   
	       ?>


                <div class="card_1">
                    <!-- fun_text  -->
                    <div class="single-ticket" style="box-shadow: 0 0 10px -6px grey;">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $percentage; ?>%">
							<?php echo $percentage; ?>%
						</div>
                        </div>
                        <span class="win-price">Tickets Sold</span>
                        <div class="ticket-image">
                            <?php 
                            if($this->session->userdata("location")==1){
                            ?>
                            
                            <span class="win-money">
                                €<?php echo $value['priceeuro']; ?>
                                
                                <?php  //var_dump($userdata['location']); ?>
                            </span>
                            
                            <?php
                            }else{
                            ?>
                            
                            <span class="win-money">
                                £<?php echo $value['price']; ?>
                            </span>
                            
                            <?php    
                            }
                            ?>
                            
                            <img src="<?php echo $product_image; ?>" alt="image Error">
                        </div>
                        <script>
                        	function handleTickInit_<?php echo $value['lottery_id'];?>(tick) {
                                var nextYear = "<?php echo $value['ending_date']; ?>";
                        
                        		Tick.count.down(nextYear).onupdate = function(value) {
                        			tick.value = value;
                        			 
                                };
                        
                        	}
                        </script>
                        <div class="tick counter_flix mb-3 mt-2" data-did-init="handleTickInit_<?php echo $value['lottery_id'];?>">
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
                        <div class="ticket-text">
                            <h4 class="ticket-name"><?php echo $value['product_name'];?></h4>
						
    						<div class="ticket_btn2 position-absolute">
                                <a class="ticket-btn  d-block " style="padding: 0px 1px;" href="<?php echo SURL.'Tickets/index/'.$value['lottery_id'];?>">View Competition</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        
        <div class="row">
            <div class="show_all" style="margin: 10px auto;">
                <a href="<?php echo base_url('Competitons') ?>" class="btn btn-fill-out">Show More</a>
            </div>
        </div>
    </div>
</div>



        <!----------------second section-->
<?php 

 if(!empty($upcoming_events)){ 
     echo "asdfas";
?>
<div class="winner-area bg-color area-padding-2">
    <div class="container">
            <div class="row">
            <div class="col-md-12 col-sm-12 col-12">
                <div class="section-headline text-center">
                    <h3>UPCOMING EVENTS</h3>
                    <!--<p>Dummy text is also used to demonstrate the appearance of different typefaces and layouts</p> -->
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Start latest winner -->
            <?php 
               
                    
                foreach($upcoming_events as $key => $value){ 
                    $images = $this->db->query("select * from lottery_images where lottery_id='".$value['lottery_id']."'")->result_array()[0]['images'];
            ?>

<script>
	function handleTickInit_<?php echo $value['lottery_id'];?>(tick) {
        var nextYear = "<?php echo $value['start_date']; ?>";

		Tick.count.down(nextYear).onupdate = function(value) {
			tick.value = value;
			 
        };

	}
</script>

            <div class="col-md-6 col-sm-6 col-12">
                <div class="winner-results">
                    <div class="winner-inner">
                        <span class="draw-date">Coming soon</span>
                        <img class="winner-images" src="<?php echo $images; ?>" alt="image Error">
                        <div class="winner-content">
                            <h4><?php echo $value['product_name'] ?></h4>
                            <div class="tick counter_flix2 mb-3" data-did-init="handleTickInit_<?php echo $value['lottery_id'];?>">
                                <div data-repeat="true"
                                    data-layout="horizontal center fit"
                                    data-transform="preset(d, h, m, s) -> delay" >
                                    <div class="tick-group"><div data-key="value" data-repeat="true" data-transform="pad(00) -> split -> delay">
                                            <span data-view="flip"></span>
                                        </div>
                                        <span data-key="label" data-view="text" class="tick-label"></span>
                                    </div>
                                </div>
                        
                            </div>
                            <span class="jackpot">Win: £<?php echo $value['price'] ?></span>
                        </div>
                    </div>
                </div>
            </div>
           <?php } ?>
        </div>
    </div>
</div>
<?php } ?>
<!-- Lottery Results Start -->

<?php include('includes/LotteryResult.php');?>

<!-- Latest News Start -->



<!-- Clients Reviews Start -->

<!--<div class="reviews-area bg-color area-padding">-->
<!--            <div class="container">-->
<!--                <div class="row">-->
<!--					<div class="col-md-12 col-sm-12 col-12">-->
<!--						<div class="section-headline text-center">-->
<!--                            <h3>TRUST PILOT REVIEWS</h3>-->
                         <!--   <p>Help agencies to define their new business objectives and then create professional software.</p> -->
<!--						</div>-->
<!--					</div>-->
<!--                </div>-->
<!--                <div class="row">-->
<!--                    <div class="  owl-carousel owl-theme" style="text-align:center;" >-->
                        
                        
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->

<!-- Subscribe Newsletter -->

<?php include('includes/subscribe_section.php');?>

<script> 
	document.addEventListener('DOMContentLoaded', function() {
		const trustpilot_invitation = {
   			recipientEmail: 'john@gmail.com',
   			recipientName: 'John',
   			referenceId: 'Order_123',
   			source: 'InvitationScript',
  		};
  		tp('createInvitation', trustpilot_invitation);
	});
</script>


<script>
    
</script>
<!-- Counter FLip -->

<script>
// 	function handleTickInit(tick) {
//         var nextYear = (new Date()).getFullYear() + 1;
        
// 		Tick.count.down(nextYear + '-01-01').onupdate = function(value) {
// 			tick.value = value;
//         };

// 	}
	$(document).ready(function(){
      $(".owl-carousel").owlCarousel();
    });
</script>

 <?php include('includes/front_footer.php') ?>
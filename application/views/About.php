<?php include("includes/front_header.php") ?>

<style>
    .about_cont{
        margin-top: 118px;
    }
    
    .page-area {
    background: url(assets/images/bread.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center center;
}
	@media only screen and (max-width:760px){
	    
        .single-how.first-item {
            top: 0px;
        }
        .single-how {
            margin-bottom: 30px;
        }
        .single-how.thired-item {
            top: 0;
        }
        .about_cont {
            margin-top: 24px;
        }
        .section-headline{
            padding-bottom: 0;
        }

	}
    
</style>

<div class="page-area">
    <div class="breadcumb-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="breadcrumb text-center" style="text-align:center">
                    <div class="section-headline text-center" style="margin:auto">
                        <h3>ABOUT</h3>
                        <ul>
                        <a  href="<?php echo SURL.'Home';?>" style="color:#4a5f80"><li class="home-bread" style="text-align:center" id="menu_color">Home</li></a>
                        <li style="text-align:center">About</li>
                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container about_cont">
    <div class="row">
		<div class="col-md-12 col-sm-12 col-12">
			<div class="section-headline text-center">
                <h3>About Diamond Prizes</h3>
			</div>
		</div>
	</div>
	<div class="row">
	    <div class="col-md-12 text-center">
	        <div class="about_detail">
	            <p class="mt-3">
    	            Diamond Prizes is an a new high end, innovative competitions service built with you in mind. Our aim is to provide our users with the chance to win amazing prizes. We will be giving away some exclusive prizes from Designer Clothing, Televisions, Motorbikes, Cash, Holidays and Vouchers.
    	        </p>
    	        <p class="mt-3">
    	            To get involves – Simply browse our live competitions and click into one that you like the look of. Pick your lucky number then you will require your skill and knowledge to answer the multiple choice question. If you are successful then you’ll be entered into the live draw. The odds are fantastic so go ahead what have you got to lose!
    	        </p>
    	        <p class="mt-3">
    	           <a href="<?php echo base_url().'Competitons' ?>" class="btn join_button login_btnss btn-fill-out" >VIEW LIVE COMPETITION</a> 
    	        </p>
	        </div>
	    </div>
	</div>
</div>

<!--
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
                    <div class="section-headline">
                        <h3>Powerbal provides high secure system</h3>
                        <p>The phrasal sequence of the Lorem Ipsum text is now so widespread and commonplace that many DTP programmes can generate dummy text using the starting sequence "Lorem ipsum". Fortunately, the phrase 'Lorem Ipsum' is now recognized by electronic pre-press systems and, when found, an alarm can be raised.</p>
                    </div>
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
                </div>
            </div>
            </div>
    </div>
</div>
-->

<!-- How to Start Section -->
<div class="how-to-area bg-color area-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-12">
                <div class="section-headline text-center">
                    <h3>How to start</h3>
                    <p>Help agencies to define their new business objectives and then create professional software.</p>
                </div>
            </div>
        </div>
        <div class="all-how">
            <div class="row">
                <!-- single-well end-->
                <div class="col-md-4 col-sm-4 col-12  test">
                    <div class="single-how first-item">
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
                <div class="col-md-4 col-sm-4 col-12 test">
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
                <div class="col-md-4 col-sm-4 col-12 test">
                    <div class="single-how thired-item">
                        <span class="h-number">03</span>
                        <div class="how-img">
                            <a class="big-icon" href="#"><img src="assets/images/h3.png" alt="image Error"></a>
                        </div>
                        <div class="how-wel">
                            <div class="how-content">
                               <h4>WINNER SELECTED AT RANDOM</h4>
                                <p>Watch us draw the prize in a live draw on our Facebookpage. We'll use the Google random number generator to select the winning ticket number for each competiton</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Clients Reviews Start -->
<!--
<div class="reviews-area bg-color area-padding">
            <div class="container">
                <div class="row">
					<div class="col-md-12 col-sm-12 col-12">
						<div class="section-headline text-center">
                            <h3>Clients Reviews</h3>
                            <p>Help agencies to define their new business objectives and then create professional software.</p>
						</div>
					</div>
                </div>
                <div class="row">
                    <div class="owl-carousel owl-theme">
                        <div class="card_1">
                            <div class="single-testi">
                                <div class="testi-text">
                                    <div class="clients-text">
                                        <div class="testi-img ">
                                            <div class="guest-details">
                                                <h4>Graham</h4>
                                                <span class="guest-rev">Genarel customer</span>
                                            </div>
                                        </div>
                                        <div class="client-rating">
                                            <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                        </div>
                                        <p>When replacing a multi-lined selection of text, the generated dummy text maintains the amount of lines. When replacing a selection. help agencies.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card_1">
                            <div class="single-testi">
                                <div class="testi-text">
                                    <div class="clients-text">
                                        <div class="testi-img ">
                                            <div class="guest-details">
                                                <h4>Graham</h4>
                                                <span class="guest-rev">Genarel customer</span>
                                            </div>
                                        </div>
                                        <div class="client-rating">
                                            <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                        </div>
                                        <p>When replacing a multi-lined selection of text, the generated dummy text maintains the amount of lines. When replacing a selection. help agencies.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card_1">
                            <div class="single-testi">
                                <div class="testi-text">
                                    <div class="clients-text">
                                        <div class="testi-img ">
                                            <div class="guest-details">
                                                <h4>Graham</h4>
                                                <span class="guest-rev">Genarel customer</span>
                                            </div>
                                        </div>
                                        <div class="client-rating">
                                            <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                        </div>
                                        <p>When replacing a multi-lined selection of text, the generated dummy text maintains the amount of lines. When replacing a selection. help agencies.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card_1">
                            <div class="single-testi">
                                <div class="testi-text">
                                    <div class="clients-text">
                                        <div class="testi-img ">
                                            <div class="guest-details">
                                                <h4>Graham</h4>
                                                <span class="guest-rev">Genarel customer</span>
                                            </div>
                                        </div>
                                        <div class="client-rating">
                                            <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                        </div>
                                        <p>When replacing a multi-lined selection of text, the generated dummy text maintains the amount of lines. When replacing a selection. help agencies.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card_1">
                            <div class="single-testi">
                                <div class="testi-text">
                                    <div class="clients-text">
                                        <div class="testi-img ">
                                            <div class="guest-details">
                                                <h4>Graham</h4>
                                                <span class="guest-rev">Genarel customer</span>
                                            </div>
                                        </div>
                                        <div class="client-rating">
                                            <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                        </div>
                                        <p>When replacing a multi-lined selection of text, the generated dummy text maintains the amount of lines. When replacing a selection. help agencies.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card_1">
                            <div class="single-testi">
                                <div class="testi-text">
                                    <div class="clients-text">
                                        <div class="testi-img ">
                                            <div class="guest-details">
                                                <h4>Graham</h4>
                                                <span class="guest-rev">Genarel customer</span>
                                            </div>
                                        </div>
                                        <div class="client-rating">
                                            <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                        </div>
                                        <p>When replacing a multi-lined selection of text, the generated dummy text maintains the amount of lines. When replacing a selection. help agencies.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        -->
<script>
    $(document).ready(function(){
      $(".owl-carousel").owlCarousel();
    });
</script>
<?php include("includes/front_footer.php") ?>

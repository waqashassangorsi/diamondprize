<?php include("includes/front_header.php") ?>
<style>
.page-area {
    background: url(assets/images/bread.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center center;
}
</style>

<div class="page-area">
    <div class="breadcumb-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="breadcrumb text-center" style="text-align:center">
                    <div class="section-headline text-center" style="margin:auto">
                        <h3>Contact</h3>
                        <ul>
                        <li class="home-bread" style="text-align:center">Home</li>
                        <li style="text-align:center">About us</li>
                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="contact-page area-padding-2">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="contact-image">
                    <img src="assets/images/ab.jpg" alt="image Error">
                </div>
            </div>
            <!-- End contact icon -->
            <div class="col-md-6 col-sm-6 col-12">
                <div class="contact-form">
                    
                     <form id="contactForm" method="POST" action="<?php echo SURL.'Contact/sendemail';?>" class="contact-form">
                         
                    <div class="row">
                       
                            <!--
                            <div class="col-md-6 col-sm-6 col-xs-12 float-left">
                            <input type="text" id="name123" class="form-control" placeholder="Name" required ata-error="Please enter your name">
                                <div class="help-block with-errors"></div>
                            </div>
                            
                            <div class="col-md-6 col-sm-6 col-xs-12 float-left">
                                <input type="email" id="email123" class="form-control" placeholder="Email" required="" data-error="Please enter your email">
                                <div class="help-block with-errors"></div>
                            </div>
                            -->
                            <div class="col-md-6 col-sm-6 col-xs-12 ">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name" required="" data-error="Please enter your Name">
                                <div class="help-block with-errors"></div>
                            </div>
                            
                            <div class="col-md-6 col-sm-6 col-xs-12 ">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email" required="" data-error="Please enter your Email">
                                <div class="help-block with-errors"></div>
                            </div>
                            
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" name="subject" id="msg_subject" class="form-control" placeholder="Subject" required="" data-error="Please enter your message subject">
                                <div class="help-block with-errors"></div>
                            </div>
                            
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <textarea id="message" name="message" rows="7" placeholder="Message" class="form-control" required="" data-error="Write your message"></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                <button type="submit" id="submit" class="contact-btn">Submit</button>
                                <div id="msgSubmit" class="h3 text-center hidden"></div> 
                                <div class="clearfix"></div>
                            </div>   
                        
                    </div>
                    </form>  
                </div>
            </div>
            <!-- End contact Form -->
        </div>
        
        <!--
        <div class="row">
            <div class="contact-inner">
                <div class="col-md-6 col-sm-6 col-12 float-left">
                    <div class="contact-single">
                        <h3>Community club</h3>
                        <p> When replacing a selection of text within a single line, the amount of words is roughly being maintained.multi-lined selection of text</p>
                        <a class="club-btn" href="#">Join us</a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-12 float-left">
                    <div class="contact-single">
                        <h3>Members club</h3>
                        <p> When replacing a selection of text within a single line, the amount of words is roughly being maintained.multi-lined selection of text</p>
                        <a class="club-btn" href="#">Join us</a>
                    </div>
                </div>
            </div>
        </div>
        -->
        
    </div>
</div>


<?php include("includes/front_footer.php") ?>

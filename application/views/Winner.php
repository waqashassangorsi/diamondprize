<?php include("includes/front_header.php") ?>
<style>
.page-area {
    background: url(assets/images/bread.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center center;
}

.winner_span
{
    color:black !important;
}

.button_div
{
    margin-left: -17px;
}



.buttons_two
{
   padding-top: 10px;
    padding-right: 18px;
    padding-bottom: 10px;
    padding-left: 11px;
    
}

.blog-content
{
    padding: 14px;
}

@media screen and (max-width: 1194px) {
 
 
.buttons_two
{
    padding-right: 4px;
}
}

@media screen and (max-width: 988px) {
 
 
.buttons_two
{
   width: 100%;
}
}

@media screen and (max-width: 760px) {
 
 
#winner1_video
{
  margin-top: 10px;
}
}
.section-headline p{
    max-width: 100%!important;
}

.winner_image
{
    height: 299px;
}




</style>


<!-- Latest News Start -->

<div class="blog-area area-padding-2">
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-12">
                <div class="section-headline text-center">
                    <h3>Competition Winners</h3>
                    <p>See all of the winners that have gone before you and get a taste of what it is like to be a diamond prizes winner. Grab a ticket and your name could be here soon, Diamond prizes win your dreams.
</p>
                </div>
            </div>
        </div>
        
        <div class="blog-grid home-blog">
        <div class="row">
            
            <?php 
                if(!empty($winners)){
                foreach($winners as $key=>$value) { ?>
                <!-- Start single blog -->
                <div class="col-md-4 col-sm-6 col-12">
                    <div class="single-blog">
                        <div class="blog-image text-center">
                            <a class="image-scale winner_image" href="#">
                                <?php if($value['product_image'] == ''){ ?>
                                    <img src="<?php echo $value['dp'];?>" alt="image Error">
                                <?php }else{ ?>
                                    <img src="<?php echo $value['product_image'];?>" alt="image Error">
                                
                                <?php } ?>
                            </a>
                        </div>
                        
                        <div class="blog-content">
                            
                            <div class="row">
                            <div class="blog-category col-sm-6 float-left">
                                <span class="winner_span text_span">Winner</span>
                            </div>
                             <div class="blog-category col-sm-6 float-left">
                                <span class="winner_span"><?php echo $value['fname'];?></span>
                            </div>
                            </div>
                            
                            <div class="row">
                            <div class="blog-category col-sm-6 float-left">
                                <span class="winner_span text_span">Ticket Number</span>
                            </div>
                             <div class="blog-category col-sm-6 float-left">
                                <span class="winner_span"><?php echo $value['ticket_no'];?></span>
                            </div>
                            </div>
                            <!--
                            <div class="blog-meta">
                                <span class="admin-type">
                                    <i class="fa fa-user"></i>
                                    Admin
                                </span>
                                <span class="date-type">
                                    <i class="fa fa-calendar"></i>
                                    28 june, 2019
                                </span>
                                <span class="comments-type">
                                    <i class="fa fa-comment-o"></i>
                                    32
                                </span>
                            </div>
                            -->
                            <div class="blog-title">   
                                <a href="javascript:void(0)">
                                    <h4 style="font-size: 18px"><?php echo $value['product_name'];?></h4>
                                </a>
                            </div>
                            
                            <!--<div class="row mt-3 button_div">-->
                            <!--    <div class="col-sm-12 col-md-6 float-left">-->
                            <!--       <button class="btn btn-success buttons_two text-center" style="background:#b49449;text-align:center">Live Draw Video</button>-->
                            <!--    </div>-->
                            <!--    <div class="col-sm-12 col-md-6 float-left" id="winner1_video">-->
                            <!--       <button class="btn btn-success buttons_two" style="background:#b49449;;text-align:center">Winner Video</button>-->
                            <!--    </div>-->
                            <!--</div>-->
                        </div>
                        
                    </div>
                </div>
                <?php }} ?>
            </div>
        </div>
        <!-- End row -->
    </div>
</div>


<?php include("includes/front_footer.php") ?>

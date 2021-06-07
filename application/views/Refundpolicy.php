<?php include("includes/front_header.php") ?>

<style>
    .about_cont{
          margin-top: 38px;
    }
    
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
                    <div class="section-headline text-center" style="margin:auto;padding-bottom: 19px;">
                        <h3>RETURNS & REFUNDS</h3>
                        <ul>
                        <a  href="<?php echo SURL.'Home';?>" style="color:#4a5f80"><li class="home-bread" style="text-align:center" id="menu_color">Home</li></a>
                        <li style="text-align:center">Return & Refunds</li>
                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container about_cont">
    <div class="row mb-5">
	    <div class="col-md-12">
	        <div class="about_detail">
	            <p class="mt-3">
    	        Returns and Refunds Policy  Thank you for shopping at Diamond prizes. Please read this policy carefully. The Return and Refund Policy for Diamond prizes has been created with the help of TermsFeed. Digital products: We issue refunds for digital products within 45 days of the original purchase of the product.  
    	        </p>
    	        <p class="mt-3">
    	         We recommend contacting us for assistance if you experience any issues receiving or downloading our products. Contact us If you have any questions about our Returns and Refunds Policy, please contact us: By email: info@diamondprizes.com
    	        </p>
    	        
    	        
	        </div>
	    </div>
	</div>
</div>



<script>
    $(document).ready(function(){
      $(".owl-carousel").owlCarousel();
    });
</script>
<?php include("includes/front_footer.php") ?>

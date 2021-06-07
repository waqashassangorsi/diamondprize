<?php include('includes/front_header.php'); ?>
<style>
   
.page-area {
    background: url(assets/images/bread.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center center;
}
.faq_cont{
    width: 87%;
    margin: auto;
}
.question_row{
    background:#8080800d;
    padding: 12px;
}
.card .question{
    color: #000;
    text-decoration: none;
    font-weight: 600;
    display: inline-block!important;
    width: 100%;
    text-align: left;
    font-size: 15px!important;
    padding-left: 0!important;
    padding-right: 0!important;
}
.card .question i{
    float: right!important;
}
.card .question:hover{
    color: #b49449;
}
.card-body p{
    font-family: 'Poppins', sans-serif;
    font-size: 18px;
}
.btn-link::before{
    background-color: #e5dede00;
}
.faq_cont{
    width: 90%;
}

	@media only screen and (max-width:760px){
	    
        .faq_cont {
            width: 98%;
        }

	}
	.section-headline{
	    padding-bottom: 0;
	}

</style>




<div class="page-area">
    <div class="breadcumb-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcrumb text-center" style="text-align:center">
                        <div class="section-headline text-center" style="margin:auto">
                            <h3>FAQS</h3>
                            <ul>
                            <a  href="<?php echo SURL.'Home';?>"  style="color:#4a5f80"> <li class="home-bread" style="text-align:center">Home</li></a>
                            <li style="text-align:center">Faq</li>
                        </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container about_cont mt-5">
    <div class="row">
		<div class="col-md-12 col-sm-12 col-12">
			<div class="section-headline text-center">
                <h3>FAQ</h3>
			</div>
		</div>
	</div>
	<div class="row mb-3">
	    <div class="col-md-12">
	        <div class="about_detail text-center" style="padding-bottom: 14px;">
	            <p class="mt-3">
    	       You can get answers to our most frequently asked questions and then head over to our live competitions and try your luck, Diamond prizes win your dreams.

    	        
    	        </p>
	        </div>
	    </div>
	</div>
</div>

<div class="container-fluid faq_cont">
   <div class="row mb-5 mt-5">
       <div class="col-md-6">
          	<div class="col-md-12" >
                <div class="accordion" id="accordionExample">
                    <div class="card border-0">
                        <div class="card-header" id="headingOne">
                            <h6 class="mb-0">
                                <a href="#collapseOne" class="btn btn-link question" data-toggle="collapse">What happens if all tickets are not sold when the timer runs out?<i class="fa fa-plus"></i></a>									
                            </h6>
                        </div>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <p> If the competition is not full, the timer will add some time in order for all the tickets to sell on the competition. This will happen a maximum of 4 times then if the competition is still not sold out a cash alternative will be awarded instead and only the people that have entered will go into the live draw.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        	<div class="col-md-12">
                <div class="accordion" id="accordionExample">
                    <div class="card border-0">
                        <div class="card-header " id="headingOne">
                            <h6 class="mb-0">
                                <a href="#collapsetwo"  class="btn btn-link question" data-toggle="collapse" >How long will it take for my prize to be delivered?<i class="fa fa-plus"></i></a>									
                            </h6>
                        </div>
                        <div id="collapsetwo" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <p> Your prize will be hand delivered from an Diamond Prize competition team member within 14 days of the winner being announced.</p>
                            </div>
                        </div>
                    </div>
                 
                </div>
            </div>
        </div>
        <div class="col-md-6">
        	<div class="col-md-12">
                <div class="accordion" id="accordionExample">
                    <div class="card border-0">
                        <div class="card-header" id="headingOne">
                            <h6 class="mb-0">
                                <a href="#collapsethree" class="btn btn-link question" data-toggle="collapse" >How Do you draw the winner of the competition?<i class="fa fa-plus"></i></a>									
                            </h6>
                        </div>
                        <div id="collapsethree" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <p>We use our complete random number generator in order to pick our competition winner. These draws can be watched live from our facebook page</p>
                            </div>
                        </div>
                    </div>
                 
                </div>
            </div>
        	<div class="col-md-12">
                <div class="accordion" id="accordionExample">
                    <div class="card border-0">
                        <div class="card-header " id="headingOne">
                            <h6 class="mb-0">
                                <a href="#collapsefour" class="btn btn-link question" data-toggle="collapse" >Can I buy Multiple tickets for a Copetition? <i class="fa fa-plus"></i></a>									
                            </h6>
                        </div>
                        <div id="collapsefour" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <p> Our standard maximum entries per user is set to 25 for any one competition, however some competitions may be even more limited. Please check the specific competition stats to view the maximum ticket amount for that specific competition.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php include('includes/front_footer.php'); ?>

<script>
    $(document).ready(function(){
        // Add minus icon for collapse element which is open by default
        $(".collapse.show").each(function(){
        	$(this).prev(".card-header").find(".fa").addClass("fa-minus").removeClass("fa-plus");
        });
        
        // Toggle plus minus icon on show hide of collapse element
        $(".collapse").on('show.bs.collapse', function(){
        	$(this).prev(".card-header").find(".fa").removeClass("fa-plus").addClass("fa-minus");
        
        	
        }).on('hide.bs.collapse', function(){
        	$(this).prev(".card-header").find(".fa").removeClass("fa-minus").addClass("fa-plus");
        
        });
        
     
    });
</script>
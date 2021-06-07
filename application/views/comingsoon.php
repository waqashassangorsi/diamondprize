<!DOCTYPE html>
<html>
  <head>    
    <meta charset="UTF-8">
    <title>Ocean Free Coming Soon bootstrap Template</title>
    <meta name="description" content="Free Responsive HTML5 CSS3 Coming Soon Template">
    <meta name="author" content="webthemez">
    <meta name="authorUrl" content="http://webthemez.Com">
    
    <!-- Mobile Specific Meta -->   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

    <!-- Bootstrap -->
    <link href="assets/css2/bootstrap.css" rel="stylesheet">

    <!-- Custom stylesheet -->
    <link rel="stylesheet" href="assets/css2/style.css"> 
    <link rel="stylesheet" href="assets/css2/timerStyles.css">

    <!-- Font Awesome -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <!--Fav and touch icons-->
    <link rel="shortcut icon" href="assets/images2/icons/favicon.ico">
    <link rel="apple-touch-icon" href="assets/images2/icons/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/images2/icons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/images2/icons/apple-touch-icon-114x114.png">
    <style>
        .logo img{
            width: 200px;
            padding-top: 10px;
        }
        .blazer h1 {
            margin-bottom: 102px;
        }
        .blazer h2{
            color: #b49449;
        }
    </style>
  </head>
 <body>
 <div class="bg">
	 <div class="bg-color">
		  <div class="container content">
	 
				<div class="row">
					<div class="blazer clearfix">
						<div class="col-sm-12">
						   <h1 class="logo"><img src="assets/images/logo.png"></h1>
						   <h2>We're coming soon</h2>
						   <h3>Stay tuned for something Amazing</h3>        
						</div>
						 
						<div id="right-block" class="col-sm-12 text-center">
							<div class="row">
							   <div class="col-sm-offset-1 col-sm-10">
									<div class="timing">
										<div id="count-down" data-date="2020-09-05 00:00:00">
											
										</div>
									</div>
									<!-- /.timing -->
							   </div>
							</div>
							
							<?php if($this->session->flashdata("success")){?>
							<h5 class="text-danger"><?php echo $this->session->flashdata("success"); ?></h5>
							<?php } ?>
							
							<div class="row">
							  <div class="col-sm-offset-2 col-sm-8">
								<p class="alert-success"></p>
								<p class="alert-warning"></p>
								<form class="newsletter-signup" role="form" action="<?php echo base_url('Comingsoon/add');?>">
								  <div class="input-group">
									<input type="email" class="form-control" id="email" placeholder="enter your email id" required>
									<span class="input-group-btn">
									  <input type="submit" class="btn btn-default btn-sand" value="Submit">
									</span>
								  </div><!-- /input-group -->
								</form>
							  </div>
							</div>                    
							<p class="followus"></p>
							<ul class="social-icon">
								<li><a href="https://www.instagram.com/diamondprizes/"><i class="fa fa-linkedin-square"></i></a></li>
								<li><a href="https://www.facebook.com/DiamondPrizes-107618281069860/"><i class="fa fa-facebook-square"></i></a></li>
								<li><a href="https://twitter.com/DiamondPrizes"><i class="fa fa-twitter-square"></i></a></li>
								<!--<li><a href=""><i class="fa fa-youtube-square"></i></a></li>-->
							</ul> 
                               	
						</div>
		
									
						</div>
					</div>
				</div>
			</div>
			
			<!-- .container end here -->
	 </div>
 </div>
   
    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js2/bootstrap.min.js"></script>
    <script src="assets/js2/timerStyles.js"></script>
    <script src="assets/js2/jquery.ajaxchimp.min.js"></script>
    <script src="assets/js2/script.js"></script>
    <script src="assets/js2/jquery.placeholder.js"></script>
    <script type="text/javascript">
    	$(function() {
				// Invoke the plugin
				$('input, textarea').placeholder();
			});
    </script>
    <script>
      $("#count-down").TimeCircles(
       {   
           circle_bg_color: "#ffffff",
           use_background: true,
           bg_width: .2,
           fg_width: 0.013,
           time: {
                Days: { color: "#b49449" },
                Hours: { color: "#b49449" },
                Minutes: { color: "#b49449" },
                Seconds: { color: "#b49449" }
            }
       }
    );
    
    

    </script>
    
  </body>
</html>
<?php include("includes/front_header.php") ?>

<style>
.page-area {
    background: url(assets/images/bread.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center center;
}
.bouns_icon a{
    box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
    width: 100px;
    line-height: 97px;
}
.bouns_number{
    background: #F39D36;
    border: 1px solid #F39D36;
    color: #fff;
    top: -15px;
    width: 36px;
}
.bouns_content{
    text-transform: capitalize;
    max-width: 270px;
    margin: 0px auto;
}
.filter_row{
	box-shadow: 0 0 10px -3px grey;
	background: #fff;
	border-radius: 5px;
	margin: 0;
}
.section-headline{
	padding-bottom: 30px;
}

#menu_color
{
 color:#4a5f80   
}
</style>




<div class="page-area">
    <div class="breadcumb-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="breadcrumb text-center" style="text-align:center">
                    <div class="section-headline text-center" style="margin:auto">
                        <h3>Live Competitions</h3>
                        <ul>
                        <a  href="<?php echo SURL.'Home';?>" style="color:#4a5f80"><li class="home-bread" style="text-align:center" id="menu_color">Home</li></a>
                        <li style="text-align:center">Live Competitions</li>
                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="work-proses fix area-padding-2">
	<div class="container">
	  <!--
		<div class="row filter_row">
			<div class="col-md-2 col-sm-12 col-12" style="padding-top: 30px;">
				<div class="section-headline ">
                    <h4 class="">Filter</h4>
				</div>
			</div>
			<div class="col-md-3 col-12 "  style="padding-top: 20px;">
				<form>
					<select class="form-control" name="categories">
						<option value="0">Select One</option>
						<option value="1">Technology</option>
						<option value="2">Gadgets</option>
						<option value="3">Vouchers</option>
						<option value="4">Cash prizes</option>
						<option value="5">Designer fashion</option>
					</select>
					
				
			</div>
			<div class="col-md-3 col-12 second_cat" style="padding-top: 20px;">
				<select class="form-control">
					<option>Select One</option>
					<option>Men</option>
					<option>Women</option>
					<option>Children</option>
					<option>Girls</option>
					<option>Boys</option>
				</select>
			</div>
			</form>
		</div>
		-->
<div class="container about_cont">
    <div class="row">
		<div class="col-md-12 col-sm-12 col-12">
			<div class="section-headline text-center">
                <h3>Live Competitions</h3>
			</div>
		</div>
	</div>
	<div class="row mb-3">
	    <div class="col-md-12">
	        <div class="about_detail text-center" style="padding-bottom: 14px;">
	            <p class="mt-3">
    	       All of diamond prizes live competitions in one place look find on that you like and buy a ticket. Diamond prizes win your dreams.

    	        
    	        </p>
	        </div>
	    </div>
	</div>
</div>
	    <div class="row pt-2">
	        <?php 
	            foreach($lottery as $key=>$value){
	                $total_sales = $this->db->query("select count(*) as total from ticket_purchased where lottery_id='".$value['lottery_id']."'")->result_array()[0]['total'];
	                $total_ticket = $this->db->query("select * from tickets where lottery_id='".$value['lottery_id']."'")->result_array()[0]['TicketA'];
	                $percentage = intval($total_sales * 100/$total_ticket);
	                
	                $left_time = time() - strtotime($value['ending_date']);
	                
	                $product_image = $this->db->query("select * from lottery_images where lottery_id='".$value['lottery_id']."'")->result_array()[0]['images'];
	       ?>

<script>
	function handleTickInit_<?php echo $value['lottery_id'];?>(tick) {
        var nextYear = "<?php echo $value['ending_date']; ?>";

		Tick.count.down(nextYear).onupdate = function(value) {
			tick.value = value;
			 
        };

	}
</script>

			<div class="card_1 col-lg-4 col-md-6 col-12">
				<!-- fun_text  -->
				<div class="single-ticket" style="box-shadow: 0 0 10px -3px grey;">
					<div class="progress">
						<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $percentage; ?>%">
							<?php echo $percentage; ?>%
						</div>
					</div>
					<span class="win-price">TICKETS SOLD</span>
					<div class="ticket-image">
						<span class="win-money">
						   <?php 
                            if($this->session->userdata("location")==1){
                            ?>
                            
                            <span class="win-money">
                                €<?php echo $value['priceeuro']; ?>
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
						</span>
						<img src="<?php echo $product_image;?>" alt="image Error">
					</div>
					<div class="tick counter_flix mb-3" data-did-init="handleTickInit_<?php echo $value['lottery_id'];?>">
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
                            <a class="ticket-btn  d-block" style="padding: 0px 1px;" href="<?php echo SURL.'Tickets/index/'.$value['lottery_id'];?>">View Competition</a>
                        </div>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
		
		
	</div>
</div>

<script>
    $(document).ready(function(){
        $('.card_1').hover(function(){
            $('.ticket-btn').css("display", "block"); },
            
            function(){
                $('.ticket-btn').css("display", "none");
        });

		$('#design').click(function(){
			//alert('hello');
		})
    });
</script>
<!-- Counter FLip -->




<?php include("includes/front_footer.php") ?>

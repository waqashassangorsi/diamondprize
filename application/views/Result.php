<?php include("includes/front_header.php") ?>
<link rel="stylesheet" href="assets/css/flip.min.css">


<style>
  

.page-area {
    background: url(assets/images/bread.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center center;
}
.counter_flix{
    margin-left: 0!important;

}
#menu_color
{
 color:#4a5f80   
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
                        <h3>RESULTS</h3>
                        <ul>
                        <a  href="<?php echo SURL.'Home';?>"><li class="home-bread" style="text-align:center" id="menu_color">Home</li></a>
                        <li style="text-align:center">Results</li>
                    </ul>
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
                <h3>Result</h3>
			</div>
		</div>
	</div>
	<div class="row mb-3">
	    <div class="col-md-12">
	        <div class="about_detail text-center" style="padding-bottom: 14px;">
	            <p class="mt-3">
    	       Check back here after every competition is drawn and check to see of you are a diamond prizes winner, Diamond prizes win your dreams.


    	        
    	        </p>
	        </div>
	    </div>
	</div>
</div>



        <!----------------second section-->

<!--
<div class="winner-area bg-color area-padding-2" style="padding:0px">
    <div class="container-fluid" style="background-color:#fff">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-12" style="margin-top: 97px;">
                    <div class="section-headline text-center">
                        <h3>Latest Winner</h3>
                        <p>Dummy text is also used to demonstrate the appearance of different typefaces and layouts</p>
                    </div>
                </div>
            </div>
            <div class="row">
                
                <?php 
                    if(!empty($upcoming_events)){
                        
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
                            <img class="winner-images" src="<?php echo $images; ?>" alt="">
                            <div class="winner-content">
                                <h4><?php echo $value['product_name'] ?></h4>
                                <div class="tick counter_flix2 mb-3" data-did-init="handleTickInit_<?php echo $value['lottery_id'];?>">
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
                                <span class="jackpot">Win: <?php echo $value['price'] ?>$</span>
                            </div>
                        </div>
                    </div>
                </div>
               <?php }} ?>
            </div>
        </div>
    </div>
</div>
-->
<?php include('includes/LotteryResult.php');?>

<!---subscribe section------------>




<!-- Counter FLip -->

<script>
	function handleTickInit(tick) {
        var nextYear = (new Date()).getFullYear() + 1;
        
		Tick.count.down(nextYear + '-01-01').onupdate = function(value) {
			tick.value = value;
        };

	}
</script>
<script src="assets/js/flip.min.js"></script>

<?php include("includes/front_footer.php") ?>

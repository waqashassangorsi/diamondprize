
<?php 
require_once(APPPATH."views/admin/includes/header.php"); 
require_once(APPPATH."views/admin/includes/alerts.php"); 


if($user->dashboard == "1"){

?>

<div class="row">
	<div class="col-sm-3">
	
		<div class="tile-stats tile-red">
			<div class="icon"><i class="entypo-users"></i></div>
			<div class="num" data-start="0" data-end="<?php echo $totallottery;?>" data-postfix="" data-duration="1500" data-delay="0">0</div>
			
			<h3>Total Lotteries</h3>
		</div>
		
	</div>
	
	<div class="col-sm-3">
	
		<div class="tile-stats tile-green">
			<div class="icon"><i class="entypo-chart-bar"></i></div>
			<div class="num" data-start="0" data-end="<?php echo $total_users;?>" data-postfix="" data-duration="1500" data-delay="600">0</div>
			
			<h3>Total Users</h3>
		</div>
		
	</div>
	
	<div class="col-sm-3">
	
		<div class="tile-stats tile-aqua">
			<div class="icon"><i class="entypo-mail"></i></div>
			<div class="num" data-start="0" data-end="<?php echo $total_earning;?>" data-postfix="" data-duration="1500" data-delay="1200">0</div>
			
			<h3>Total Earning($)</h3>
		</div>
		
	</div>
	
	<div class="col-sm-3">
	
		<div class="tile-stats tile-blue">
			<div class="icon"><i class="entypo-rss"></i></div>
			<div class="num" data-start="0" data-end="<?php echo $Rejected;?>" data-postfix="" data-duration="1500" data-delay="1800">0</div>
			
				<h3>Total Earning this month($)</h3>
		</div>
		
	</div>

	
</div>

<br />

<div class="row hide">
	<div class="col-sm-8">
	
		<div class="panel panel-primary" id="charts_env">
		
			<div class="panel-heading">
				<div class="panel-title">Site Stats</div>
				
				<div class="panel-options">
					<ul class="nav nav-tabs">
						<li class=""><a href="#area-chart" data-toggle="tab">Area Chart</a></li>
						<li class="active"><a href="#line-chart" data-toggle="tab">Line Charts</a></li>
						<li class=""><a href="#pie-chart" data-toggle="tab">Pie Chart</a></li>
					</ul>
				</div>
			</div>
	
			<div class="panel-body">
			
				<div class="tab-content">
				
					<div class="tab-pane" id="area-chart">							
						<div id="area-chart-demo" class="morrischart" style="height: 300px"></div>
					</div>
					
					<div class="tab-pane active" id="line-chart">
						<div id="line-chart-demo" class="morrischart" style="height: 300px"></div>
					</div>
					
					<div class="tab-pane" id="pie-chart">
						<div id="donut-chart-demo" class="morrischart" style="height: 300px;"></div>
					</div>
					
				</div>
				
			</div>

			<table class="table table-bordered table-responsive">

				<thead>
					<tr>
						<th width="50%" class="col-padding-1">
							<div class="pull-left">
								<div class="h4 no-margin">Pageviews</div>
								<small>54,127</small>
							</div>
							<span class="pull-right pageviews">4,3,5,4,5,6,5</span>
							
						</th>
						<th width="50%" class="col-padding-1">
							<div class="pull-left">
								<div class="h4 no-margin">Unique Visitors</div>
								<small>25,127</small>
							</div>
							<span class="pull-right uniquevisitors">2,3,5,4,3,4,5</span>
						</th>
					</tr>
				</thead>
				
			</table>
			
		</div>	

	</div>

	<!-- <div class="col-sm-4">

		<div class="panel panel-default">
					<div class="panel-heading">
						<div class="panel-title">Bank Position</div>
						
						<div class="panel-options">
							<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
							<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
							<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
							<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
						</div>
					</div>
					<table class="table table-bordered table-responsive">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Acct #</th>
								<th>Amount</th>
							</tr>
						</thead>
						
						<tbody>
												
							<tr>
								<td>1</td>
								<td>HBL</td>
								<td>1234567</td>
								<td class="text-center"><span class="pie">Rs 1234 </span></td>
							</tr>

							<tr>
								<td>2</td>
								<td>HBL</td>
								<td>1234567</td>
								<td class="text-center"><span class="pie">Rs 1234 </span></td>
							</tr>

							<tr>
								<td>3</td>
								<td>HBL</td>
								<td>1234567</td>
								<td class="text-center"><span class="pie">Rs 1234 </span></td>
							</tr>
		
						</tbody>
					</table>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="panel-title">Stock details</div>
				
				<div class="panel-options">
					<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
					<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
					<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>
			<table class="table table-bordered table-responsive">
				<thead>
					<tr>
						<th>#</th>
						<th>Product Name</th>
						<th>Total Stock</th>
					</tr>
				</thead>
				
				<tbody>
										
					<tr>
						<td>1</td>
						<td>Product 1</td>
						<td>123</td>
					</tr>
					<tr>
						<td>1</td>
						<td>Product 1</td>
						<td>123</td>
					</tr>
					<tr>
						<td>1</td>
						<td>Product 1</td>
						<td>123</td>
					</tr>
					<tr>
						<td>1</td>
						<td>Product 1</td>
						<td>123</td>
					</tr>
					<tr>
						<td>1</td>
						<td>Product 1</td>
						<td>123</td>
					</tr>
					<tr>
						<td>1</td>
						<td>Product 1</td>
						<td>123</td>
					</tr>
					<tr>
						<td>1</td>
						<td>Product 1</td>
						<td>123</td>
					</tr>
					<tr>
						<td>1</td>
						<td>Product 1</td>
						<td>123</td>
					</tr>


				</tbody>
			</table>
		</div>

	</div> -->
</div>


<br />

<div class="row ">
	
	<div class="col-sm-4">
		
		<div class="panel panel-primary">
			<table class="table table-bordered table-responsive">
				<thead>
					<tr>
						<th class="padding-bottom-none text-center">
							<br />
							<br />
							<span class="monthly-sales"></span>
						</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="panel-heading">
							<h4>Monthly Sales</h4>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		
	</div>
	
	<!--<div class="col-sm-8">-->
		
	<!--	<div class="panel panel-primary">-->
	<!--		<div class="panel-heading">-->
	<!--			<div class="panel-title">Latest Updated Profiles</div>-->
				
	<!--			<div class="panel-options">-->
	<!--				<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>-->
	<!--				<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>-->
	<!--				<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>-->
	<!--				<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>-->
	<!--			</div>-->
	<!--		</div>-->
				
	<!--		<table class="table table-bordered table-responsive">-->
	<!--			<thead>-->
	<!--				<tr>-->
	<!--					<th>#</th>-->
	<!--					<th>Name</th>-->
	<!--					<th>Position</th>-->
	<!--					<th>Activity</th>-->
	<!--				</tr>-->
	<!--			</thead>-->
				
	<!--			<tbody>-->
	<!--				<tr>-->
	<!--					<td>1</td>-->
	<!--					<td>Art Ramadani</td>-->
	<!--					<td>CEO</td>-->
	<!--					<td class="text-center"><span class="inlinebar">4,3,5,4,5,6</span></td>-->
	<!--				</tr>-->
					
	<!--				<tr>-->
	<!--					<td>2</td>-->
	<!--					<td>Filan Fisteku</td>-->
	<!--					<td>Member</td>-->
	<!--					<td class="text-center"><span class="inlinebar-2">1,3,4,5,3,5</span></td>-->
	<!--				</tr>-->
					
	<!--				<tr>-->
	<!--					<td>3</td>-->
	<!--					<td>Arlind Nushi</td>-->
	<!--					<td>Co-founder</td>-->
	<!--					<td class="text-center"><span class="inlinebar-3">5,3,2,5,4,5</span></td>-->
	<!--				</tr>-->

	<!--			</tbody>-->
	<!--		</table>-->
	<!--	</div>-->
		
	<!--</div>-->
	
</div>


<div class="row">
	

	<div class="col-sm-9">
		
		<script type="text/javascript">
			jQuery(document).ready(function($)
			{
				var map = $("#map-2");
				
				map.vectorMap({
					map: 'europe_merc_en',
					zoomMin: '3',
					backgroundColor: '#383f47',
					focusOn: { x: 0.5, y: 0.8, scale: 3 }
				});
			});
		</script>
		
		<div class="tile-group">
			
			<div class="tile-left">
				<div class="tile-entry">
					<h3>Map</h3>
					<span>top visitors location</span>
				</div>
				<?php 
				//$city = $this->db->query("select city,count(*) as total,(select count(*) as count from visitors) as totalrecord from visitors group by city")->result_array();
				//echo "<pre>";var_dump($city);
				
				foreach($city1 as $key=>$value){
				    $prcentage = $value['total']*100/$value['totalrecord'];
				?>
				<div class="tile-entry">
					<img src="assets/images/sample-al.png" alt="" class="pull-right op" />
					
					<h4><?php echo $value['city'];?></h4>
					<span><?php echo intval($prcentage);?>%</span>
				</div>
				<?php } ?>
			</div>
			
			<div class="tile-right">
				
				<div id="map-2" class="map"></div>
				
			</div>
			
		</div>
		
	</div>

</div>


<?php
}
require_once(APPPATH."views/admin/includes/footer.php"); 

 ?>
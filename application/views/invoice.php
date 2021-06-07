<?php 
require_once(APPPATH."views/admin/includes/head.php"); 
?>


<style type="text/css">
.page-container {
    padding-left: 0px !important;
}
</style>
<body class="page-body" data-url="http://neon.dev">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->	
		
	<div class="main-content">
				

<div class="invoice">

	<div class="row">
	
		<div class="col-sm-6 invoice-left">
		
			<a href="#">
				<img src="assets/images/logo_2.png" />
			</a>
			
		</div>
		
		<div class="col-sm-6 invoice-right">
		
				<h3>INVOICE NO. #<?php //echo $record['order_no'];?></h3>
				<span><?php echo date("d M Y",strtotime($record['purchase_date']));?></span>
		</div>
		
	</div>
	
	
	<hr class="margin" />
	

	<div class="row">
	   
		<div class="col-sm-3 invoice-left">
		
			<h4>Billing Details:-</h4>
			<strong>Billing Address:</strong> <?php echo $record['billing_address'];?>
			<br />
			<strong>building:</strong> <?php echo $record['building'];?>
			<br />
			<strong>City:</strong> <?php echo $record['city'];?>
			<br />
			<strong>Zipcode:</strong> <?php echo $record['zipcode'];?>
			<br />
			<strong>phone:</strong> <?php echo $record['phone'];?>
			<br />
			<strong>Country:</strong> <?php echo $record['country'];?>
		</div>	
	</div>
	
	<div class="margin"></div>
	
	<table class="table table-bordered">
		<thead>
			<tr>
				<th class="text-center">#</th>
				<th width="60%">Product</th>
				<th>Quantity</th>
				<th>Price(€)</th>
				<th>Total Amount(€)</th>
			</tr>
		</thead>
		
		<tbody>
			<?php 
			//$this->db->query("select count(*) as count from ti");
			?>
			<tr>
				<td class="text-center">1</td>
				<td><?php echo $record['product_name'];?></td>
				<?php 
				
				?>
				<td>123</td>
				<td><?php echo $record['price'];?></td>
				<td><?php echo $record['price'];?></td>
			</tr>
			
			
		</tbody>
	</table>
	
	<div class="margin"></div>

	<div class="row">
	
		<div class="col-sm-6">
		    
		    <div class="invoice-left">
	            
 
 


				10 Petteril 
				<br />
				Rickleton
				<br>
				Washington
				<br>
				United Kingdom 
				<br />
				Ne389eq
				<br>
				P:  +447723480418
				<br />
				info@diamondprizes.com
			</div>
		
		</div>
		
		<div class="col-sm-6">
			
			<div class="invoice-right">
				
				<ul class="list-unstyled">
					<li>
						Total amount: 
						<strong>123<?php// echo ucwords($master['payable']);?> €</strong>
					</li>
					<li> 
						Total Payable:
						<strong>123123<?php echo ucwords($master['payable']);?> €</strong>
					</li>
				</ul>
				
				<br />
				
				<!--<a href="javascript:window.print();" class="btn btn-primary btn-icon icon-left hidden-print">-->
				<!--	Print Invoice-->
				<!--	<i class="entypo-doc-text"></i>-->
				<!--</a>-->
				
			</div>
			
		</div>
		
	</div>

</div><!-- Footer -->
</div>
	
	
	</div>




	<!-- Bottom Scripts -->
	<script src="admin/assets/js/gsap/main-gsap.js"></script>
	<script src="admin/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="admin/assets/js/bootstrap.js"></script>
	<script src="admin/assets/js/joinable.js"></script>
	<script src="admin/assets/js/resizeable.js"></script>
	<script src="admin/assets/js/neon-api.js"></script>
	<script src="admin/assets/js/neon-chat.js"></script>
	<script src="admin/assets/js/neon-custom.js"></script>
	<script src="admin/assets/js/neon-demo.js"></script>

</body>
</html>

<?php 
require_once(APPPATH."views/admin/includes/header.php"); 
require_once(APPPATH."views/admin/includes/alerts.php"); 
?>
<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo SURL1; ?>"><i class="entypo-home"></i>Home</a>
	</li>
	<li>			
		<a href="<?php echo $Controller_url; ?>"><?php echo $Controller_name; ?></a>
	</li>
	<li>			
		<a href="<?php echo $method_url; ?>"><?php echo $method_name; ?></a>
	</li>
	
</ol>

<div class="panel-heading">
	<div class="panel-title h4">
		<b><?php echo $Controller_name;?></b>
	</div>
				
</div>
<div class="panel-body">
	<form role="form" method="post" action="<?php echo base_url();?>admin/Lottery/insertlottery" class="form-horizontal form-groups-bordered"  enctype="multipart/form-data">

		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">Product Name</label>
			
			<div class="col-sm-5">
				<input type="text" name="name" maxlength="20" class="form-control" autofocus id="field-1" placeholder="Enter User Name" required value="<?php echo $result["product_name"]?>">
		
			</div>
		</div>
		<?php echo form_error('name'); ?>

		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">Price ($)</label>
			
			<div class="col-sm-5">
				<input type="text" name="price" class="form-control" placeholder="Enter Price" autocomplete="off" required value="<?php echo $result["price"]?>">
				<?php echo form_error('price'); ?>
			</div>

		</div>
        
        <div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">Maximum Buy Limit</label>
			
			<div class="col-sm-5">
				<input type="text" name="maximum_buy_limit" class="form-control" placeholder="Maximum Buy Limit" autocomplete="off" required value="<?php echo $result["maximum_buy_limit"]?>">
				<?php echo form_error('maximum_buy_limit'); ?>
			</div>

		</div>

		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">Starting Date</label>
			
			<div class="col-sm-5">
				<input type="date" name="startingdate" value="<?php echo $result['start_date'];?>" class="form-control" id="field-1">
				<?php echo form_error('start_date'); ?>
			</div>
		</div>
	
	
		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">End Date</label>
			
			<div class="col-sm-5">
				<input type="date" name="enddate"  class="form-control" id="field-1"  value="<?php echo $result["ending_date"]?>">
				<?php echo form_error('enddate'); ?>
			</div>
		</div>
		<?php 
	    if(!empty($result["lottery_id"])){
		?>
		<input type="hidden" value="<?php echo $result["lottery_id"]; ?>" name="edit"/>
		<?php
		}
		?>
		
	
		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">Upload Picture</label>
			
			<div class="col-sm-5">
				<input type="file" name="image1"  class="form-control">
				<?php 
			    if(!empty($result["product_image"])){
    			?>
    			<img src="<?php echo $result["product_image"]; ?>" class="img-responsive"/>
    			<?php
    			}
    			?>
			</div>
			
		</div>
	
		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-5">
				<button type="Submit" name="Submit" class="btn btn-red">Save</button>
			</div>
		</div>
	</form>

				
</div>
		

<?php
require_once(APPPATH."views/admin/includes/footer.php"); 

 ?>


<script>

$(function(){
  $("input[name='price']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));
  });
});

$(function(){
  $("input[name='maximum_buy_limit']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));
  });
});



</script>


		
			
			
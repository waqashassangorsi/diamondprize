
<?php 
require_once(APPPATH."views/admin/includes/header.php"); 
require_once(APPPATH."views/admin/includes/alerts.php"); 
?>
<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo SURL; ?>"><i class="entypo-home"></i>Home</a>
	</li>
	<li>			
		<a href="<?php echo $Controller_url; ?>"><?php echo $Controller_name; ?></a>
	</li>
	<li>			
		<a href="<?php echo $method_url; ?>"><?php echo $method_name; ?></a>
	</li>
	
</ol>

<style>

</style>
<div class="panel-heading">
	<div class="panel-title h4">
		<b><?php echo $Controller_name;?></b>
	</div>
				
</div>
<div class="panel-body">
	<form role="form" method="post" action="<?php echo base_url();?>admin/LotteryReport/lotteryrecord" class="form-horizontal form-groups-bordered" enctype="multipart/form-data">
		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">Lottery</label>
			
			<div class="col-sm-5">
				<select class="form-control select2" name="lottery" >
				 <option value='0'>All Lottery</option>   
				<?php foreach($lottery as $key=>$value){?>
					<option <?php if($record->lang_id==$value['lottery_id']){echo "selected";}?> value="<?php echo $value['lottery_id'];?>"><?php echo $value['product_name'];?></option>
				<?php } ?>
				</select>
			</div>
		</div>


		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-5">
				<button type="Submit" name="Submit" class="btn btn-red submitbtn">Save</button>
			</div>
		</div>
	</form>

				
</div>	

<?php
require_once(APPPATH."views/admin/includes/footer.php"); 

 ?>



		
			
			
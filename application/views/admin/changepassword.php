
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
	<form role="form" method="post" action="<?php echo base_url();?>admin/changepassword/insert" class="form-horizontal form-groups-bordered"  enctype="multipart/form-data">

           
		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">Current Password</label>
			
			<div class="col-sm-5">
				<input type="text" name="currentpass"  class="form-control" autofocus id="field-1" placeholder="Enter Current Password" required>
			</div>
		</div>
		<?php echo form_error('currentpass'); ?>

		
		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">New Password</label>
			
			<div class="col-sm-5">
				<input type="text" name="newpass"  class="form-control" autofocus id="field-1" placeholder="Enter New Password">
			</div>
		</div>
		<?php echo form_error('newpass'); ?>

		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">Confirm Password</label>
			
			<div class="col-sm-5">
				<input type="text" name="confirmpass" class="form-control" placeholder="Confirm Password" autocomplete="off" required>
				<?php echo form_error('confirmpass'); ?>
			</div>

		</div>
	
     	<input type="text" name="userpass" hidden value="<?php echo $record->password?>">
		<input type="text" name="userid" hidden value="<?php echo $record->u_id?>">
	
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



		
			
			
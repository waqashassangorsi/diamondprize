
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
	<form role="form" method="post" action="<?php echo base_url();?>admin/AllUsers/UpdateUser" class="form-horizontal form-groups-bordered"  enctype="multipart/form-data">

		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">User Name</label>
			<input type="hidden" name="u_id" value="<?php echo $result['u_id'] ?>" />
			<div class="col-sm-5">
				<input type="text" name="name" maxlength="20" class="form-control" autofocus id="field-1" placeholder="Enter User Name" required value="<?php echo $result["fname"]?>">
		
			</div>
		</div>
		<?php echo form_error('name'); ?>

		<style>
            .glyphicon-remove{cursor: pointer; }
        </style>	
		<div class="form-group">
		    <label for="field-1" class="col-sm-3 control-label">Profile Image</label>
			<div class="col-sm-5">
				
				<div class="fileinput fileinput-new" data-provides="fileinput">
					<div class="fileinput-new thumbnail" style="width: 100%; height: 100px;" data-trigger="fileinput">
		
						    <img src="<?php echo $result['dp']; ?>" alt="...">
						
					
					</div>
					<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px">
					    
					</div>
					<div>
						<span class="btn btn-white btn-file">
							<span class="fileinput-new">Select image</span>
							<span class="fileinput-exists">Change</span>
							<input type="file" name="profile_image" accept="image/*" value="<?php echo $result['dp']; ?>">
						</span>
						<a href="#" class="btn btn-orange fileinput-exists" style="padding: 6px 9px;" data-dismiss="fileinput">Remove</a>
					</div>
				</div>
				
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


		
			
			

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

<div class="panel-heading">
	<div class="panel-title h4">
		<b><?php echo $Controller_name;?></b>
	</div>
				
</div>
<div class="panel-body">
		<form role="form" method="post" action="" class="form-horizontal form-groups-bordered" enctype="multipart/form-data">
				
    		<div class="form-group">
    			<label for="field-1" class="col-sm-3 control-label">Name</label>
    			
    			<div class="col-sm-5">
    				<input type="text" id="myInput" readonly name="name" value="<?php echo $record['fname'];?>" class="form-control"/>	
    			</div>
    		
    
    		</div>
    		<div class="form-group">
    			<label for="field-1" class="col-sm-3 control-label">Email</label>
    			
    			<div class="col-sm-5">
    				<input type="text" readonly  value="<?php echo $record['email'];?>" class="form-control"/>	
    			</div>
    		
    
    		</div>
    		
    		<div class="form-group">
    			<label for="field-1" class="col-sm-3 control-label">Date of Joining</label>
    			
    			<div class="col-sm-5">
    				<input type="text" id="myInput1" readonly name="name" value="<?php echo $record['joining_date'];?>" class="form-control"/>
    			</div>
    
    		</div>
    		
    		<div class="form-group">
    			<label for="field-1" class="col-sm-3 control-label">Phone No</label>
    			
    			<div class="col-sm-5">
    				<input type="text" id="myInput2" readonly name="name" value="<?php echo $record['phone_no'];?>" class="form-control"/>
    			</div>
    
    		</div>
    		<div class="form-group">
    			<label for="field-1" class="col-sm-3 control-label">Street</label>
    			
    			<div class="col-sm-5">
    				<input type="text" id="myInput3" readonly name="name" value="<?php echo $record['address'];?>" class="form-control"/>
    			</div>
    
    		</div>
    		<div class="form-group">
    			<label for="field-1" class="col-sm-3 control-label">Town</label>
    			
    			<div class="col-sm-5">
    				<input type="text" id="myInput3" readonly name="name" value="<?php echo $record['town'];?>" class="form-control"/>
    			</div>
    
    		</div>
    		<div class="form-group">
    			<label for="field-1" class="col-sm-3 control-label">Country</label>
    			
    			<div class="col-sm-5">
    				<input type="text" id="myInput4" readonly name="name" value="<?php echo $record['country'];?>" class="form-control"/>
    			</div>
    
    		</div>
    		
    		<div class="form-group">
    			<label for="field-1" class="col-sm-3 control-label">Postal Code</label>
    			
    			<div class="col-sm-5">
    				<input type="text" id="myInput5" readonly name="name" value="<?php echo $record['postal_code'];?>" class="form-control"/>
    			</div>
    
    		</div>
    		
    	</form>

				
</div>

<?php
require_once(APPPATH."views/admin/includes/footer.php"); 

 ?>



		
			
			
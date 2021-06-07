
<?php //var_dump($record);exit;
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
	<form role="form" method="post" action="<?php echo base_url();?>admin/Blog/edit" class="form-horizontal form-groups-bordered"  enctype="multipart/form-data">

		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">Blog Heading</label>
			
			<div class="col-sm-5">
				<input type="text" name="blog_heading" maxlength="20" class="form-control" autofocus id="field-1" placeholder="Enter Blog Heading" value="<?php echo $record['heading']; ?>" >
			</div>
		</div>
        <div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">Blog Title</label>
			
			<div class="col-sm-5">
				<input type="text" name="blog_title" maxlength="20" class="form-control" autofocus id="field-1" placeholder="Enter Blog Title" value="<?php echo $record['title']; ?>" >
			</div>
		</div>
		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">Date</label>
			
			<div class="col-sm-5">
				<input type="date" name="blog_date" maxlength="20" class="form-control" autofocus id="field-1" placeholder="Enter Blog Date" value="<?php echo $record['date']; ?>" >
			</div>
		</div>
		
		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">Description</label>
			<div class="col-sm-5">
			<textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"><?php echo $record['description']; ?> </textarea>
			</div>
		</div>
		
		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">Upload Picture</label>
		    
		    <div class="col-sm-5">
				<div class="col-sm-12" style="clear:both;">
							
					<input type="file" class="form-control file2 inline btn btn-primary" name="files"  />
					
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


		
			
			
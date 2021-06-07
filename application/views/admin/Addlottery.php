
<?php 
require_once(APPPATH."views/admin/includes/header.php"); 
require_once(APPPATH."views/admin/includes/alerts.php"); 
?>

<style type="text/css">
     .protfolio_upload{
        width: 70px!important;
        height: 70px;
        border-radius: 138px;
        text-align: center;
        padding-top: 22px;
        font-size: 25px;
        border: none;
        color: #222!important;
        box-shadow: 0 0 5px 0px gainsboro;
        margin-left: 10px;
    }
</style>
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
			<label for="field-1" class="col-sm-3 control-label">Lottery Name</label>
			
			<div class="col-sm-5">
				<input type="text" name="lotteryname" maxlength="20" class="form-control" autofocus id="field-1" placeholder="Enter Lottery Name" required value="<?php echo ucwords($record->lottery_name); ?>">
			</div>
		</div>

		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">Product Name</label>
			
			<div class="col-sm-5">
				<input type="text" name="name" maxlength="20" class="form-control" autofocus id="field-1" placeholder="Enter Product Name" required value="<?php echo ucwords($record->product_name); ?>">
			</div>
		</div>

		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">Price(£)</label>
			
			<div class="col-sm-5">
				<input type="text" name="price" class="form-control" placeholder="Enter Price" autocomplete="off" required value="<?php echo ($record->price); ?>">
				<?php echo form_error('price'); ?>
			</div>

		</div>
		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">Price(€)</label>
			
			<div class="col-sm-5">
				<input type="text" name="priceineuro" class="form-control" placeholder="Enter Price in Euro" autocomplete="off" required value="<?php echo ($record->priceeuro); ?>">
				<?php echo form_error('priceeuro'); ?>
			</div>

		</div>
		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">Maximum Ticket Buy Limit</label>
			
			<div class="col-sm-5">
				<input type="text" name="maximum_buy_limit" class="form-control" placeholder="Maximum Buy Limit" autocomplete="off" required value="<?php echo ($record->maximum_buy_limit); ?>">
				<?php echo form_error('maximum_buy_limit'); ?>
			</div>

		</div>
        <?php 
        if(!empty($record->lottery_id)){
        ?>
        <input type="hidden" value="<?php echo $record->lottery_id;?>" name="edit"/>
        <?php } ?>
		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">Starting Date</label>
			
			<div class="col-sm-5">
				<input type="date" name="startingdate"  class="form-control" id="field-1" value="<?php if(!empty($record->start_date)){ echo $record->start_date; }else{ echo date("Y-m-d");} ?>">
			</div>
		</div>
	
	
		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">End Date</label>
			
			<div class="col-sm-5">
				<input type="date" name="enddate"  class="form-control" id="field-1"  value="<?php if(!empty($record->ending_date)){ echo $record->ending_date; }else{ echo date("Y-m-d");} ?>">
			</div>
		</div>
		
		
		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">Description</label>
			<div class="col-sm-5">
			<textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"> <?php echo ($record->description); ?></textarea>
			</div>
		</div>
		

		
		
<style>
    .glyphicon-remove{cursor: pointer; }
</style>	
		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">Upload Picture</label>
		    
		    <div class="col-sm-5">
		         <?php 
		            if(!empty($images)){
		                foreach($images as $key=>$value){
		         ?>
				<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;float:left;" data-trigger="fileinput">
					<img src="<?php echo $value['images'];?>" alt="...">
					<span class="glyphicon glyphicon-remove" data-id1="<?php echo $value['id'];?>" style="position:absolute;"></span>
				</div>
				<?php }} ?>
				<div class="col-sm-12" style="clear:both;">
							
					<input type="file" class="form-control file2 inline btn btn-primary" name="files[]" multiple="1" data-label="<i class='glyphicon glyphicon-circle-arrow-up'></i> &nbsp;Browse Files" />
					
				</div>
			</div>
			
		       
				
				<!--<div class="fileinput fileinput-new" data-provides="fileinput">-->
				<!--	<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;" data-trigger="fileinput">-->
				<!--		<img src="http://placehold.it/200x150" alt="...">-->
				<!--	</div>-->
				<!--	<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>-->
				<!--	<div>-->
				<!--		<span class="btn btn-white btn-file">-->
				<!--			<span class="fileinput-new">Select image</span>-->
				<!--			<span class="fileinput-exists">Change</span>-->
				<!--			<input type="file" name="files" accept="image/*" multiple>-->
				<!--		</span>-->
						<!--<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>-->
				<!--	</div>-->
				<!--</div>-->
			
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

// $(function(){
//   $("input[name='price']").on('input', function (e) {
//     $(this).val($(this).val().replace(/[^0-9]/g, ''));
//   });
// });

$(function(){
  $("input[name='maximum_buy_limit']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));
  });
});

$(document).on("click",".glyphicon-remove",function(){
    var r=confirm("Are you sure you want to delete the image?");
    if(r==true){
        var id = $(this).data("id1");
        window.location.href="<?php echo SURL1.'Lottery/deleteimage/'.$this->uri->segment(4);?>/"+id;
    }
});

$("input[name='maximum_buy_limit']").keyup(function(){
    var value = $(this).val();
    value = value.replace(/^(0*)/,"");
    $(this).val(value);
});


</script>



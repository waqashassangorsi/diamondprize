
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
	<form role="form" method="post" action="<?php echo base_url();?>admin/Tickets/insertticket" class="form-horizontal form-groups-bordered"  enctype="multipart/form-data">

		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">Lottery Name</label>
			
			<div class="col-sm-5">
			  <select class="form-control" id="exampleFormControlSelect1" required name="lotteryname">
                 <option>Select Lottery Name</option>
                 <?php foreach ($name as $value) { ?>
                 <option value="<?php echo $value["product_name"] ?>"><?php echo $value["product_name"] ?></option>
                <?php } ?>            
                 </select>
		
			</div>
		</div>
		<?php echo form_error('name'); ?>

		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">Ticket Price ($)</label>
			
			<div class="col-sm-5">
				<input type="text" name="ticketprice" class="form-control" placeholder="Enter Ticket Price" autocomplete="off" required value="<?php echo $result["Ticket_price"]?>">
				<?php echo form_error('price'); ?>
			</div>

		</div>
		
			<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">Ticket A</label>
			
			<div class="col-sm-5">
				<input type="text" name="ticketa" class="form-control" placeholder="Enter Ticket A" autocomplete="off" required value="<?php echo $result["TicketA"]?>">
				<?php echo form_error('price'); ?>
			</div>

		</div>
		
		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">Ticket B</label>
			
			<div class="col-sm-5">
				<input type="text" name="ticketb" class="form-control" placeholder="Enter Ticket B" autocomplete="off" required value="<?php echo $result["TicketB"]?>">
				<?php echo form_error('price'); ?>
			</div>

		</div>
		
	
		
	

		<?php 
	    if(!empty($result["id"])){
		?>
		<input type="hidden" value="<?php echo $result["id"]; ?>" name="edit"/>
		<?php
		}
		?>
		
	
	
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
  $("input[name='ticketprice']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));
  });
});

$(function(){
  $("input[name='ticketa']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));
  });
});

$(function(){
  $("input[name='ticketb']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));
  });
});

</script>


		
			
			
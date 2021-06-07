
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
			<label for="field-1" class="col-sm-3 control-label">Select Lottery Name</label>
			
			<div class="col-sm-5">
				  <select class="form-control" id="exampleFormControlSelect1" required name="lotteryname">
                            
                            <?php foreach ($name as $value) { ?>
                            <option <?php if($value['lottery_id']==$record['lottery_id']){ echo "selected";}?> value="<?php echo $value["lottery_id"] ?>"><?php echo $value["product_name"] ?></option>
                             <?php } ?>            
                    </select>
			</div>
		</div>
		
		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">Ticket Price ($)</label>
			
			<div class="col-sm-5">
			<input type="text" name="ticketprice"  class="form-control" autofocus id="field-1" placeholder="Enter Ticket Price" required value="<?php echo $record['Ticket_price']; ?>">
			</div>
		</div>
		

		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">Ticket Range</label>
			
			<div class="col-sm-5">
				<input type="text" name="ticketa" class="form-control" placeholder="Enter Ticket Range e.g 1000" autocomplete="off" required value="<?php echo $record['TicketA']; ?>">
				
			</div>

		</div>
	    
	    <?php 
	    if(!empty(!empty($record))){
	    ?>
	    <input type="hidden" value="<?php echo $record['id'];?>" name="edit"/>
	    <?php } ?>
	
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
//   $("input[name='ticketprice']").on('input', function (e) {
//     $(this).val($(this).val().replace(/[^0-9]/g, ''));
//   });
// });

// $(function(){
//   $("input[name='ticketa']").on('input', function (e) {
//     $(this).val($(this).val().replace(/[^0-9]/g, ''));
//   });
// });

</script>

		
			
			
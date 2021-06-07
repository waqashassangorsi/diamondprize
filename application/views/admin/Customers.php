
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
	
</ol>

<div class="panel-heading">
	<div class="panel-title h4">
		<b><?php echo $Controller_name;?></b>
	</div>
				
</div>


<table class="table table-bordered datatable" id="table-1">
	<thead>
		<tr>
			<th>#</th>
			<th>Identity No</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Gender</th>
			<th>View Detail</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		
		<?php 
			$i = 1;
			if(!empty($users)){ 
					
				foreach ($users as $value) {
					
        ?>
				<tr class="odd gradeX">
					<td><?php echo $i;?></td>
					<td><?php echo $value['identityno']; ?></td>
					<td><?php echo $value['fname']; ?></td>
					<td><?php echo $value['l_name']; ?></td>
					<td><?php echo $value['gender']; ?></td>
					<td>
					    <a href="<?php echo SURL1."Customers/detail/".$value['u_id'];?>" class="btn btn-info btn-sm">
							View
						</a>
					</td>
				
					<td class="center">
						<?php 
							if($value['privilidge']=="0"){
								$privilidge = "Pending";
						?>
						<a href="javascript:void(0)" data-id1="<?php echo $value['u_id'];?>" class="btn btn-info btn-sm btn-icon icon-left approve">
							Approve
						</a>
						<a href="javascript:void(0)" data-id1="<?php echo $value['u_id'];?>" class="btn btn-danger dlt btn-sm btn-icon icon-left">
							<i class="entypo-cancel"></i>
							Reject
						</a>
						<?php		
							}else if($value['privilidge']=="1"){
								$privilidge = "Approved";
						?>	
						<a href="javascript:void(0)" data-id1="<?php echo $value['u_id'];?>" class="btn btn-danger dlt btn-sm btn-icon icon-left">
							<i class="entypo-cancel"></i>
							Reject
						</a>
						<?php	
							}else{
								$privilidge = "Rejected";
						?>	

						<a href="javascript:void(0)" class="btn btn-default btn-sm btn-icon icon-left">
							<i class="entypo-pencil"></i>
							Rejected
						</a>

						<?php	
							}
						?>
						<a href="javascript:void(0)" data-id1="<?php echo $value['u_id'];?>" class="btn btn-default btn-sm btn-icon icon-left dltcustomer">
							<i class="entypo-pencil"></i>
							Delete
						</a>
						<a href="javascript:void(0)" data-id1="<?php echo $value['u_id'];?>" class="btn btn-default btn-sm btn-icon icon-left auth">
							<i class="entypo-pencil"></i>
							Ask For Login
						</a>
						
					</td>
				</tr>

		<?php $i++; }} ?>
					
		
	</tbody>
	
</table>



<script type="text/javascript">
	$(document).on('click','.dlt',function(){
		var id = $(this).data("id1");
		var response = confirm("Are You sure you want to Reject?");
		if(response == true){
			window.location.href = "<?php echo SURL1;?>Customers/delete/"+id;
		}
	});

	$(document).on('click','.dltcustomer',function(){
		var id = $(this).data("id1");
		var response = confirm("Are You sure you want to Delete this user?");
		if(response == true){
			window.location.href = "<?php echo SURL1;?>Customers/deleteuser/"+id;
		}
	});

	$(document).on('click','.auth',function(){
		var id = $(this).data("id1");
		var response = confirm("Are You sure you want to ask the user for login??");
		if(response == true){
			window.location.href = "<?php echo SURL1;?>Customers/auth/"+id;
		}
	});

	
	$(document).on('click','.approve',function(){
		var id = $(this).data("id1");
		var response = confirm("Are You sure you want to Approve this?");
		if(response == true){
			window.location.href = "<?php echo SURL1;?>Customers/approve/"+id;
		}
	});
</script>

<script type="text/javascript">
var responsiveHelper;
var breakpointDefinition = {
    tablet: 1024,
    phone : 480
};
var tableContainer;

	jQuery(document).ready(function($)
	{
		tableContainer = $("#table-1");
		
		tableContainer.dataTable({
			"sPaginationType": "bootstrap",
			"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
			"bStateSave": true,
			

		    // Responsive Settings
		    bAutoWidth     : false,
		    fnPreDrawCallback: function () {
		        // Initialize the responsive datatables helper once.
		        if (!responsiveHelper) {
		            responsiveHelper = new ResponsiveDatatablesHelper(tableContainer, breakpointDefinition);
		        }
		    },
		    fnRowCallback  : function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
		        responsiveHelper.createExpandIcon(nRow);
		    },
		    fnDrawCallback : function (oSettings) {
		        responsiveHelper.respond();
		    }
		});
		
	});
</script>



<?php
require_once(APPPATH."views/admin/includes/footer.php"); 

 ?>

<script type="text/javascript">

$(document).on('click','.getdetails',function(){
	var id = $(this).val();

	$.ajax({
	  url: "<?php echo SURL1.'Customers/get_customer_details'?>",
	  cache: false,
	  type: "POST",
  	  data: {id : id},
	  success: function(html){ 
	    $(".modal-content").html(html);
	  }
	});
});

$(document).on('click','.getlocationdetails',function(){
	var id = $(this).val();

	$.ajax({
	  url: "<?php echo SURL1.'Customers/get_customer_location'?>",
	  cache: false,
	  type: "POST",
  	  data: {id : id},
	  success: function(html){ 
	    $(".modal-content").html(html);
	  }
	});
});

</script>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog" style="top:170px;">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      
        
    </div>

  </div>
</div>
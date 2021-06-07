
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
		<b><?php echo $Newcaption;?></b>
	</div>
</div>


<table class="table table-bordered datatable" id="table-1">
	<thead>
		<tr>
			<th>#</th>
			<th>Lottery Name</th>
			<th>Price($)</th>
			<th>Winner name</th>
			<th>Ticket No</th>
			<th>Date</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		
		<?php 
			$i = 1;
				foreach ($record as $value) { 
			?>
			
				<tr class="odd gradeX">
					<td><?php echo $i;?></td>
					<td><?php echo $value['product_name']; ?></td>
					<td><?php echo $value['price']; ?></td>
					<td><?php echo ucwords($value['fname']); ?></td>
					<td><?php echo $value['ticket_no']; ?></td>
					<td><?php echo $value['winer_date']; ?></td>
					<td class="center">
					    <a href="<?php echo base_url("admin/AllUsers/viewuser/".$value['u_id'])?>" class='btn btn-orange btn-sm'>
                            <i class='entypo-pencil'></i>
    					    View Winner details
    			        </a>
    			        <a href="javascript:void(0)" data-id1="<?php echo $value['winner_id'];?>" class="btn btn-danger dlt btn-sm btn-icon icon-left">
            				<i class="entypo-cancel"></i>
            				Delete
            			</a>
					</td>
				</tr>

		<?php $i++; } ?>
					
		
	</tbody>
	
</table>

<script type="text/javascript">
	$(document).on('click','.dlt',function(){
		var id = $(this).data("id1");
		var response = confirm("Are You sure you want to delete?");
		if(response == true){
			window.location.href = "<?php echo SURL1;?>Winners/delete/"+id;
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



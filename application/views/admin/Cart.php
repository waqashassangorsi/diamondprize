
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
			<th>User Name</th>
			<th>Ticket Number</th>
			<th>Product Name</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		
		<?php 
			$i = 1;
				foreach ($record as $value) { 
				
				   $users = $this->db->query("select * from users where u_id='".$value['u_id']."'")->result_array()[0];
				    $product_name = $this->db->query("select * from lottery where lottery_id='".$value['lottery_id']."'")->result_array()[0]['product_name'];    
				    
			?>
			
				<tr class="odd gradeX">
					<td><?php echo $i;?></td>
					<td><?php echo $users['fname']; ?></td>
					<td><?php echo $value['tickets']; ?></td>
					<td><?php echo $product_name;?></td>
					<td class="center">
					    <form action="<?php echo SURL1.'Cart/sendmail'?>" method="post">
					        <input type="hidden" name="id" value="<?php echo $value['id'];?>"/>
					        <input type="submit" class="btn btn-orange btn-sm  heart" value="Send Email"/>
					    </form>
					</td>
				</tr>

		<?php $i++; } ?>
					
		
	</tbody>
	
</table>



<script type="text/javascript">
	$(document).on('click','.heart',function(){
		var ids=$(this).data("productid");
	  $.ajax({
        url: "<?php echo SURL."admin/Cart/sendmail";?>",
        cache: false,
        method:"POST",
        data:{ids:ids},
        success: function(html){
        }  
        });
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



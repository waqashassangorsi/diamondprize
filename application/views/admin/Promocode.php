
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
			
<div style="text-align: right;">
	<a href="<?php echo base_url();?>admin/Promocode/Addpromocode" class="btn btn-success btn-icon">
		Add Promocde
		<i class="entypo-pencil"></i>
	</a>
</div>


<table class="table table-bordered datatable" id="table-1">
	<thead>
		<tr>
			<th>#</th>
			<th>Code</th>
			<th>Pecentage</th>
			<th>Valid for</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		
		<?php 
			$i = 1;
				foreach ($record as $value) { 
				   
			?>
			
				<tr class="odd gradeX">
					<td><?php echo $i;?></td>
					<td><?php echo $value['code']; ?></td>
					<td><?php echo  $value['promopercentage'];?>%</td>
					<td><?php echo $value['useable']; ?></td>
					<td class="center">
                	<a href="<?php echo base_url()?>admin/Promocode/Editpromocode/<?php echo $value['promo_id']; ?>" class="btn btn-default btn-sm btn-icon icon-left">
        			<i class="entypo-pencil"></i>
        			Edit
        			</a>
                	<a href="javascript:void(0)" data-id1="<?php echo $value['promo_id'];?>" class="btn btn-danger dlt btn-sm btn-icon icon-left">
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
			window.location.href = "<?php echo SURL1;?>Promocode/delete/"+id;
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



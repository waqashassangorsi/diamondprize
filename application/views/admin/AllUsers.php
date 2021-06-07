
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
	
<!--			
<div style="text-align: right;">
			<a href="<?php echo base_url();?>admin/Employee/Addemployee" class="btn btn-success btn-icon">
				Add User
				<i class="entypo-pencil"></i>
			</a>
</div>
-->

<table class="table table-bordered datatable" id="table-1">
	<thead>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Email</th>
			<th>Joining Date</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		
		<?php 
			$i = 1;
			if(!empty($Employees)){ 
					
				foreach ($Employees as $value) {

				?>
				<tr class="odd gradeX">
					<td><?php echo $i;?></td>
					<td><?php echo $value['fname']; ?></td>
					<td><?php echo $value['email']; ?></td>
					<td><?php echo $value['joining_date']; ?></td>
					<td>
					    <a href="<?php echo base_url()?>admin/AllUsers/EditUser/<?php echo $value['u_id']; ?>" class="btn btn-default btn-sm btn-icon icon-left">
        					<i class="entypo-pencil"></i>
        					Edit
        				</a>
					</td>
				</tr>

		<?php $i++; }} ?>
					
		
	</tbody>
	
</table>






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



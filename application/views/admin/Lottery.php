
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
	<a href="<?php echo base_url();?>admin/Lottery/Addlottery" class="btn btn-success btn-icon">
		Add Lottery
		<i class="entypo-pencil"></i>
	</a>
</div>


<table class="table table-bordered datatable" id="table-1">
	<thead>
		<tr>
			<th>#</th>
			<th>Lottery Name</th>
			<th>Price($)</th>
			<th>Price(€)</th>
			<th>Start Date</th>
			<th>Ending Date</th>
			<th>Image</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		
		<?php 
			$i = 1;
				foreach ($record as $value) { 
				    $images = $this->db->query("select * from lottery_images where lottery_id='".$value['lottery_id']."'")->result_array()[0]['images'];
				    $is_purchased = $this->db->query("select * from ticket_purchased where lottery_id='".$value['lottery_id']."'");
			?>
			
				<tr class="odd gradeX">
					<td><?php echo $i;?></td>
					<td><?php echo $value['lottery_name']; ?></td>
					<td><?php echo $value['price']; ?></td>
					<td><?php echo $value['priceeuro']; ?></td>
					<td><?php echo $value['start_date']; ?></td>
					<td><?php echo $value['ending_date']; ?></td>
					<td><img src="<?php echo $images;?>" style="width:100px"></td>
					<td class="center">
					   <?php 
					        if($is_purchased->num_rows() > 0){ 
					            $is_winer_chosen = $this->db->query("select * from winners where lottery_id='".$value['lottery_id']."'");
					            if($is_winer_chosen->num_rows() > 0){
					                echo "<a href='javascript:void(0)' class='btn btn-success btn-sm'>
                        					Winner Choosen
                        			      </a>";             
					            }else{
					                if($value['ending_date'] < date("Y-m-d")){
					    ?>
    					               <a href="<?php echo base_url("admin/Lottery/initiate/".$value['lottery_id'])?>" class='btn btn-orange btn-sm'>
    		                                <i class='entypo-pencil'></i>
                    					    Initiate Lottery
                    			       </a>
					    <?php
					                       
					                }
					            }
					                       
					           
					           
					        }else{
					            if($value['ending_date'] <= date("Y-m-d")){
					        ?>
					                <a href="javascript:void(0)" class="btn btn-danger btn-sm">
                        					Expired
                        			</a>
					        <?php
					            }
					        ?>
                				
                				
                				<a href="javascript:void(0)" data-id1="<?php echo $value['lottery_id'];?>" class="btn btn-danger dlt btn-sm btn-icon icon-left">
                					<i class="entypo-cancel"></i>
                					Delete
                				</a>
        				<?php } ?>
        				
        				<a href="<?php echo SURL.'Tickets/index/'.$value['lottery_id'];?>" class="btn btn-info btn-sm btn-icon icon-left">
        					<i class="entypo-cancel"></i>
        					View Sold Tickets
        				</a>
        				<a href="<?php echo base_url()?>admin/Lottery/EditLottery/<?php echo $value['lottery_id']; ?>" class="btn btn-default btn-sm btn-icon icon-left">
        					<i class="entypo-pencil"></i>
        					Edit
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
			window.location.href = "<?php echo SURL1;?>Lottery/delete/"+id;
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



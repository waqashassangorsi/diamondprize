<?php include("includes/front_header.php") ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.js"></script>

<style>
.myaccount_cont{
    width: 80%;
    margin: auto;
    margin-top: 124px;
    margin-bottom: 10px;;
}

.myaccount_cont h2{
    font-weight: normal;
}
.card-header h3{
    font-weight: normal;
    margin-bottom: 0;
}


.card {
    border-radius: 0;
    border: 0;
    box-shadow: 0 0px 4px 0 #e9e9e9;
}
.card-header {
    background-color: transparent;
    border-color: #f0f0f0;
}
.table tbody tr td {
    vertical-align: middle;
    white-space: nowrap;
}
.table thead th {
    border: 0;
}
.view_btn{
    background: #b49449;
    color: #fff;
}
.view_btn:hover{
    color: #fff;
    background: #b49449;
}
.sold_ticket{
    background: #b49449;
    width: 26px;
    display: inline-block;
    height: 26px;
    padding: 1px 9px;
    font-size: 15px;
    color: #fff;
    border-radius: 50%;
}
.dataTables_length{
    padding-left: 11px;
}
.paginate_button {
    padding: 0 15px!important;
}
.dataTables_length select{
    border: 1px solid #e1d4d4;
    border-radius: 3px;
}
#example_filter input{
    border: 1px solid #e7e7e7;
    border-radius: 5px;
}
#example_wrapper{
    padding: 10px;
}
table.dataTable.no-footer{
    border-bottom: none;
}
.table th{
    border-bottom: none!important;
    border-bottom: 1px solid #dee2e6!important;
    padding: 14px 20px;
}
table.dataTable tbody td{
    border: none;
    border-bottom: 1px solid #dee2e6;
    padding: 14px 20px;
}
@media (max-width: 767px){
    .order_cont {
        max-width: 100%;
        overflow-x: auto;
    }
    .card {
        max-width: 100%;
        overflow-x: auto;
    }
    .table {
        min-width: 1000px;
    }
    .myaccount_cont{
      width: 98%;  
    }
}
</style>
<div class="work-proses fix area-padding-2">
	<div class="container">
	  
	
        <div class="container about_cont mt-5">
            <div class="row">
        		<div class="col-md-12 col-sm-12 col-12">
        			<div class="section-headline text-center">
                        <h3>Ticket Purches</h3>
        			</div>
        		</div>
        	</div>
        	<div class="row mb-3">
        	    <div class="col-md-12">
        	        <div class="about_detail text-center" style="padding-bottom: 14px;">
        	            <p class="mt-3">
            	       300 club from diamond prizes you can buy a more expensive ticket for a better chance to win. Here in 300 club, our competitions have a maximum of 300 entries, Diamond prizes win your dreams.
        
            	        
            	        </p>
        	        </div>
        	    </div>
        	</div>
        </div>

	    <div class="order_cont">
            <div class="card">
            	<div class="card-header">
                    <h5>Ticket Purches</h5>
                </div>
                <table id="example" class="table" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Lottery Name</th>
                            <th>Ticket no</th>
                            <th>Tickets Purches</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php
                            $i = 1;
                            foreach($result as $row) { 
                               
                               $users = $this->db->query("select * from users where u_id='".$row['u_id']."'")->result_array()[0];
                               $lottery = $this->db->query("select * from lottery where lottery_id='".$row['lottery_id']."'")->result_array()[0];
                               //var_dump($lottery);
                        ?>
                        
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $users['fname'] ?></td>
                            <td>
                                <span class="sold_ticket"><?php echo $row['ticket_no'];?></span>
                            </td>
                             <td><?php echo  $lottery['product_name'] ?></td>
                        </tr>
                       <?php $i++; } ?>
                       
                </table>
            </div>
        </div>

		
	</div>
</div>

<script>
    $(document).ready(function(){
        $('.card_1').hover(function(){
            $('.ticket-btn').css("display", "block"); },
            
            function(){
                $('.ticket-btn').css("display", "none");
        });

		$('#design').click(function(){
			//alert('hello');
		})
    });
</script>
<!-- Counter FLip -->

<script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>


<?php include("includes/front_footer.php") ?>

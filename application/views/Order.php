<?php include('includes/front_header.php'); ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.css"/>
 
 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font/GOTHIC.TTF" />
    
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.js"></script>
<style>
.myaccount_cont{
    width: 80%;
    margin: auto;
    margin-top: 124px;
    margin-bottom: 10px;
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
    width: 32px;
    display: inline-block;
    height: 32px;
    padding-top: 3px;
    font-size: 15px;
    color: #fff;
    border-radius: 50%;
    text-align:center;
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
<div class="container-fluid">
    <div class="myaccount_cont">
        <div class="row">
            <div class="col-md-12 text-center pt-3 pb-3">
                <h2>My Account</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-lg-3">
                <?php include('includes/MyAccountMenu.php'); ?>
            </div>
            <div class="col-md-8 col-lg-9">
                <div class="order_cont">
                    <div class="card">
                    	<div class="card-header">
                            <h5>Tickets Purchased</h5>
                        </div>
                        <table id="example" class="table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Lottery Name</th>
                                    <th>Tickets Purchased</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php
                                    $i = 1;
                                    foreach($result as $row) { 
                                       
                                       $ticket_no = $this->db->query("select * from ticket_purchased where is_paid='Yes' and lottery_id='".$row['lottery_id']."' and u_id='".$this->session->userdata('Enduser')."'")->result_array();
                                ?>
                                
                                <tr>
                                    <td><?php echo $i?></td>
                                    <td><?php echo $row["product_name"]?></td>
                                    <td>
                                        <?php 
                                        foreach($ticket_no as $key=>$value){
                                        ?>
                                        <span class="sold_ticket"><?php echo $value['ticket_no'];?></span>
                                        <?php } ?>
                                    </td>
                                </tr>
                               <?php $i++; } ?>
                               
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include('includes/front_footer.php'); ?>

<script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
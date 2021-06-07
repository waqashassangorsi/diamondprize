<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<!-- <meta name="description" content="" />
	<meta name="author" content="" /> -->
	
	<title>Diamond Prize</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <style>
        body{
                font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
        }
        .logo img{
            width: 114px;
        }
        .tableheader th{
            background: #b49449;
            color: #fff;
            padding: 10px!important;
        }
        .header span{
            color: #48aef7;
        }
        .header h6{
            font-weight: normal;
        }
        .table-bordered td{
            padding: 8px;
            font-size: 14px;
        }
        .table-bordered th{
            padding: 8px;
            font-size: 14px;
        }
        .right_heading{
            
            padding-top: 33px;

        }
        .heading h4{
            padding-top: 27px;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="header mb-3" style="border-bottom: 1px solid #ededed;">
        <div class="row">
            <div class="col-md-2">
                <div class="logo">
                    <img src="https://diamondprizes.com/test/assets/images/logo.png" />
                </div>
            </div>
            <div class="col-md-8">
                <div class="heading text-center">
                    <h4>Lottery Report</h4>
                </div>
            </div>
        </div>
    </div>
    
    <?php foreach($lottery as $row){ ?>
        
        <table class="table table-bordered table-striped" id="table-1">
        	<thead>
        	    <tr class="tableheader">
        	        
        	        <th colspan="3"><?php echo $row['product_name']; ?></th>
        	    </tr>
        		<tr>
        			<th style="width:100px">#</th>
        			<th style="width:470px">User Name</th>
        			<th>Ticket No</th>
        		</tr>
        	</thead>
        	<tbody>
        		
        		<?php 
        			$i = 1;
        			$purches = $this->db->query("select * from ticket_purchased where lottery_id ='". $row['lottery_id']."'AND  is_paid = 'Yes' GROUP BY u_id ")->result_array();
        			//var_dump($purches);
        			if(!empty($purches)){ 
        					
        				foreach ($purches as $value) {
                		      
                		      //$result_ticketNo = explode(',',$ticket_no);
        				    
        				$users = $this->db->query("select * from users where u_id='".$value['u_id']."' ")->result_array()[0];
        				//var_dump($lottery);
        				
        				$purchesTicket = $this->db->query("select * from ticket_purchased where lottery_id ='". $row['lottery_id']."'AND  is_paid = 'Yes' and u_id='".$value['u_id']."' ")->result_array();
        					
                ?>
        				<tr class="odd gradeX">
        					<td><?php echo $i;?></td>
        					<td><?php echo $users['fname']; ?></td>
        					<td>
        					    <?php 
        					        foreach($purchesTicket as $tickets){
        					            echo $tickets['ticket_no'] . ', '; 
        					    
        					        }
        					    
        					    ?>
        					
        					
        					</td>
        				
        				</tr>
        
        		<?php $i++; }}else{
        		?>
        		
        		<tr class="text-center">
        	        
        	        <th colspan="4" style="color: red;">Record Not found</th>
        	    </tr>
        		<?php } ?>
        					
        		
        	</tbody>
    	
        </table>

    <?php } ?>

</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>

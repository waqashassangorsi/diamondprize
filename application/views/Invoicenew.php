<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
</head>
<?php 
$masterdata = $this->db->query("select * from master where master_id='$masterid'")->result_array()[0];

?>
<body style="background:#eee;font-family:calibri;padding:20px;">

    <div style="width: 60%;background:#fff;box-shadow:0 0 10px -6px gray;margin: 30px auto;position:relative;overflow: hidden;">
        <div style="padding:40px;">
            <h1 style="font-weight:normal;margin-bottom:0"><span style="color:#76d81cfa ;font-weight:bold"><img src="<?php echo SURL; ?>assets/images/logo.png" style="width:100px;"/></h1>
            <h4 style="text-align:right;margin:0">10 Petteril Rickleton, Washington</h4>
            <p style="text-align:right;margin:0;font-size:14px;">United Kingdom,Ne389eq</p>
            <div style="background:#eee;padding: 11px 3px;" >
                <h3 style="margin:0;">Invoice #: <?php echo str_pad($masterdata['master_id'], 8, '0', STR_PAD_LEFT); ?></h3>
                <p style="margin:0;padding-top: 7px;padding-bottom: 7px;font-size:14px;">Invoice Date: <?php echo date("d M Y",strtotime($masterdata['date']));?></p>
            </div>
            
            <?php 
        	    $userdetail = $this->db->query("select * from users where u_id='".$masterdata['u_id']."'")->result_array()[0];
    	    ?>
	    
            <div style="padding: 36px 0px;">
                <h4 style="margin:0;padding-bottom: 4px;">Invoiced To</h4>
                <p style="margin:0;padding-bottom: 4px;font-size:14px;"><strong>Name:</strong> <?php echo $userdetail['fname'];?></p>
                <p style="margin:0;padding-bottom: 4px;font-size:14px;"><strong>Address:</strong> <?php echo $userdetail['address'];?></p>
                <p style="margin:0;padding-bottom: 4px;font-size:14px;"><strong>Phone no:</strong> <?php echo $userdetail['phone_no'];?></p>
                <p style="margin:0;padding-bottom: 4px;font-size:14px;"><strong>City:</strong> <?php echo $userdetail['town'];?></p>
                <p style="margin:0;padding-bottom: 4px;font-size:14px;"><strong>Zipcode:</strong> <?php echo $userdetail['postal_code'];?></p>
                <p style="margin:0;padding-bottom: 4px;font-size:14px;"><strong>Country:</strong> <?php echo $userdetail['country'];?></p>
 
            </div>
            <div style="margin-bottom: 35px;">
                <table cellspacing="0" style="width: 100%;box-shadow: 0 0 10px -6px grey;border: 1px solid #cecaca;">
                    <thead>
                        <tr style="background: #eee; ">
                            <th colspan="2" style="border-bottom: 1px solid #cecaca;text-align:left;padding-left:6px;">Description</th>
                            <th style="border-bottom: 1px solid #cecaca;text-align:left;">Tickets</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            
            				$details = $this->db->query("select * from ticket_purchased where masterid='".$masterid."' group by lottery_id")->result_array();
            				//echo "<pre>";var_dump($details);
            				
            				if(!empty($details)){
            				foreach ($details as $key => $value) {
            					$product_name = $this->db->query("select * from lottery where lottery_id='".$value['lottery_id']."'")->result_array()[0]['product_name'];
            					
            			?>
                        <tr>
                            <td colspan="2" style="padding: 13px 4px;border-bottom: 1px solid #cecaca;font-size:14px;"><?php echo $product_name;?></td>
                            <td style="padding: 13px 4px;border-bottom: 1px solid #cecaca;font-size:14px;">
                                <?php 
                                    $ticketpurchase = $this->db->query("select * from ticket_purchased where lottery_id='".$value['lottery_id']."' and u_id='".$masterdata['u_id']."'")->result_array();
                                    foreach($ticketpurchase as $key=>$mytickets){
                                        echo $mytickets['ticket_no'].",";
                                    }
                                   
                                ?>
                            </td>
                        </tr>
                        <?php  }} ?>
                        
                        <tr style="background: #eee;">
                            <td colspan="2" style="text-align:left;border-bottom: 1px solid #cecaca;padding-right: 23px;font-size:14px;padding-left:6px;"><b>Total amount:</b></td>
                            <td style="border-bottom: 1px solid #cecaca;font-size:14px;"><b><?php echo ucwords($masterdata['payableamt']);?> €</b></td>
                        </tr>

                    </tbody>
                </table>
            </div>
            
        </div>
        <!--<div style="position: absolute;top: 28px;right: -64px;">-->
        <!--    <span style="color: #fff;display: block;font-size: 29px;padding: 6px 103px;background: #76d81cfa !important;transform: rotate(40deg);border: 3px solid #76b938fa;">PAID</span>-->
        <!--</div>-->
    </div>
</body>
</html>
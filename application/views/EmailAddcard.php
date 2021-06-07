<!DOCTYPE html>
<html lang="en">
<head>
  <title>Diamond prizes</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body style="background:#F5F5F5;padding:50px;">

  
<div style="margin:0 auto;width:500px;border:1px solid #ccc;background:white;padding:15px;">
    <div style="text-align:left;background: black;width: 100%;">
        <a href="<?php echo SURL; ?>" >
            <img src="<?php echo SURL; ?>assets/images/logo.png" style="width:100px;height:100px;" alt="image Error">
        </a>
    </div>
    
    <h5 style="color:black;"><b>Hi <?php echo $record['fname'];?></b></h5>
    <p style="color:black;">James here from Diamond prizes</p>
    <p style="color:black;">There seems to be something in your basket and time is running out.</p>
    <p style="color:black;">Pay for your tickets and win your dreams.</p>
    <?php 
    $cart = $this->db->query("select carts.*,lottery.* from carts inner join lottery on lottery.lottery_id=carts.lottery_id where id='".$record['id']."'")->result_array()[0];
    
    $loteryimages = $this->db->query("select * from lottery_images where lottery_id='".$cart['lottery_id']."' order by id desc limit 1")->result_array()[0]['images'];
    ?>
    <div>
        <img src="<?php echo SURL.$loteryimages; ?>" style="width: 180px;height:200px" />
    </div>
    
    <div style="margin-top: 17px;margin-bottom: 17px;">
        <p> <?php echo $cart['product_name'];?> </p>
        <p> Tickets : <?php echo $cart['tickets'];?></p>
        <!--<p> £70.00</p>-->
    </div>
    <p><a style="background: #b49449 !important;color: white !important;border: 1px solid #b49449 !important;padding: 9px;font-size: 16px;text-decoration: none;color:black;" href="<?php echo SURL.'Cart'?>">Resume your order </a></p>
    <p style="color:black;">
        Good Luck<br>
        James Casey
    </p>
        
</div>

<div id="footer_div" style=" margin:0 auto;width:500px;background: black;margin-top: 21px;padding:15px">
    <div style="text-align: center;">
         <a href="https://www.facebook.com/Diamondprizeseurope/"><img style="width:9%;text-align:center;" src="<?php echo SURL; ?>assets/images/facebook-01.png" alt="image Error"></a>
         <a href="https://twitter.com/DiamondPrizes"><img style="width:9%;text-align:center;" src="<?php echo SURL; ?>assets/images/twitter2.png" alt="image Error"></a>
         <a href="https://www.instagram.com/diamondprizes/"><img style="width:9%;text-align:center;" src="<?php echo SURL; ?>assets/images/insta-new.png" alt="image Error"></a>
     </div>
    <p style="margin-top:19px; color: white;text-align:center">All Copyrights © 2020 are Reserved by Diamond Prizes</p>
</div>

</body>
</html>

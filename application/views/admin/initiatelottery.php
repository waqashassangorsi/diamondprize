
<?php 
require_once(APPPATH."views/admin/includes/header.php"); 
require_once(APPPATH."views/admin/includes/alerts.php"); 
?>


<div class="panel-body" style='background-image: url(<?php echo SURL1.'assets/images/source.gif';?>);height:650px;'>
    <h1 class="text-center" style="margin-top:10%;">Winner is:</h1>
    <h1 class="text-center" style="margin:0 auto;font-size:200px;border:6px solid red;height:310px;width:310px;border-radius:50%;padding-top:20px;">
        <?php echo $no;?>
    </h1>
				
</div>
		

<?php
require_once(APPPATH."views/admin/includes/footer.php"); 

 ?>




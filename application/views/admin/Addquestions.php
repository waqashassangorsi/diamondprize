
<?php 
require_once(APPPATH."views/admin/includes/header.php"); 
require_once(APPPATH."views/admin/includes/alerts.php"); 
?>

<style type="text/css">
     .protfolio_upload{
        width: 70px!important;
        height: 70px;
        border-radius: 138px;
        text-align: center;
        padding-top: 22px;
        font-size: 25px;
        border: none;
        color: #222!important;
        box-shadow: 0 0 5px 0px gainsboro;
        margin-left: 10px;
    }
</style>
<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo SURL1; ?>"><i class="entypo-home"></i>Home</a>
	</li>
	<li>			
		<a href="<?php echo $Controller_url; ?>"><?php echo $Controller_name; ?></a>
	</li>
	<li>			
		<a href="<?php echo $method_url; ?>"><?php echo $method_name; ?></a>
	</li>
	
</ol>

<div class="panel-heading">
	<div class="panel-title h4">
		<b><?php echo $Controller_name;?></b>
	</div>
				
</div>
<div class="panel-body">
	<form role="form" method="post" action="<?php echo base_url("admin/Questions/addquestion");?>" class="form-horizontal form-groups-bordered"  enctype="multipart/form-data">

       
		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">Lottery Name</label>
			
			<div class="col-sm-5">
				<select class="form-control" name="lottery_id">
				    <?php foreach($lottery as $key=>$value){?>
				    <option <?php if($question['lottery_id']==$value['lottery_id']){ echo "selected";}?> value="<?php echo $value['lottery_id'];?>"><?php echo $value['product_name'];?></option>
				    <?php } ?>
				</select>
			</div>
		</div>
		
		<?php if(!empty($question)){?>
		<input type="hidden" value="<?php echo $question['id'];?>" name="edit"/>
		<?php } ?>

		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">Question title</label>
			
			<div class="col-sm-5">
				<input type="text" name="title" class="form-control" placeholder="Enter Question title" required value="<?php echo ($question['question']); ?>">
			</div>
		</div>

		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">Option 1</label>
			
			<div class="col-sm-5">
				<input type="text" name="answers[]" class="form-control" placeholder="Enter Option 1" autocomplete="off" required value="<?php echo $answers['0']['myanswer']; ?>">
			</div>

		</div>
		
		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">Option 2</label>
			
			<div class="col-sm-5">
				<input type="text" name="answers[]" class="form-control" placeholder="Enter Option 2" autocomplete="off" required value="<?php echo $answers['1']['myanswer']; ?>">
			</div>

		</div>
		
		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">Option 3</label>
			
			<div class="col-sm-5">
				<input type="text" name="answers[]" class="form-control" placeholder="Enter Option 3" autocomplete="off" required value="<?php echo $answers['2']['myanswer']; ?>">
			</div>

		</div>
		
		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">Option 4</label>
			
			<div class="col-sm-5">
				<input type="text" name="answers[]" class="form-control" placeholder="Enter Option 4" autocomplete="off" required value="<?php echo $answers['3']['myanswer']; ?>">
			</div>

		</div>
		
		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">Correct answer</label>
			
			<div class="col-sm-5">
				<input type="number" name="rightanswer" class="form-control" placeholder="e.g 1" autocomplete="off" required value="<?php echo $corectanswer; ?>">
			</div>

		</div>

	
		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-5">
				<button type="Submit" name="Submit" class="btn btn-red">Save</button>
			</div>
		</div>
	</form>

				
</div>
		

<?php
require_once(APPPATH."views/admin/includes/footer.php"); 

 ?>




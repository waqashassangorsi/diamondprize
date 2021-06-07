
<?php 
require_once(APPPATH."views/admin/includes/header.php"); 
require_once(APPPATH."views/admin/includes/alerts.php"); 
?>
<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
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
	<form role="form" method="post" action="<?php echo SURL1;?>Subscribers/Addpost" class="form-horizontal form-groups-bordered"  enctype="multipart/form-data">

       <div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">User</label>
			<div class="col-sm-5">
				<input type="text" readonly name="subject" maxlength="20" class="form-control" autofocus id="field-1" value="<?php echo $record['email']; ?>"  >
			</div>
		</div>
		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">Subject</label>
			<input type="hidden" name="u_id" value="<?php echo $record['id']; ?>" />
			<div class="col-sm-5">
				<input type="text" name="subject" maxlength="20" class="form-control" autofocus id="field-1" placeholder="Enter Email Subject" required >
			</div>
		</div>
		
        <div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">Description</label>
			<div class="col-sm-9">
			<textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"> <?php echo ($record->description); ?></textarea>
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


<script>

// $(function(){
//   $("input[name='price']").on('input', function (e) {
//     $(this).val($(this).val().replace(/[^0-9]/g, ''));
//   });
// });

$(function(){
  $("input[name='maximum_buy_limit']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));
  });
});

$(document).on("click",".glyphicon-remove",function(){
    var r=confirm("Are you sure you want to delete the image?");
    if(r==true){
        var id = $(this).data("id1");
        window.location.href="<?php echo SURL1.'Lottery/deleteimage/'.$this->uri->segment(4);?>/"+id;
    }
});

$("input[name='maximum_buy_limit']").keyup(function(){
    var value = $(this).val();
    value = value.replace(/^(0*)/,"");
    $(this).val(value);
});


</script>

<script type="text/javascript">
	CKEDITOR.replace('exampleFormControlTextarea1');
</script>

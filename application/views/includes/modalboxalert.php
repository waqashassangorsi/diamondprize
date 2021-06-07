
<!-- Modal -->
<div class="modal fade" id="showlogin" style="position: absolute;left: 0;right: 0;height: 264px;Top: 111px;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog mt-0 mb-0" role="document">
    <div class="modal-content border-0">
        <div class="modal-header">
            <h5 class="modal-title">LOGIN OR REGISTER</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p style="margin-top:20px;">You must be registered to play our competitions. Please login or create an account.</p>
        </div>
        <div class="modal-footer">
          <a href="<?php echo SURL.'Loginuser';?>" class="btn btn-default close_btn" >LOGIN</a>
          <a href="<?php echo SURL.'Signupuser';?>" class="btn btn-default close_btn" >REGISTER</a>
        </div>
    </div>
  </div>
</div>


<style>
.glyphicon-warning-sign{color:#ff6112;font-size: 29px;}
.tick_wrpr {
    padding-top: 11px;
}

.oktick{font-size: 50px;color: green !important;border: 1px solid #ccc;border-radius: 50%;width:80px !important; padding: 15px;}
.cross{font-size: 50px;color: #c02626;border: 1px solid #ccc;border-radius: 50%; padding: 15px;width:85px;height:85px;}
.modal-dialog{max-width: 100%;}
.close_btn{background: #b49449;color:#fff;border:1px solid #b49449;}
.close_btn:hover{background: #fff;color:#b49449;border:1px solid #b49449;}

@media screen and (max-width: 769px) and (min-width: 320px){
    .model_diamond{
        height: 240px!important;
    }
}
</style>

<?php if($this->session->userdata("success")){?>

<script type="text/javascript">
    // jQuery.noConflict();
    
    jQuery(window).on('load',function(){
        jQuery('#success').modal('show');
    });

</script>

<!-- Modal -->
<div class="modal fade model_diamond" id="success" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog mt-0 mb-0" role="document">
    <div class="modal-content border-0">
        <div class="modal-body">
            <div class="tick_wrpr text-center">
                <span class="fa fa-check oktick"></span>
            </div>
            <p class="text-center" style="margin-top:20px;"><?php echo $this->session->userdata('success'); ?></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-fill-out close_btn" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>


<?php } ?>

<?php if($this->session->userdata("fail")){?>

<script type="text/javascript">

    $(window).on('load',function(){
        $('#fail').modal('show');
    });

</script>


<div class="modal fade model_diamond" id="fail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog mt-0 mb-0" role="document">
    <div class="modal-content border-0">
        <div class="modal-body">
            <div class="tick_wrpr text-center">
                <span class="fa fa-times cross"></span>
            </div>
            <p class="text-center" style="margin-top:20px;"><?php echo $this->session->userdata('fail'); ?></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn close_btn btn-fill-out" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>

<?php } ?>

<?php include('includes/front_header.php'); ?>
<style>
.myaccount_cont{
    width: 80%;
    margin: auto;
    margin-top: 124px;
}
.myaccount_cont h2{
    font-weight: normal;
}
.card-header h3{
    font-weight: normal;
}


.card {
    border-radius: 0;
    border: 0;
    box-shadow: 0 0px 4px 0 #e9e9e9;
}
.card-title{
    margin-bottom: 0;
    border-bottom: 1px solid #eee;
}
.form-control {
    color: #000;
    box-shadow: none;
    height: 50px;
    padding: 8px 15px;
}
label {
    color: #333;
}
label .required {
    color: #ff0000;
}
.card-title .nav-tabs{
    border-bottom: none!important;
}
.menu_tab .active{
    border: 1px solid #eee;
    background: #b49449;
    color: #fff!important;
}
.menu_tab a{
    color: #000;
}
.save_btn{
    background-color: #b49449;
    color: #fff;
}
.save_btn:hover{
    color: #fff;
    background-color: #b49449;
}
@media (max-width: 767px){
    .menu_tab a{
        font-size: 12px;
        padding: 10px!important;
    }
    .myaccount_cont{
        width: 98%;
    }
    .accountdetil_cont{
        margin-top: 13px;
    }
}

</style>
<div class="container-fluid">
    <div class="myaccount_cont" >
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
                <div class="accountdetil_cont">
                    <div class="card">
                    	
                        <div class="card-title p-3">
                            <div class="menu_tab">
                                <ul class="nav nav-tabs">
                                    <li class=""><a  data-toggle="tab" href="#name_sec" class=" p-3 text-decoration-none active">User Name</a></li>
                                    <li class="" ><a data-toggle="tab" href="#password_sec" class=" p-3 text-decoration-none ">User Password</a></li>
                                     
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade in active show" id="name_sec">
                                    <form method="post" action="<?php echo base_url();?>Myaccount/Changesetting">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                            	<label>Name <span class="required">*</span></label>
                                            
                                                <input required="" class="form-control" name="name" type="text" value="<?php echo $record->fname?>">
                                             </div>
                                            <div class="form-group col-md-12">
                                            	<label>Email Address <span class="required">*</span></label>
                                                <input readonly required class="form-control" name="email" type="email" value="<?php echo $record->email?>">
                                            </div>
                                            
                                            <div class="form-group col-md-12">
                                            	<label>Street Address <span class="required">*</span></label>
                                                <input required class="form-control" name="address" type="text" value="<?php echo $record->address?>">
                                            </div>
                                            
                                            <div class="form-group col-md-12">
                                            	<label>Town/City<span class="required">*</span></label>
                                                <input required class="form-control" name="town" type="text" value="<?php echo $record->town?>">
                                            </div>
                                            
                                            
                                            <div class="form-group col-md-12">
                                            	<label>Country<span class="required">*</span></label>
                                                <input required class="form-control" name="country" type="text" value="<?php echo $record->country?>">
                                            </div>
                                            
                                            
                                            <div class="form-group col-md-12">
                                            	<label>Postal Code<span class="required">*</span></label>
                                                <input required class="form-control" name="postalcode" type="text" value="<?php echo $record->postal_code?>">
                                            </div>
                                            
                                             <div class="form-group col-md-12">
                                            	<label>Contact Number<span class="required">*</span></label>
                                                <input required class="form-control" name="number" type="text" value="<?php echo $record->phone_no?>">
                                            </div>
                                            
                                            <div class="col-md-12">
                                                <button type="submit" class="btn save_btn" name="submit" value="Submit">Save</button>
                                                <input type="text" value="<?php echo $record->u_id?>" name="edit" hidden="hidden">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="password_sec">
                                    <form method="post" action="<?php echo base_url('Myaccount/changePasword'); ?>">
                                        <div class="row">
                                            <?php if($record->password!=""){?>
                                            <div class="form-group col-md-12">
                                            	<label>Current Password <span class="required">*</span></label>
                                                <input required class="form-control" name="curpassword" type="password">
                                            </div>
                                            <?php } ?>
                                            <div class="form-group col-md-12">
                                            	<label>New Password <span class="required">*</span></label>
                                                <input required class="form-control" name="npassword" type="password">
                                            </div>
                                            <div class="form-group col-md-12">
                                            	<label>Confirm Password <span class="required">*</span></label>
                                                <input required class="form-control" name="cpassword" type="password">
                                                 <input type="text" value="<?php echo $record->password?>" name="edit1" hidden="hidden">
                                                 <input type="text" value="<?php echo $record->u_id?>" name="edit2" hidden="hidden">
                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit" class="btn save_btn" name="submit" value="Submit">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
      </div>
    </div>
  </div>
    </div>
</div>


 
<?php include('includes/front_footer.php'); ?>
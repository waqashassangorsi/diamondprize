<?php include('includes/front_header.php'); ?>
<style>
.myaccount_cont{
    width: 80%;
    margin: 40px auto;
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
.card-header {
    background-color: transparent;
    border-color: #f0f0f0;
}
.form-control {
    color: #000;
    box-shadow: none;
    height: 50px;
    padding: 8px 15px;
}
.save_btn{
    background-color: #b49449;
    color: #fff;
}
.save_btn:hover{
    color: #fff;
    background-color: #b49449;
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
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card mb-3 mb-lg-0">
                                <div class="card-header">
                                    <h3>Billing Address</h3>
                                </div>
                                <div class="card-body">
                                     <form method="post" action="">
                                         
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name"  placeholder="Your Name">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name"  placeholder="Your Name">
                                        </div>
                                        
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="cname"  placeholder="Company Name">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="billing_address"placeholder="Billing Address">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="buldin_address" value="" placeholder="Building/House No">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="city" placeholder="City">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="zipcode" placeholder="Postcode / ZIP">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="vatno" placeholder="VAT N0 ">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="phone" placeholder="Phone Number ">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom_select">
                                                <select class="form-control" name="type_of_company">
                                                    
                                                <option value="Retail Shop">Retail Shop</option>
                                                <option value="Repairing Store">Repairing Store</option>
                                                   <option value="Resseller">Resseller</option>
                                                </select>
                                                
                                            </div>
                                        </div>
                                        <div class="custom_select">
                                            <select class="form-control" name="avg_of_month">
                                                <option value="500-2000">500-2000</option>
                                                <option value="2000-5000">2000-5000</option>
                                                <option value="5000-10000">5000-10000</option>
                                                <option value="More then 10000">More then 10000</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="submit" value="Update" class="btn mt-3 save_btn">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Shipping Address</h3>
                                </div>
                                <div class="card-body">
                                     <form method="post" action="">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="ship_name" placeholder="Your Name" value="">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="ship_cname" placeholder="Company Name" value="">
                                        </div>
                                                                                     <div class="form-group">
                                           
                                            <div class="custom_select">
                                                <select class="form-control first_null not_chosen" name="country">
                                                    
                                                    <option>Select Country Name</option>
                                                    <option>Paksitan</option>
                                                    <option>Paksitan</option>
                                                                                                            
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="ship_illing_address" placeholder="Billing Address" >
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="ship_buldin_address" placeholder="Building/House No">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="ship_city"  placeholder="City">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="ship_zipcode"  placeholder="Postcode / ZIP">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="ship_phone" placeholder="Phone Number ">
                                        </div>
                                        
                                        <div class="form-group">
                                            <button type="submit" name="submit" value="Update" class="btn btn-fill-out mt-3">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include('includes/front_footer.php'); ?>
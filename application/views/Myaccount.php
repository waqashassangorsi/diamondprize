<?php include('includes/front_header.php'); ?>
<style>
.myaccount_cont{
    width: 80%;
    margin: auto;
    margin-top: 124px;
    margin-bottom: 13px;
}
.dashboard_menu {
    box-shadow: 0 0px 4px 0 gray;
}
.myaccount_cont h2{
    font-weight: normal;
}
.card-header h3{
    font-weight: normal;
}


.dashboard_content .card {
    border-radius: 0;
    border: 0;
    box-shadow: 0 0px 4px 0 #e9e9e9;
}
.card-header{
    background: #fff!important;
}
.card-body p{
    line-height: 28px;
    font-size: 18px;
}
@media only screen and (max-width:760px){
    .myaccount_cont{
        width: 98%;
    }
    .dashborad_cont{
        margin-top: 13px;
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
                <div class="dashborad_cont">
                    <div class="card">
                    	<div class="card-header">
                            <h3>Dashboard</h3>
                        </div>
                        <div class="card-body">
                			<p>From your account dashboard. you can easily check view your , manage your tickets and billing prices and edit your password and account details.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include('includes/front_footer.php'); ?>
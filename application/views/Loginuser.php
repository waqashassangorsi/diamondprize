<?php include("includes/front_header.php"); ?>
<style>
    .login-area {
    background: url(assets/images/login_cover.jpg) no-repeat scroll center center / cover;
    position: relative;
}

.area-padding {
    padding: 100px 0px;
}

.fix {
    overflow: hidden;
}

.login-overlay {
    position: absolute;
    background: rgba(242,241,242,0.90);
    top: 0;
    width: 100%;
    left: 0;
    height: 100%;
}

.table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 20px;
}

.login-form {
    background: #fff;
    padding: 40px;
    margin: 40px 29px;
    border-radius: 4px;
}

.login-title {
    font-size: 24px;
    margin-bottom: 20px;
}

.login-area form#contactForm {
    border: none;
    border-radius: 0;
    box-shadow: none;
    background: #fff;
}
#contactForm{
    width: 90%;
    margin: 20px auto;
}

.login-form .form-control {
    display: block;
    width: 100%;
    height: 50px;
    padding: 7px 15px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #29446e;
    background-color: transparent;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 3px;
    margin-bottom: 20px;
}

.slide-btn.login-btn {
    border: 1px solid #b49449;
    display: inline-block;
    font-weight: 600;
    margin: 0px;
    padding: 5px 10px;
    text-align: center;
    text-transform: uppercase;
    transition: all 0.4s ease 0s;
    width: 100%;
    border-radius: 0px;
    background: #b49449;
    color: #fff;
    height: 50px;
    font-size: 16px;
}
.slide-btn.login-bt:hover{
    border: 1px solid #b49449!important;
    background: #fff!important;
    color: #b49449!important;
}

.separetor {
    margin-top: 20px;
}

.separetor span {
    color: #29446e;
    position: relative;
    top: 10px;
}
.sign-icon {
    display: block;
    overflow: hidden;
    margin-top: 0px;
    text-align: center;
}
.sign-icon ul li {
    display: inline-block;
    margin: 0px 2px;
}
.sign-icon ul li a {
    color: #29446e;
    display: block;
    text-transform: capitalize;
    font-size: 16px;
    padding: 1px 12px;
    font-weight: 600;
}
.acc-not {
    font-size: 13px;
    margin-top: 20px;
    font-weight: 600;
}
.acc-not a {
    color: #b49449;
}
.facbook_btn{
    background: #4267B2;
    color: #fff;
    padding: 13px 30px;
}
.google_btn{
    background: #a91e1e;
    color: #fff;
    padding: 12px 43px
}
.facbook_btn:hover{
    background: #4267B2;
    color: #fff;
}
.google_btn:hover{
    background: #a91e1e;
    color: #fff;
}
@media screen and (max-width: 700px) and (min-width: 340px){
    .login-form{
        margin: 28px 3px;
        padding: 40px 10px;
    }
    .facbook_btn{
        padding: 9px 16px;
    }
    .google_btn{
        padding: 9px 25px;
    }
}
</style>

<div class="login-area area-padding fix">
            <div class="login-overlay"></div>
            <div class="table">
                <div class="table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="offset-md-3 col-md-6 offset-sm-3 col-sm-6 col-12">
                                <div class="login-form">
                                    <h4 class="login-title text-center">LOGIN</h4>
                                    <div class="row">
                                        <form id="contactForm" method="POST" action="<?php echo base_url('Loginuser'); ?>" class="log-form">
                                            <div class="col-md-12 col-sm-12 col-12">
                                                <input type="text" id="name" class="form-control" name="user_email" placeholder="Email" required>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <input type="password" id="msg_subject" name="user_password" class="form-control" placeholder="Password" required>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                                <!--<div class="check-group flexbox">-->
                                                <!--    <label class="check-box">-->
                                                <!--        <input type="checkbox" class="check-box-input" checked="">-->
                                                <!--        <span class="remember-text">Remember me</span>-->
                                                <!--    </label>-->

                                                    
                                                <!--</div>-->
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                                <button type="submit" id="submit" class="slide-btn login-btn ">Login</button>
                                                <div id="msgSubmit" class="h3 text-center hidden"></div> 
                                                <div class="clearfix"></div>
                                                <!--<a class="text-muted h6" href="#">Forgot password?</a>-->
                                            </div>
                                            <div class="col-12 text-center">
                                                <h6 class="pt-4">OR</h6>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                                
                                                <div class="social_btns mt-4">
                                                    <a href="<?php echo $FBauthUrl;?>" class="btn facbook_btn"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a>
                                                    <a href="<?php echo $googleURL;?>" class="btn google_btn"><i class="fa fa-google" aria-hidden="true"></i>Google</a>
                                                </div> 
                                            </div> 
                                            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                                <div class="clear"></div>
                                                <div class="sign-icon">
                                                    <div class="acc-not">Don't have an account  <a href="<?php echo base_url('Signupuser'); ?>">Sign up</a></div>
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

<?php include("includes/front_footer.php") ?>

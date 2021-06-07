<?php include("includes/front_header.php") ?>
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

.register-form {
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

.register-form .form-control {
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
    margin-top: 40px;
    text-align: center;
}
.sign-icon ul li {
    display: inline-block;
    margin: 0px 2px;
}
.sign-icon ul li a{
    color: #29446e;
    display: block;
    text-transform: capitalize;
    font-size: 16px;
    padding: 1px 12px;
    font-weight: 600;
}


.sign-icon ul li a:hover{
    color: #b49449;
}
.acc-not {
    font-size: 13px;
    margin-top: 20px;
    font-weight: 600;
}
.acc-not a {
    color: #b49449;
}

.login_form_width
{
     width:100%;
}

.social_icon a
{
    color: #b49449;
}
@media screen and (max-width: 769px) and (min-width: 320px){
    .register-form{
        margin: 40px 0px;
    }
}
</style>

<div class="login-area area-padding fix">
            <div class="login-overlay"></div>
            <div class="table">
                <div class="table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="offset-md-3 col-md-6 offset-sm-3 col-sm-6 col-xs-12">
                                <div class="register-form">
                                    <h4 class="login-title text-center">REGISTER</h4>
                                    <div class="row">
                                        <form id="contactForm" method="post" action="<?php echo base_url('Signupuser'); ?>" class="log-form login_form_width">
                                            <div class="col-md-12 col-sm-12 col-12">
                                                <input type="text" id="name" name="name" class="form-control" placeholder="Name" required>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-12">
                                                <input type="email" id="email" class="form-control" name="email" placeholder="Your Email" required>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <input type="password" id="msg_subject" class="form-control" name="pass" placeholder="Password" required>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="check-group flexbox">
                                                    <label class="check-box">
                                                        <input type="checkbox" required class="check-box-input">
                                                        <span class="remember-text">I agree terms & conditions</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12 text-center mt-2">
                                                <button type="submit" id="submit" class="slide-btn login-btn">SIGNUP</button>
                                                <div id="msgSubmit" class="h3 text-center hidden"></div> 
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                                <div class="clear"></div>
                                                    <div class="acc-not">have an account?<a href="<?php echo base_url('Loginuser'); ?>"> Login</a></div>
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

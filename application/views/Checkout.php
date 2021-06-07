<?php include("includes/front_header.php") ?>
<script src="https://js.stripe.com/v3/"></script>
<style>
.billing-info-wrap h3 {
    font-size: 20px;
    font-weight: 600;
    position: relative;
    margin: 0 0 40px;
    text-transform: uppercase;
}
.billing-info-wrap h3:before {
    position: absolute;
    content: "";
    left: 0;
    bottom: -12px;
    background-color: #ec2227;
    width: 50px;
    height: 2px;
}
.your-order-area {
    padding: 40px 50px 50px;
    border-width: 2px;
    border-style: solid;
    position: relative;
    border-color: rgba(52,53,56,.1);
}
.your-order-area h3 {
    font-size: 20px;
    font-weight: 600;
    position: relative;
    margin: 0 0 45px;
    text-transform: uppercase;
}
.your-order-area h3:before {
    position: absolute;
    content: "";
    left: 0;
    bottom: -12px;
    background-color: #ec2227;
    width: 50px;
    height: 2px;
}
.your-order-info {
    border-bottom: 1px solid #e8e8e8;
}
.your-order-info ul li {
    font-size: 14px;
    padding: 0 0 7px;
    text-transform: uppercase;
    font-weight: 500;
}
.your-order-info ul li span {
    float: right;
    color: #ec2227;
}
.your-order-middle {
    border-bottom: 1px solid #e8e8e8;
    padding: 24px 0 23px;
}
.your-order-middle ul li:last-child {
    margin-bottom: 0;
}
.your-order-middle ul li {
    font-size: 14px;
    margin: 0 0 11px;
}
.your-order-middle ul li span {
    float: right;
    font-size: 16px;
}
.your-order-info.order-total {
    padding: 15px 0 10px;
}
.your-order-info {
    border-bottom: 1px solid #e8e8e8;
}
.payment-method {
    margin: 17px 0 0;
}
.payment-method .sin-payment {
    margin-bottom: 20px;
}
.sin-payment input {
    width: auto;
    display: inline-block;
    float: left;
    height: auto;
    margin-top: 5px;
}
.sin-payment label {
    font-size: 14px;
    text-transform: uppercase;
    margin: 0 0 0 21px;
    display: flex;
    -webkit-box-align: center;
    align-items: center;
    font-weight: 500;
}
.form-control {
    height: 40px;
    border: 1px solid #ced4da;
    border-radius: .25rem;
}
label {
    display: inline-block;
    margin-bottom: .5rem;
}
.payment-box p {
    font-size: 14px;
    margin: 0;
}
p {
    font-size: 14px;
    font-weight: 400;
    line-height: 24px;
    color: #737373;
    margin-bottom: 15px;
    font-family: Poppins,sans-serif;
}
.checkout-btn-submit {
    background-color: #b49449 ;
    display: block;
    cursor: pointer;
    padding: 16px 50px 17px;
    text-transform: uppercase;
    width: 100%;
    color: #fff;
    font-size: 14px;
    font-weight: 600;
    text-align: center;
    border: none;
    outline: 0;
}
.checkout-btn-submit:hover{
    background: #b49449;
}
.checkout-heading h1{
    color: #373737;
    font-family: Poppins,sans-serif;
    font-weight: 600;
    margin-top: 0;
    text-transform: uppercase;
}

#entercoupon:hover{color:black;}
.btn-fill-out:hover{color:#b49449 !important;}
.btn-fill-out:active{color:#b49449 !important;}

.btn:hover{color:#b49449 !important;}
</style>

<div class="container" style="margin-top: 124px">
    <div class="checkout-heading">
        <div class="row mb-4 mt-2">
            <h1 class="col-lg-12">checkout</h1>
        </div>
    </div>
    <div class="checkout-wrap">
        <div class="row" style="margin-bottom:20px;">
            <div class="col-lg-6">
            	<div class="toggle_info">
            		<span>Have a coupon? <a href="#coupon" style="color:black;" id="entercoupon" data-toggle="collapse" class="collapsed" aria-expanded="false">Click here to enter your code</a></span>
                </div>
                <div class="panel-collapse collapse coupon_form" id="coupon">
                    <div class="panel-body">
                    	<p>If you have a coupon code, please apply it below.</p>
                        <form action="<?php echo SURL.'Checkout'?>" class="coupon field_form input-group" method="post">
                            <input type="text" value="" name="coupon" class="form-control" placeholder="Enter Coupon Code..">
                            <div class="input-group-append">
                                <button class="btn btn-fill-out btn-sm" type="submit">Apply Coupon</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <form action="<?php echo SURL.'Checkout/pay';?>" id="myform" method="POST" class="">
        <div class="row">
            <div class="col-lg-7">
                <div class="billing-info-wrap mr-50">
                    <h3>Billing Details</h3>
                    
                    <div class="form-group">
                        <label>First Name <span  >*</span></label>
                        <input type="text" class="form-control " name="first_name" value="<?php echo $record['fname']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Street Address <span >*</span></label>
                        <input class="form-control " placeholder="House number and street name" type="text" name="address" value="<?php echo $record['address']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Town / City <span >*</span></label>
                        <input type="text" class="form-control " name="town" value="<?php echo $record['town']; ?>">
                    </div>
                    <div class="form-group">
                        <label>County <span >*</span></label>
                        <input type="text" class="form-control " name="county" value="<?php echo $record['country']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Postcode <span >*</span></label>
                        <input type="text" class="form-control " name="post_code" value="<?php echo $record['postal_code']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Phone <span >*</span></label>
                        <input type="text" class="form-control " name="phone" value="<?php echo $record['phone_no']; ?>">
                    </div>
                    
                    <div class="form-group">
                       
                        <img src="<?php echo SURL.'assets_front/images/nortan.jpeg'?>" class="img-responsive" style="width:100px;margin-right:10px;"/>
                        <img src="<?php echo SURL.'assets_front/images/visa.jpeg'?>" class="img-responsive" style="width:100px;"/>
                    </div>
                </div>
            </div>
           

            <div class="col-lg-5">
                <div class="your-order-area">
                    <h3>Your order</h3>
                    <div class="your-order-wrap gray-bg-4">
                        <div class="your-order-info-wrap">
                            <div class="your-order-info">
                                <ul>
                                    <li>Competition <span>Total</span></li>
                                </ul>
                            </div>
                            <div class="your-order-middle">
                                <?php 
                                    
                                    foreach($this->cart->contents() as $key=>$value){
                                        
                                        $lotteryname_query = $this->db->query("select * from lottery where lottery_id='".$value['id']."'")->result_array()[0];
                                        $lotteryname = $lotteryname_query['product_name'];
                                ?>
                                    <ul>
                                        <li><?php echo $lotteryname; ?><br> Ticket Numbers: <?php echo $value['tickets'];?>
                                        <?php
                                        
                                        if($this->session->userdata("location")==1){
                                            
                                        ?>
                                        <span class="win-money">
                                            €<?php echo $value['qty']*$lotteryname_query['priceeuro'];?>
                                        </span>
                                        <?php
                                        }else{
                                        ?>
                                        <span class="win-money">
                                            <?php 
                                                $value['subtotal'];
                                                echo "£".$value['subtotal'];
                                            ?>
                                        </span>
                                        <?php
                                        }
                                        ?>
                                        </li>
                                    </ul>
                                    <hr>
                                <?php } ?>    
                                    
                            </div>
                           
                            <div class="your-order-info order-total">
                                    <ul>
                                        <li>Total
                                        <?php
                                        
                                        if($this->session->userdata("location")==1){
                                            $payableamt = $totalcartprice;
                                        ?>
                                        <input type="hidden" value="<?php echo $totalcartprice; ?>" name="totalamt"/>
                                        <span class="win-money">
                                            €<?php 
                                                
                                                echo number_format($totalcartprice,2); 
                                            ?>
                                        </span>
                                        <?php
                                        }else{
                                            $payableamt = $this->cart->format_number($this->cart->total());
                                        ?>
                                        <input type="hidden" value="<?php echo $this->cart->total(); ?>" name="totalamt"/>
                                        <span class="win-money">
                                            £<?php echo ($this->cart->format_number($this->cart->total())); ?>
                                        </span>
                                        <?php
                                        }
                                        ?>
                                        </li>
                                        
                                        
                                    </ul>
                                    <?php 
                                        
                                        $discountamt=0;
                                        
                                        if(!empty($this->input->post("coupon"))){
                                            
                                            $couponquery = $this->db->query("select * from promo where code='".$this->input->post("coupon")."'")->result_array();
                                            $couponused = $this->db->query("select count(*) as count from master where coupon='".$this->input->post("coupon")."'")->result_array()[0]['count'];
                                            
                                            if($couponused < $couponquery[0]['useable']){
                                            
                                                if($couponquery){
                                                    $discountpercentage = $couponquery[0]['promopercentage'];
                                                    $discountamt = $payableamt * $discountpercentage/100;
                                                
                                    ?>
                                    <ul>
                                        <li>Discount Amount <span>£<?php echo $discountamt;?> </span></li>
                                    </ul>
                                    <?php }}} ?>
                                    <ul>
                                        <input type="hidden" value="<?php echo $discountamt;?>" name="discountamt"/>
                                        <input type="hidden" value="<?php echo ($payableamt-$discountamt);?>" name="payableamt"/>
                                        <li>Payable Amount<span>
                                            
                                        <?php  
                                               if($this->session->userdata("location")==1){
                                                ?>
                                                <span class="win-money">
                                                    €<?php echo ($payableamt-$discountamt);?>
                                                </span>
                                                <?php
                                                }else{
                                                ?>
                                                <span class="win-money">
                                                    £<?php echo ($payableamt-$discountamt);?>
                                                </span>
                                                <?php
                                                }
                                                ?>
                                        </span></li>        
                                        
                                    </ul>
                                </div>
                            </div>

                        <div class="payment-method">
                            <div class="pay-top sin-payment">
                                <input  class="input-radio Paymentoption" type="radio" value="1" required checked name="Paymentoption" id='payment_method_1'>
                                <label for="payment_method_1"> Credit / Debit Card </label>
                                <div class="payment-box payment_method_bacs" style="display: block;">
                                    <p>Make your payment through our secure payment gateway.</p>
                                </div>
                            </div>
                        </div>
                        <div class="paymet_cardd">
                            <div class="form-group">
                                <label>Card number <span >*</span></label>
                                <div id="card_number" class="field"></div>
                                <!--<input type="text" class="form-control js_checkout-card " name="card_number">-->
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                     
                                        <div id="card_expiry" class="field"> </div>
                                        <!--<input type="text" class="form-control js_checkout-date " name="expiration_date">-->
                                    </div>
                                    <div class="col-6">
                                     
                                        <div id="card_cvc" class="field"></div>
                                        <!--<input type="text"  name="cvv" class="form-control js_checkout-cvv ">-->
                                    </div>
                                </div>
    
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <div id="paymentResponse" style="color:red;margin-top:15px;"></div>
                        </div>
                        
                        <div class="form-group">
                            <div class="row WrprCreditCard" style="margin-left:0;">
                                <label>
                                    <input type="radio" value="2" name="Paymentoption" class="Paymentoption paypal_option">
                                    <span><img src="assets/images/paypal-logo.png" style="width:70px;height:20px;"></span>
                                </label>
                            </div>
                        </div>
                        <!--<p>-->
                        <!--    Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our-->
                        <!--    <a href="#" class="link-text">privacy policy</a>.-->
                        <!--</p>-->
                        <div class="form-group form-check">
                            <input type="checkbox" name="agree"  class="form-check-input ">
                            <label class="form-check-label" > I have read and agree to the website <a href="<?php echo SURL.'TermsnConditions';?>" class="link-text">terms and conditions</a> *</label>
                        </div>

                    </div>

                    <div class="Place-order mt-40">
                        <button type="submit" class="checkout-btn-submit" id="ordernow">Proceed To Payment</button>
                    </div>

                </div>
            </div>
        </div>
        <div id="form-status"></div>
        </form>
        

    </div>
    </div>
<script>
    $(document).ready(function(){
        $('#payment_method_1').click(function(){
            $('.paymet_cardd').show();
        });
        $('.paypal_option').click(function(){
            $('.paymet_cardd').hide();
        })
    })
</script>

 <script>
    
    // Create an instance of the Stripe object
	// Set your publishable API key
	var stripe = Stripe('<?php echo $this->config->item('stripe_publishable_key'); ?>');
    console.log(stripe);
// Create an instance of elements
var elements = stripe.elements();

var style = {
    base: {
        padding: '30px',
        height: '150px !important',
        // box-shadow: none,
        color: '#000',
        // box-shadow: none;
        // height: 50px;
        // padding: 8px 15px;
        backgroundColor: '#fff',
        '::placeholder': {
            color: '#888',
        },
    },
    invalid: {
    color: '#eb1c26',
    }
};

var cardElement = elements.create('cardNumber', {
    style: style
});
cardElement.mount('#card_number');

var exp = elements.create('cardExpiry', {
'style': style
});
exp.mount('#card_expiry');

var cvc = elements.create('cardCvc', {
'style': style
});
cvc.mount('#card_cvc');

// Validate input of the card elements
var resultContainer = document.getElementById('paymentResponse');
cardElement.addEventListener('change', function(event) {
    if (event.error) {
        resultContainer.innerHTML = '<p>'+event.error.message+'</p>';
    } else {
        resultContainer.innerHTML = '';
    }
});

// Get payment form element
var form = document.getElementById('myform');

$(document).on('click','#ordernow',function(e){
    e.preventDefault();
    var val = $(".Paymentoption:checked").val();
    
    if(val=="1"){
         createToken();
    }else{
        form.submit();
    }
   
    
});



// Create single-use token to charge the user
function createToken() { 
    stripe.createToken(cardElement).then(function(result) {
        if (result.error) {
            // Inform the user if there was an error
            resultContainer.innerHTML = '<p>'+result.error.message+'</p>';
        } else {
            // Send the token to your server
            stripeTokenHandler(result.token);
        }
    });
}

// Callback to handle the response from stripe
function stripeTokenHandler(token) {
    // Insert the token ID into the form so it gets submitted to the server
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);  
    form.appendChild(hiddenInput);
    
    // Submit the form
    form.submit();
}

    
</script>

<style>
    iframe{height: 100px;}
    .ElementsApp input{     
        height: 40px !important;
        border: 1px solid #ced4da !important;
        border-radius: .25rem !important;
    }
</style>

<?php include("includes/front_footer.php") ?>
<?php require_once("includes/front_header.php"); ?>
<script src="https://js.stripe.com/v3/"></script>
<style type="text/css">
.WrprJobTitle{padding-top:12px;}
.WrprPaymentSummary{border: 1px solid #ccc;padding-bottom:20px;}
.checkbox{padding-left:0;}
.checkbox label{padding-left:0;padding-right:10px}
.checkbox span{margin-left:10px}
#card_number{background-image: url("<?php echo SURL."assets/images/Images.png";?>"), url("<?php echo SURL."assets/images/Images.png";?>");background-repeat: no-repeat;background-size: 120px 361px, 120px 361px;padding-left: 0px;background-position: 2px -121px, 260px -61px;}
.serviceQty{
    width: 59px;
    margin-left: 21px;
    margin-bottom: 5px;
}

@media screen and (max-width: 574px) {
  .code_margin{margin-top: 9px;}
}

@media screen and (max-width:574px) {
  .dollar_sign{margin-top: -25px;}
}


@media screen and (max-width:616px) {
 #ordernow{
     padding-top: 12px;
    padding-right: 7px;
    padding-bottom: 12px;
    padding-left: 7px;}
    }
}
</style>



<section class="dashboard section-padding" style="padding: 69px;background:#8080802e ">
          
    <div class="container" style="background: #fff;margin-top:101px;">
        <form class="row" method="post" action="<?php echo SURL.'Checkout/pay';?>" id="myform" style="padding:30px;" enctype="multipart/form-data">
            
            
            <div class="col-sm-8">
                
                <?php if($this->router->fetch_method()=="buyservice"){?>
                <div class="row" style="margin-bottom:50px;">
                    <div class="col-xs-2">
                        <img style="width:80px;height:80px;" class="img-circle img-responsive" src="<?php echo SURL.$service_portfolio;?>" alt="image Error"/>
                    </div>
                    <div class="col-xs-10 WrprJobTitle">
                        <h4><?php echo $service_data['title']; ?></h4>
                    </div>
                </div>
                
                <?php 
                    if(!empty($service_adons)){
                        foreach($service_adons as $key=>$adonvalue){
                ?>
                <div class="row" style="margin-left:0;margin-bottom: 11px !important;">
                        
                    <div class="col-sm-1" style="padding-top:5px;padding-left:0;"> 
                        <input type="checkbox" value="<?php echo $adonvalue['adonid'];?>" name="adonspurchased[]" data-id1="<?php echo $adonvalue['amount'];?>" class="srviceadons">
                    </div>
                    <div class="col-sm-7" style="margin-left: -37px;border: 1px solid #ccc;border-radius: 3px;   padding: 5px 10px 5px 7px;" >
                        <?php echo $adonvalue['title'];?>
                    </div>
                    <div class="col-sm-1" style="border: 1px solid #ccc;border-radius: 3px;margin-left:5px;padding: 5px 10px 5px 7px;">
                        $<?php echo $adonvalue['amount'];?>
                    </div>
                </div>
                
                <?php }} ?>
                
                <h4>Details</h4>
                <textarea class="servicesbuydetails form-control" placeholder="Write your details" id="outertextarea" name="servicesbuydetails" required wrap="hard" cols="10"></textarea>

                
                <?php } ?>
                
                <h5>Payment Options</h5>
                <div class="checkbox mt-3">
                    <label><input type="radio" value="1" name="Paymentoption" checked class="Paymentoption"><span>Credit & Debit Cards</span></label>
                </div>

                <div class="row WrprCreditCard mt-3" id="WrprCreditCard">
                    <div class="col-sm-4">
                        <h6>Card Number</h6>
                        <div id="card_number" class="field"></div>
                        
                    </div>
                    <div class="col-sm-4 code_margin">
                        <h6>Expiration Date</h6>
                        <div id="card_expiry" class="field"> </div>
                    </div>

                    <div class="col-sm-4 code_margin">
                        <h6>Security Code</h6>
                        <div id="card_cvc" class="field"></div>
                    </div>
                </div>
                <div id="paymentResponse" style="color:red;margin-top:15px;"></div>
                <div class="row WrprCreditCard" style="margin-left:0;">
                    <label>
                        <input type="radio" disabled value="2"  name="Paymentoption" class="Paymentoption">
                        <span><img src="<?php echo SURL."assets/images/paypal-logo.png";?>" style="width:70px;height:20px;"/></span>(Comming Soon)
                    </label>
                </div>    

               
                
            </div>
            <div class="col-sm-4 WrprPaymentSummary">
                <h5 class="mt-3">Summary</h5>
                
                <hr>
                <div class="row">
                    <h6 class="col-sm-6">
                        Total
                    </h6>
                    <h6 class="col-sm-6 text-right dollar_sign">
                        <b id="finalamt">£<?php echo ($this->cart->format_number($this->cart->total())); ?></b>
                    </h6>
                </div>
                
                <div>
                    <input type="button" value="Order Now" class="btn btn-block btn-success mt-3 join_button" id="ordernow"/>
                </div>
            </div>
        </form>
    </div>
</section>  
 
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

$(document).on('click','.Paymentoption',function(e){
 
    var val = $(".Paymentoption:checked").val();
    
    
    if(val=="1"){ 
         $("#WrprCreditCard").show();
    }else{ 
        $("#WrprCreditCard").hide();
    }
   
    
});

// form.addEventListener('submit', function(e) { 
//     e.preventDefault();
//     createToken();
// });

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

    
     $(document).on('click','.srviceadons',function(){
        var totaladonsamt=0;
        var adonid=0;
        
        
        $('.srviceadons:checked').each(function() {

            valu = parseFloat($(this).data("id1"));
            totaladonsamt = totaladonsamt + valu; 
        });
        
        var service_amount =$('#service_total').html();
        $('#adonsamt').html(totaladonsamt);
        var totalamt = totaladonsamt+parseFloat(service_amount);
        $('#finalamt').html(totalamt);
        $('#total_money').val(totalamt);
    });
    
    
</script>
  
<?php require_once("includes/front_footer.php"); ?>
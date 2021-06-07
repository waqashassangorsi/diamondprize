<style>
    @media only screen and (max-width:760px){
        .subs-form{
            padding: 0;
        }
        .subs-form input#email {
            width: 100%;
        }
        .subs-form button#submit {
            width: 100%;
            margin: 20px 0px 40px;
        }
    }
</style>
<div class="subscribe-area fix area-padding bg-color">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-12">
                <div class="section-headline text-center">
                    <h3>SUBSCRIBE TO OUR NEWSLETTER</h3>
                    <p>We will keep you updated with all latest news, offers and discounts.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 offset-md-1 col-12">
                <div class="subs-form">
                    <form id="contactForm" method="POST" action="<?php echo base_url();?>Subcribers"  class="contact-form">
                        <input type="email" class="email form-control" id="email" name="subscribe" placeholder="Email" required="" data-error="Please enter your email">
                        <button type="submit" id="submit" class="add-btn btn-fill-out">Subscribe</button>
                    </form>  
                </div>
            </div>
        </div>
      
    </div>
</div>
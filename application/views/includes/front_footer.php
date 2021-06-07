
<script src="https://consent.cookiebot.com/uc.js" data-cbid="4a6af4ea-f614-41d8-b0a9-8bb6d7fe4799" async="async" id="Cookiebot" nonce="oGQGB/s872SeI5dX0ogd7w=="></script>

<style>
    .tp-widget-stars{float:left !important;}
    .tp-widget-payoff{float:left !important;}
    
    @media screen and (max-width: 760px) and (min-width: 320px){
        #tp-widget-wrapper{
            display: flex!important;
        }
        
    }
</style>

<footer class="footer-1 border border-dark">
            <div class="footer-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="footer-content logo-footer">
                                <div class="footer-head">
                                    <?php $query=$this->db->query("select * from general where status = 'logo'")->result_array()[0]; ?>
                                    <div class="footer-logo">
                                        <a class="footer-black-logo" href="#"><img src="<?php echo base_url($query['image']) ?>" alt="image Error"></a>
                                    </div>
                                    <p>
                                        Diamond Prize Competitions is a new, innovative competitions service built with you in mind. Our aim is to provide our contenders the chance to win amazing prizes.           
                                    </p>
                                    <div class="footer-icons">
                                        <ul>
                                            <li>
                                                <a href="https://www.facebook.com/DiamondPrizes-107618281069860/">
                                                    <i class="fa fa-facebook"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://twitter.com/DiamondPrizes">
                                                    <i class="fa fa-twitter"></i>
                                                </a>
                                            </li>
                                            <!--
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-google"></i>
                                                </a>
                                            </li>
                                            
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-pinterest"></i>
                                                </a>
                                            </li>
                                            -->
                                            <li>
                                                <a href="https://www.instagram.com/diamondprizes/">
                                                    <i class="fa fa-instagram"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="phone_number mt-2">
                                        <i class="fa fa-phone" style="color: #b49449" aria-hidden="true"></i>: <span class="text-white"> +447723480418</span>
                                        
                                    </div>
                                     
                                </div>
                            </div>
                            
                        </div>
                        <!-- end single footer -->
                        <div class="col-md-3 col-sm-3 col-6 footer_sect" style="padding: 54px;">
                            <div class="footer-content">
                                <div class="footer-head">
                                    <h4>USEFUL LINKS</h4>
                                    <ul class="footer-list" style="margin-left: -24px;">
                                        <li><a href="<?php echo base_url('Home'); ?>">Home</a></li>
                                        <li><a href="<?php echo base_url('Competitons'); ?>">Live Competitions</a></li>
                                        <li><a href="<?php echo base_url('Result'); ?>">Results</a></li>
                                        <li><a href="<?php echo base_url('Winner'); ?>">Winners</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- end single footer -->
                        
                        <div class="col-md-3 col-sm-3 col-6 footer_sect" style="padding: 54px;">
                             <div class="footer-content last-content">
                                <div class="footer-head">
                                    <h4>SUPPORT</h4>
                                    <ul class="footer-list" style="margin-left: -24px;">
                                        <li><a href="<?php echo base_url('About'); ?>">About</a></li>
                                        <li><a href="<?php echo base_url('Faq'); ?>">FAQS</a></li>
                                        <li><a href="<?php echo base_url('TermsnConditions') ?>">Terms and Conditions</a></li>
                                        <li><a href="<?php echo base_url('Refundpolicy') ?>">Refund Policy</a></li>
                                        <li><a href="<?php echo base_url('Blog') ?>">Blog</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <!-- TrustBox widget - Starter -->
                <div class="trustpilot-widget position-relative" style="" data-locale="en-US" data-template-id="5613c9cde69ddc09340c6beb" data-businessunit-id="5f4f6adde83ede0001892e08" data-style-height="100%" data-style-width="100%" data-theme="light">
                  <a href="https://www.trustpilot.com/review/diamondprizes.com" target="_blank" rel="noopener">Trustpilot</a>
                </div>
            <!-- End TrustBox widget -->
            </div>
            
            <!-- Start Footer Bottom Area -->
            <div class="footer-area-bottom" style="background:#fff;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-6 col-xs-12">
                            <div class="copyright">
                                <p class=" text-dark text-center">
                                    Copyright © 2020 Diamond Prizes Ltd Company number : 12892851 | Created By <a href="http://sysbitechies.com/" class="text-decoration-none" style="color:#28BBD7">Sysbi Techies</a>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Footer Bottom Area -->
        </footer>
        
<script>
    // $('.owl-carousel').owlCarousel(function(){
        

    // });
    
    $(document).load(function(){
        //alert('tes');
        $('.tp-widget-wrapper').css('text-align','left');
        $('.profile-url').css('display','block');
    });
</script>

<!--<script src="assets/js/jquery.min.js"></script>-->
<script src="assets/js/serach/scripts.js"></script>
<style>
    .tp-widget-wrapper{text-align:left;!important}
    .profile-url{display:block!important;}
</style>
    </body>
</html>
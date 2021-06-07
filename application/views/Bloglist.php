<?php include('includes/front_header.php'); ?>
<style>
   
    .page-area {
        background: url(assets/images/bread.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center center;
    }
</style>
<div class="page-area">
    <div class="breadcumb-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="breadcrumb text-center" style="text-align:center">
                    <div class="section-headline text-center" style="margin:auto">
                        <h3>Blog</h3>
                        <ul>
                        <a  href="<?php echo SURL.'Home';?>" style="color:#4a5f80"><li class="home-bread" style="text-align:center" id="menu_color">Home</li></a>
                        <li style="text-align:center">Blog</li>
                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5 mb-5">
    <?php include('includes/latestnews.php');?>
</div>


<?php include('includes/front_footer.php'); ?>
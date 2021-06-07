<?php include('includes/front_header.php'); ?>
<style>
    .blog_image img{
        width: 100%;
        height: 400px;
    }
    .recent-single-post {
        display: block;
        overflow: hidden;
        padding: 15px 0px;
        box-shadow: 0 0 10px -6px gray;
        padding-left: 10px!important;
    }
    .post-img {
        display: inline-block;
        float: left;
        padding-right: 10px;
    }
    .left-blog .post-img a {
        display: block;
        border: 1px solid #fafafa;
    }
    .recent-single-post img {
        width: 100%;
        max-width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 2px;
    }
    .pst-content {
        padding-left: 100px;
    }
    .left-head-blog .pst-content p {
        margin-bottom: 5px;
    }
    .pst-content p a {
        color: #3d5368;
        font-size: 15px;
    }
    .pst-content .date-type {
        font-size: 14px;
    }
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


<div class="container mb-5 mt-4" style="">
    <div class="row">
        <div class="col-sm-9">
            <div class="blog_con" style="box-shadow:0 0 10px -5px gray">
                <div class="blog_image">
                    <img src="<?php echo $singleBlog['image'] ?>" alt="image Error"/>
                </div>
                <div class="blog_card pt-5 pl-3 pr-3 pb-3">
                    <h3><?php echo $singleBlog['heading'] ?></h3>
                    <div class="blog-meta">
                        <span class="admin-type">
                            <i class="fa fa-user"></i>
                            Admin
                        </span>
                        <span class="date-type">
                            <i class="fa fa-calendar"></i>
                            <?php echo $singleBlog['date'] ?>
                        </span>
                    </div>
                    <p>
                       <?php echo $singleBlog['description'] ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="blog_right">
                <h4>Recent Post</h4>
                <?php foreach($record as $key => $valueblogg){ ?>
                <div class="recent-single-post mb-2">
					<div class="post-img">
						<a href="<?php echo SURL.'Blog/singleblog/'. $valueblogg['id'] ?>">
							<img src="<?php echo $valueblogg['image'] ?>" alt="image Error">
						</a>
					</div>
					<div class="pst-content">
						<p><a href="<?php echo SURL.'Blog/singleblog/'. $valueblogg['id'] ?>"><?php echo $valueblogg['heading'] ?></a></p>
						<span class="date-type">
							<?php echo $valueblogg['date'] ?>
						</span>
					</div>
				</div>
				
				<?php } ?>
            </div>
        </div>
    </div>
</div>


<?php include('includes/front_footer.php'); ?>
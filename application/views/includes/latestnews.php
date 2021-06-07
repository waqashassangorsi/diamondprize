<style>
    .blog-image img{
        width: 100%;
        height: 270px;
    }
</style>
        <div class="blog-grid home-blog">
            <div class="row">
                <?php foreach($blog as $key => $valueblog){ ?>
                <!-- Start single blog -->
                <div class="col-md-4 col-sm-6 col-12 ">
                    <div class="single-blog">
                        <div class="blog-image">
                            <a class="image-scale" href="<?php echo SURL.'Blog/singleblog/'.$valueblog['id'] ?>">
                                <img src="<?php echo $valueblog['image'] ?>" alt="image Error">
                            </a>
                        </div>
                        <div class="blog-content">
                            <div class="blog-category">
                                <span><?php echo $valueblog['title'] ?></span>
                            </div>
                            <div class="blog-meta">
                                <span class="admin-type">
                                    <i class="fa fa-user"></i>
                                    Admin
                                </span>
                                <span class="date-type">
                                    <i class="fa fa-calendar"></i>
                                    <?php echo $valueblog['date'] ?>
                                </span>
                            </div>
                            <div class="blog-title">   
                                <a href="<?php echo SURL.'Blog/singleblog/'.$valueblog['id'] ?>">
                                    <h4><?php echo $valueblog['heading'] ?></h4>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <!-- End single blog -->
            </div>
        </div>
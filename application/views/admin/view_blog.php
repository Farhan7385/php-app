<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php
        if($b_des)
        {
        foreach ($b_des as $lb)
        {?><meta name="description" content="<?php echo $lb->metad; ?>"/>
    <link rel="canonical" href="<?php echo base_url($lb->url);?>" />
                    <?php
                                }
                            }
                    ?>
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url();?>assets/front/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/front/css/custom.css" />
<?php
        if($b_des)
        {
        foreach ($b_des as $lb)
        {?><title><?php echo ucfirst($lb->title)."  : ComingWeek";?></title>
                    <?php
                                }
                            }
                    ?>
</head>
<body>
<!-- Header Html start -->
<header class="cw_header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo base_url('admin-home');?>">CW</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto justify-content-end">                            
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url('admin-blog'); ?>" title="Go Back">Go Back</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<!-- Header Html end -->
<section class="cw_blog_sec">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="cw_blog_box">
                <?php
                    if($b_des)
                            {
                                foreach ($b_des as $lb)
                                {
                                   
                    ?>
                    <h1 class="cw_head_h1"><?php echo $lb->title; ?></h1>
                                        <?php
                                            if(($lb->upload != '') && (!empty($lb->upload)))
                                            {
                                                ?>
                                                <img src="<?php echo base_url(); ?>assets/uploads/<?php echo $lb->upload;?>" alt="<?php echo $lb->alt; ?>" style="width: 848px;height: 449px"/>
                                                <?php
                                            }
                                            elseif(($lb->img_url != '') && (!empty($lb->img_url)))
                                            {
                                                ?>
                                                <img src="<?php echo $lb->img_url;?>" alt="<?php echo $lb->alt; ?>" style="width: 848px;height: 449px"/>
                                                <?php
                                            }
                                            else
                                            {
                                                ?>
                                                <a class="blog-small-preview mouseover-1" href="#">
                                                    <h3 style="color: white;padding: 20px;">No Image Uploaded</h3>
                                                </a>
                                                <?php
                                            }
                                        ?>
                
                    <p><?php echo $lb->description;?></p>
                    <?php
                            }
                        }
                    ?>                
                </div>
            
                    <h4 class="cw_head_h4">Related Blogs</h4>
                    <div class="row">
                        
                    </div> 
            
            </div>
            <div class="col-md-3">
                <div class="cw_blog_right">
                    <h4 class="cw_head_h4">Popular Blogs</h4>
                </div>  
            </div>
        </div>
    </div>
</section>
<footer class="cv_footer_sec">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <p>
                    <span>© 2016 All rights reserved</span>
                    <a href="<?php echo base_url('sitemap');?>" target="_blank" title="Sitemap">Sitemap |</a>
                    <a href="<?php echo base_url('privacy-policy');?>" title="Privacy Policy">Privacy Policy |</a>
                    <a href="<?php echo base_url('disclaimer');?>" title="Disclaimer">Disclaimer |</a>
                    <a href="<?php echo base_url('terms-and-conditions');?>" title="Terms and Conditions">Terms and Conditions</a>
                </p>
            </div>
            <div class="col-md-3">
                <div class="cv_social_box d-flex justify-content-end">
                    <a class="d-flex align-items-center justify-content-center" href="#" title=""><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    <a class="d-flex align-items-center justify-content-center" href="#" title=""><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    
                    <a class="d-flex align-items-center justify-content-center" href="#" title=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a class="d-flex align-items-center justify-content-center" href="#" title=""><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="<?php echo base_url();?>assets/front/js/jquery-3.2.1.slim.min.js"></script>
<!-- <script src="js/popper.min.js"></script> -->
<script src="<?php echo base_url();?>assets/front/js/bootstrap.min.js"></script>
<script>
$(window).scroll(function(){
    if ($(this).scrollTop() > 50) {
       $('.cw_header').addClass('cw_header_fixed');
    } else {
       $('.cw_header').removeClass('cw_header_fixed');
    }
});
</script>
</body>
</html>

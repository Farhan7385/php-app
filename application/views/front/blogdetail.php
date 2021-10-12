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
    <link rel="canonical" href="<?php echo base_url('in/'.$name.'/'.$lb->url);?>" />
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
<?php
    include('header.php');
?>
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
                                                <img src="<?php echo base_url(); ?>assets/uploads/<?php echo $lb->upload;?>" alt="<?php echo $lb->alt; ?>"/>
                                                <?php
                                            }
                                            elseif(($lb->img_url != '') && (!empty($lb->img_url)))
                                            {
                                                ?>
                                                <img src="<?php echo $lb->img_url;?>" alt="<?php echo $lb->alt; ?>"/>
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
                                         echo $lb->description;
                            }

                            $bid = $lb->id;
                            $mid = $lb->menu_id;
                            $related_blog = $this->front_model->related_blogs($bid,$mid);
                        }
                    ?>                
                </div>
            
                    <h4 class="cw_head_h4">Related Blogs</h4>
                    <div class="row">
                        <?php
                        if($related_blog)
                        {
                            foreach($related_blog as $rb)
                                {
                                    $menu_id = $rb->menu_id;
                                    $name = $this->front_model->getMenuName($menu_id);
                        ?>
                        <div class="col-sm-6">
                            <div class="blog-small-entry size-2">
                                <a class="blog-small-preview mouseover-1" href="<?php echo base_url('in/'.$name->menu_name.'/'.$rb->url);?>">
                                    <?php 
                                        if(($rb->upload != '') && (!empty($rb->upload)))
                                        {
                                    ?>
                                    <img src="<?php echo base_url(); ?>assets/uploads/<?php echo $rb->upload;?>" alt="<?php echo $rb->alt; ?>">
                                    <?php
                                        }
                                        elseif(($rb->img_url != '') && (!empty($rb->img_url)))
                                        {
                                    ?>
                                    <img src="<?php echo $rb->img_url;?>" alt="<?php echo $rb->alt; ?>">
                                    <?php
                                        }
                                    ?>
                                </a>
                                <h3 class="cw_head_h3"><a href="<?php echo base_url('in/'.$name->menu_name.'/'.$rb->url);?>" class="text-dark"><?php echo $rb->title; ?></a></h3>
                                <?php print_r(substr($rb->description,0,270).'..');?>
                                <a class="cw_readMore" href="<?php echo base_url('in/'.$name->menu_name.'/'.$rb->url);?>" title="Read More">Read More</a>
                            </div>
                        </div>
                        <?php
                            }
                        }
                        ?>
                    </div> 
            
            </div>
            <div class="col-md-3">
                <div class="cw_blog_right">
                    <h4 class="cw_head_h4">Popular Blogs</h4>
                </div>
                        <?php
                            if($popular_blogs)
                            {
                                foreach($popular_blogs as $pb)
                                {
                                    $menu_id = $pb->menu_id;
                                    $name = $this->front_model->getMenuName($menu_id);
                                    //echo $name->menu_name;
                                    ?>
                                    <div class="cw_blog_right">
                                        <?php
                                            if(($pb->upload != '') && (!empty($pb->upload)))
                                            {
                                                ?>
                                                <a href="<?php echo base_url('in/'.$name->menu_name.'/'.$pb->url);?>">
                                                    <img src="<?php echo base_url(); ?>assets/uploads/<?php echo $pb->upload;?>" alt="<?php echo $pb->alt; ?>"/>
                                                </a>
                                                <?php
                                            }
                                            elseif(($pb->img_url != '') && (!empty($pb->img_url)))
                                            {
                                                ?>
                                                <a href="<?php echo base_url('in/'.$name->menu_name.'/'.$pb->url);?>">
                                                    <img src="<?php echo $pb->img_url;?>" alt="<?php echo $pb->alt; ?>"/>
                                                </a>
                                                <?php
                                            }
                                            else
                                            {
                                                ?>
                                                <a href="<?php echo base_url('in/'.$name->menu_name.'/'.$pb->url);?>">
                                                    <h3 style="color: white;padding: 20px;">No Image Uploaded</h3>
                                                </a>
                                                <?php
                                            }
                                        ?>
                                        <p><a href="<?php echo base_url('in/'.$name->menu_name.'/'.$pb->url);?>" class="text-dark"><?php echo $pb->title; ?></a></p>
                                    </div>
                                    <div class="blog-small-entry size-1">
                                        
                                        <div class="h6 blog-small-title"><span class="ht-2"></span></div>
                                    </div>
                                    <?php
                                }
                            }
                        ?>  
            </div>
        </div>
    </div>
</section>
<?php
    include('footer.php');
?>
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

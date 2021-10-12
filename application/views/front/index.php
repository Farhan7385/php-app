<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content=""/>

<link rel="canonical" href="<?php echo base_url();?>" />
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url();?>assets/front/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/front/css/custom.css" />
<title><?php echo $title;?></title>
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
                        if($homepage_blog)
                        {
                            foreach($homepage_blog as $hb)
                            {
                                $menu_id = $hb->menu_id;
                                $name = $this->front_model->getMenuName($menu_id);
                                
                                    if(($hb->upload != '') && (!empty($hb->upload)))
                                            {
                                                ?>
                                                <a class="blog-preview mouseover-1" href="<?php echo base_url('in/'.$name->menu_name.'/'.$hb->url);?>">
                                                    <img src="<?php echo base_url(); ?>assets/uploads/<?php echo $hb->upload;?>" alt="<?php echo $hb->alt; ?>"/>
                                                </a>
                                                <?php
                                            }
                                            elseif(($hb->img_url != '') && (!empty($hb->img_url)))
                                            {
                                                ?>
                                                <a class="blog-preview mouseover-1" href="<?php echo base_url('in/'.$name->menu_name.'/'.$hb->url);?>">
                                                    <img src="<?php echo $hb->img_url;?>" alt="<?php echo $hb->alt; ?>"/>
                                                </a>
                                                <?php
                                            }
                                            else
                                            {
                                                ?>
                                                <a class="blog-small-preview mouseover-1" href="<?php echo base_url('in/'.$name->menu_name.'/'.$hb->url);?>">
                                                    <h3 style="color: white;padding: 20px;">No Image Uploaded</h3>
                                                </a>
                                                <?php
                                            }
                                        ?>
                        <h1 class="cw_head_h1"><a href="<?php echo base_url('in/'.$name->menu_name.'/'.$hb->url);?>" class="text-dark"><?php echo $hb->title; ?></a></h1>
                        <?php print_r(substr($hb->description,0,270).'..');?>
                        <a class="cw_readMore" href="<?php echo base_url('in/'.$name->menu_name.'/'.$hb->url);?>" title="Read More">Read More</a>                    
                    <?php
                            }
                        }
                    ?>
                    </div>
                    <?php
                    if($latest_blogs)
                        {
                        $count = 0;
                            foreach($latest_blogs as $lb)
                            {
                                $menu_id = $lb->menu_id;
                                $name = $this->front_model->getMenuName($menu_id);
                                //echo $name->menu_name;
                                if($count % 2 == 0)
                                {
                                   ?>                                   
                                <div class="cw_blog_box">
                                    <div class="row">
                                        <div class="col-md-6 order-md-6">
                                            <?php
                                                if(($lb->upload != '') && (!empty($lb->upload)))
                                                {
                                                    ?>
                                                    <a class="blog-preview mouseover-1" href="<?php echo base_url('in/'.$name->menu_name.'/'.$lb->url);?>">
                                                        <img src="<?php echo base_url(); ?>assets/uploads/<?php echo $lb->upload;?>" alt="<?php echo $lb->alt; ?>">
                                                    </a>
                                                    <?php
                                                }
                                                elseif(($lb->img_url != '') && (!empty($lb->img_url)))
                                                {
                                                    ?>
                                                    <a class="blog-preview mouseover-1" href="<?php echo base_url('in/'.$name->menu_name.'/'.$lb->url);?>">
                                                        <img src="<?php echo $lb->img_url;?>" alt="<?php echo $lb->alt; ?>">
                                                    </a>
                                                    <?php
                                                }
                                                else
                                                {
                                                    ?>
                                                    <a class="blog-small-preview mouseover-1" href="<?php echo base_url('in/'.$name->menu_name.'/'.$lb->url);?>">
                                                        <h3 style="color: white;padding: 20px;">No Image Uploaded</h3>
                                                    </a>
                                                    <?php
                                                }
                                            ?>
                                        </div>
                                        <div class="col-md-6">
                                            <h3 class="cw_head_h3"><a href="<?php echo base_url('in/'.$name->menu_name.'/'.$lb->url);?>" class="text-dark"><?php echo $lb->title; ?></a></h3>
                                            <?php print_r(substr($lb->description,0,270).'..');?>
                                            <a class="cw_readMore" href="<?php echo base_url('in/'.$name->menu_name.'/'.$lb->url);?>" title="Read More">Read More</a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                }
                                else
                                {
                                ?>
                                <div class="cw_blog_box">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?php
                                            if(($lb->upload != '') && (!empty($lb->upload)))
                                            {
                                                ?>
                                                <a class="blog-preview mouseover-1" href="<?php echo base_url('in/'.$name->menu_name.'/'.$lb->url);?>">
                                                    <img src="<?php echo base_url(); ?>assets/uploads/<?php echo $lb->upload;?>" alt="<?php echo $lb->alt; ?>">
                                                </a>
                                                <?php
                                            }
                                            elseif(($lb->img_url != '') && (!empty($lb->img_url)))
                                            {
                                                ?>
                                                <a class="blog-preview mouseover-1" href="<?php echo base_url('in/'.$name->menu_name.'/'.$lb->url);?>">
                                                    <img src="<?php echo $lb->img_url;?>" alt="<?php echo $lb->alt; ?>">
                                                </a>
                                                <?php
                                            }
                                            else
                                            {
                                                ?>
                                                <a class="blog-small-preview mouseover-1" href="<?php echo base_url('in/'.$name->menu_name.'/'.$lb->url);?>">
                                                    <h3 style="color: white;padding: 20px;">No Image Uploaded</h3>
                                                </a>
                                                <?php
                                            }
                                        ?>
                                        </div>
                                        <div class="col-md-6">
                                            <h3 class="cw_head_h3"><a href="<?php echo base_url('in/'.$name->menu_name.'/'.$lb->url);?>" class="text-dark"><?php echo $lb->title; ?></a></h3>
                                            <?php print_r(substr($lb->description,0,270).'..');?>
                                            <a class="cw_readMore" href="<?php echo base_url('in/'.$name->menu_name.'/'.$lb->url);?>" title="Read More">Read More</a>
                                        </div>
                                    </div>
                                </div>
                                    <?php
                                }
                                $count++;
                            }
                    }
                    ?>                  
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

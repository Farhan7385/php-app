<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="<?php echo $titlename->metad;?>"/>

<link rel="canonical" href="<?php echo base_url('in/'.$name);?>" />
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url();?>assets/front/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/front/css/custom.css" />
<title><?php echo $titlename->title."  : ComingWeek";?></title>
</head>
<body>
<!-- Header Html start -->
<?php
include('header.php');
?>
<!-- Header Html end -->
<section class="cw_blog_sec">
    <div class="container">
        <input type="hidden" name="mname" id="mname" value="<?php echo $this->uri->segment(2);?>">
        <input type="hidden" name="limit" id="limit" value="<?php echo $limit;?>">
        <div class="row">
            <div class="col-md-9">      
                    <?php
                    if($b_list)
                        {
                    
                        $count = 0;
                            foreach($b_list as $lb)
                            {
                                if($count % 2 == 0)
                                {
                                   ?>
                                   <div class="cw_blog_box load-data-wrap blog_box" data-id="<?php echo $lb->bid; ?>"> 
                                    <div class="row">
                                        <div class="col-md-6 order-md-6">
                                            <?php
                                                if(($lb->upload != '') && (!empty($lb->upload)))
                                                {
                                                    ?>
                                                    <a class="blog-preview mouseover-1" href="<?php echo base_url('in/'.$name.'/'.$lb->url);?>">
                                                        <img src="<?php echo base_url(); ?>assets/uploads/<?php echo $lb->upload;?>" alt="<?php echo $lb->alt; ?>">
                                                    </a>
                                                    <?php
                                                }
                                                elseif(($lb->img_url != '') && (!empty($lb->img_url)))
                                                {
                                                    ?>
                                                    <a class="blog-preview mouseover-1" href="<?php echo base_url('in/'.$name.'/'.$lb->url);?>">
                                                        <img src="<?php echo $lb->img_url;?>" alt="<?php echo $lb->alt; ?>">
                                                    </a>
                                                    <?php
                                                }
                                                else
                                                {
                                                    ?>
                                                    <a class="blog-small-preview mouseover-1" href="<?php echo base_url('in/'.$name.'/'.$lb->url);?>">
                                                        <h3 style="color: white;padding: 20px;">No Image Uploaded</h3>
                                                    </a>                                                
                                                    <?php
                                                }
                                            ?>
                                        </div>
                                        <div class="col-md-6">
                                            <h3 class="cw_head_h3"><a href="<?php echo base_url('in/'.$name.'/'.$lb->url);?>" class="text-dark"><?php echo $lb->title; ?></a></h3>
                                            <?php print_r(substr($lb->description,0,270).'..');?>
                                            <a class="cw_readMore" href="<?php echo base_url('in/'.$name.'/'.$lb->url);?>" title="Read More">Read More</a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                }
                                else
                                {
                                ?>          
                                <div class="cw_blog_box load-data-wrap blog_box" data-id="<?php echo $lb->bid; ?>">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?php
                                                if(($lb->upload != '') && (!empty($lb->upload)))
                                                {
                                                    ?>
                                                    <a class="blog-preview mouseover-1" href="<?php echo base_url('in/'.$name.'/'.$lb->url);?>">
                                                        <img src="<?php echo base_url(); ?>assets/uploads/<?php echo $lb->upload;?>" alt="<?php echo $lb->alt; ?>">
                                                    </a>
                                                    <?php
                                                }
                                                elseif(($lb->img_url != '') && (!empty($lb->img_url)))
                                                {
                                                    ?>
                                                    <a class="blog-preview mouseover-1" href="<?php echo base_url('in/'.$name.'/'.$lb->url);?>">
                                                        <img src="<?php echo $lb->img_url;?>" alt="<?php echo $lb->alt; ?>">
                                                    </a>
                                                    <?php
                                                }
                                                else
                                                {
                                                    ?>
                                                    <a class="blog-small-preview mouseover-1" href="<?php echo base_url('in/'.$name.'/'.$lb->url);?>">
                                                        <h3 style="color: white;padding: 20px;">No Image Uploaded</h3>
                                                    </a>
                                                    <?php
                                                }
                                            ?>
                                        </div>
                                        <div class="col-md-6">
                                            <h3 class="cw_head_h3"><a href="<?php echo base_url('in/'.$name.'/'.$lb->url);?>" class="text-dark"><?php echo $lb->title; ?></a></h3>
                                            <?php print_r(substr($lb->description,0,270).'..');?>
                                            <a class="cw_readMore" href="<?php echo base_url('in/'.$name.'/'.$lb->url);?>" title="Read More">Read More</a>
                                        </div>
                                    </div>
                                </div>
                                    <?php
                                }
                                $count++;                                
                            }
                    }
                    ?>                    
                   
                    <div class="pager text-center">
                        <a href="javascript:void(0)" class="cw_readMore load_more_but">Load More</a>
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
<script src="<?php echo base_url();?>assets/front/js/jquery.min.js"></script>
<script>
var base_url = "<?php echo base_url();?>";
            $(document).ready(function () {
               $('.load_more_but').click(function() {
                //debugger;
                        var blog_id = $(".blog_box:last").data("id");
                        var mname = $("#mname").val();
                        var limit = $("#limit").val();                    
                        $.ajax({
                            type: "POST",
                            url: base_url + 'front-load_blog',
                            data: {blog_id: blog_id,mname:mname,limit:limit},
                            cache: false,
                            dataType: 'json',
                            success: function (data) {
                                console.log(data.result);
                                if (data.result == "Success") {
                                    if(data.page)
                                    {                                       
                                      $(".blog_box:last").after(data.page);
                                    }
                                    else
                                    {
                                      $(".load_more_but").hide();
                                    }
                                } 
                                else {
                                     $(".load_more_but").hide();
                                }
                            }
                        });
                });
            });
</script>
</body>
</html>

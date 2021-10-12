<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content=""/>

<link rel="canonical" href="<?php echo base_url('disclaimer');?>" />
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
            <div class="container">
            <div class="row m-3">
                <div class="col-md-12 text-center">
                    <article class="sa">
                        <h1 class="cw_head_h1">Disclaimer</h1>
                        <p>Et harum quidem rerum facilis est et expedita distinctio.</p>
                    </article>
                </div>
            </div>

            <div class="row m-4">
                <div class="col-sm-12 col-xs-b30 col-sm-b0">
                    <h3>Lorem ipsum dolor sit amet placerat blandit. </h3>
                    <div class="sa">
                        <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae  et Praesent finibus quis magna et vitae eleifend. Sed venenatis sed mi nec condimentum. Nam  bibendum sed tortor. Curabitur sit amet turpis nulla. Etiam in tellus pharetra. Nullam ante velit, finibus quis tellus a, facilisis mattis erat. Cras nulla ex, viverra ut metus sit amet, et porta malesuada enim. Ut condimentum tortor id augue auctor, ut condimentum massa fermentum.</p>
                        <p>Cras tincidunt mattis convallis. Sed consequat feugiat leo, ac ultricies felis auctor sit amet. Ut lacinia interdum lacus, nun Aenean pellentesque neque at luctus suscipit. In sagittis justo eu nibh pharetra tempus. Ut tincidunt erat at nunc dolor sit venenatis, quis consequat nibh interdum maecenas molestie.</p>
                    </div>                    
                </div>
            </div>    
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

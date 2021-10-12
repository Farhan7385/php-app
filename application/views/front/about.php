<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content=""/>

<link rel="canonical" href="<?php echo base_url('about');?>" />
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
            <div class="col-md-12 text-center">
                <h1 class="cw_head_h1">Explore what we can offer for you</h1>         
            </div>
            <div class="container">
            <div class="row m-3">
                <div class="col-md-12 text-center">
                    <article class="sa">
                        <h3>Our services</h3>
                        <p>Et harum quidem rerum facilis est et expedita distinctio.</p>
                    </article>
                </div>
            </div>
            <div class="services-shortcode-1 mb-4">                
                <div class="content">
                    <div class="align">
                        <div class="sl">Design / Web Design</div>
                        <div class="sa">
                            <h4 class="h4 title">Creative ideas and new trends</h4>
                            <p>Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab ill inventore veritatis et quasi architecto beatae vita dicta sunt, explicabo.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="services-shortcode-1 style-1 mb-4">
                <div class="content">
                    <div class="align">
                        <div class="sl">Design / Branding</div>
                        <div class="sa">
                            <h4 class="h4 title">Marketing and modern brands</h4>
                            <p>Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab ill inventore veritatis et quasi architecto beatae vita dicta sunt, explicabo.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="services-shortcode-1 mb-4">
                <div class="content">
                    <div class="align">
                        <div class="sl">Graphic design / Illustration </div>
                        <div class="sa">
                            <h4 class="h4 title">Unite of Graphic and Design</h4>
                            <p>Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab ill inventore veritatis et quasi architecto beatae vita dicta sunt, explicabo.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="services-shortcode-1 style-1 mb-4">
                <div class="content">
                    <div class="align">
                        <div class="sl">Typography / Branding</div>
                        <div class="sa">
                            <h4 class="h4 title">Posters and Art Typography</h4>
                            <p>Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab ill inventore veritatis et quasi architecto beatae vita dicta sunt, explicabo.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row m-4">
                <div class="col-md-12 text-center">
                    <article class="sa">
                        <h3>What we can offer</h3>
                        <p>Nemo enim ipsam voluptatem, quia voluptas sit</p>
                    </article>
                </div>
            </div>
            <div class="row  mb-3">
                <div class="col-sm-4">
                    <div class="services-shortcode-2">
                        <div class="sl">Design / Branding</div>
                        <div class="content">
                            <div class="sa middle">
                                <h6>Development process</h6>
                                <p>Lorem ipsum dolor sit amet, amit consecte tur adipiscing elit, sed do eiusmod tempor incididunt ut sit labore et dolore magna.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="services-shortcode-2">
                        <div class="sl">Design / Branding</div>
                        <div class="content">
                            <div class="sa middle">
                                <h6>Development process</h6>
                                <p>Lorem ipsum dolor sit amet, amit consecte tur adipiscing elit, sed do eiusmod tempor incididunt ut sit labore et dolore magna.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="services-shortcode-2">
                        <div class="sl">Design / Branding</div>
                        <div class="content">
                            <div class="sa middle">
                                <h6>Development process</h6>
                                <p>Lorem ipsum dolor sit amet, amit consecte tur adipiscing elit, sed do eiusmod tempor incididunt ut sit labore et dolore magna.</p>
                            </div>
                        </div>
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

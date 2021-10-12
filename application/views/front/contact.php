<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content=""/>

<link rel="canonical" href="<?php echo base_url('contact');?>" />
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
<?php
if(($this->session->flashdata('message')) && ($this->session->flashdata('message') != ""))
{
echo "<h2 style='color:#16e230;text-align: center;font-size: x-large;font-weight: bolder;'>".$this->session->flashdata('message')."</h2>"; 
}   
?>  
            <div class="row m-3">
                <div class="col-md-12 text-center">
                    <article class="sa">
                        <h1 class="cw_head_h1">Contact Us</h1>
                        <p>Et harum quidem rerum facilis est et expedita distinctio.</p>
                    </article>
                </div>
            </div>

            <div class="row mt-5 text-center">
                <div class="col-sm-4">
                    <div class="contact-shortcode">
                        <h6 class="h6">Telephone :</h6>
                        <div class="sa"><a href="tel:+6264604061" class="text-dark">+626 460 4061</a></div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="contact-shortcode">
                        <h6 class="h6">Address :</h6>
                        <div class="sa text-dark">350 West Erie Street</div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="contact-shortcode">
                        <h6 class="h6">Email :</h6>
                        <div class="sa"><a href="mailto:hello@creative.com" class="text-dark">hello@creative.com</a></div>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-md-12 text-center">
                    <article class="sa">
                        <h3>Have Any Questions?</h3>
                        <p>Et harum quidem rerum facilis est et expedita distinctio.</p>
                    </article>
                    <div class="empty-space col-xs-b25 col-sm-b50"></div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-sm-2"></div>
                <div class="col-sm-10 col-xs-b30 col-sm-b0">
                    <form method="post" action="<?php echo base_url('insert-contact');?>">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="simple-input-wrapper">
                                    <input class="form-control-plaintext" value="" type="text" placeholder="Name" name="name" id="name" required="" />
                                    <span></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="simple-input-wrapper">
                                    <input class="form-control-plaintext" value="" type="text" placeholder="Email" name="email" id="email" required="" />
                                    <span></span>
                                </div>
                            </div>
                        </div>
                        <div class="simple-input-wrapper">
                            <input class="form-control-plaintext" value="" type="text" placeholder="Subject" name="subject" id="subject" required="" />
                            <span></span>
                        </div>
                        <div class="simple-input-wrapper">
                            <textarea class="form-control-plaintext" placeholder="Type your text" name="message" id="message" required=""></textarea>
                            <span></span>
                        </div>
                        <button type="submit" class="btn btn-dark mt-3">Sign in</button>
                    </form>                    
                </div>
                <div class="col-sm-2"></div>
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

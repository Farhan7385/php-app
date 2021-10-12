<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url();?>assets/back/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/back/css/custom.css" />
<title><?php echo $title;?></title>
</head>
<body>
<!-- Header Html start -->
<header class="cw_header">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="<?php echo base_url();?>">CW</a>
    
    
    </div>
  </nav>
</header>
<!-- Header Html end -->
<section class="cw_blog_sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
<form class="form-signin" name="admin_login" id="admin_login" method="post" action="admin-check_signin">
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
  <span id="emailErr" class="text-danger"></span>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
  <span id="passwordErr" class="text-danger"></span>
    </div>
  </div>

 
  <div class="form-group row">
    <div class="col-sm-10">
      <button class="btn btn-primary" type="submit" name="sign_in" id="sign_in">Sign in</button>
    </div>
  </div>
</form>
<?php
if(($this->session->flashdata('message')) && ($this->session->flashdata('message') != ""))
{
echo "<h2 style='color:#28caba;'>".$this->session->flashdata('message')."</h2>"; 
}   
?>
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
<script src="<?php echo base_url();?>assets/back/js/jquery-3.2.1.slim.min.js"></script>
<!-- <script src="js/popper.min.js"></script> -->
<script src="<?php echo base_url();?>assets/back/js/bootstrap.min.js"></script>
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

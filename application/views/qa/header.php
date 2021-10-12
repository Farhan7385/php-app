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
<!-- DataTables -->
    <link href="<?php echo base_url();?>assets/back/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/back/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<title><?php echo $title;?></title>
</head>
<body>
<!-- Header Html start -->
<header class="cw_header">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="<?php echo base_url('qa-emp');?>">CW</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto justify-content-end">
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url('qa-emp');?>" title="Home">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url('qa-signout');?>" title="Sign Out">Sign Out</a></li>
        </ul>
      </div>
    </div>
  </nav>
</header>
<div class="row">
  <div class="col-md-12">
  <div class="text-center">
<?php
if(($this->session->flashdata('message')) && ($this->session->flashdata('message') != ""))
{
echo "<h2 style='color:#28caba;'>".$this->session->flashdata('message')."</h2>"; 
}   
?>
  </div>
  </div>
</div>
<section class="cw_blog_sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
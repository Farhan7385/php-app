		</div>
	</div>
</section>
<footer class="cv_footer_sec">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-9">
				<p>
					<span>© 2016 All rights reserved</span>
					<!-- <a href="#" title="Sitemap">Sitemap |</a>
					<a href="#" title="Privacy Policy">Privacy Policy |</a>
					<a href="#" title="Disclaimer">Disclaimer |</a>
					<a href="#" title="Terms and Conditions">Terms and Conditions</a> -->
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
<!-- jQuery library -->
<script src="<?php echo base_url();?>assets/back/js/jquery.min.js"></script>
<!-- Required datatable js -->
<script src="<?php echo base_url();?>assets/back/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/back/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#datatable').DataTable();
});
</script>
<script src="<?php echo base_url();?>assets/back/js/front_ajax.js"></script>
</body>
</html>
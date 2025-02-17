<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Footer -->
<footer class="text-center text-lg-start text-muted mt-3" style="background-color: #f5f5f5;">
	<!-- Section: Links  -->
	<section class="">
		<div class="container text-center text-md-start pt-4 pb-4">
			<!-- Grid row -->
			<div class="row mt-3">
				<!-- Grid column -->
				<div class="col-12 col-lg-3 col-sm-12 mb-2">
					<!-- Content -->
					<a href="https://mdbootstrap.com/" target="_blank" class="">
						<img src="https://www.ttczoersel.be/img/mainicon.gif" height="35" />
					</a>
					<p class="mt-2 text-dark">
						TTC Zoersel
					</p>
				</div>
				<!-- Grid column -->

				<!-- Grid column -->
				<div class="col-6 col-sm-4 col-lg-4">
					<!-- Links -->
					<h6 class="text-uppercase text-dark fw-bold mb-2">
						TTC Zoersel
					</h6>
					<ul class="list-unstyled mb-4">
						<li><a class="text-muted" href="https://www.ttczoersel.be/">Onze website</a></li>
					</ul>
				</div>
				<!-- Grid column -->

				<!-- Grid column -->
				<div class="col-12 col-sm-12 col-lg-4">
					<!-- Links -->
					<h6 class="text-uppercase text-dark fw-bold mb-2">Vragen ? </h6>
					<p class="text-muted">Je kan ons altijd bereiken op het volgende e-mail adres <br> wijnwafel@ttczoersel.be</p>

				</div>
				<!-- Grid column -->
			</div>
			<!-- Grid row -->
		</div>
	</section>
</footer>
<!-- Footer -->
<!-- jquery -->
<script type="text/javascript" src="<?=  base_url('assets/js/jquery.min.js') ?>"></script>
<!-- popper -->
<script type="text/javascript" src="<?=  base_url('assets/js/popper.min.js') ?>"></script>
<!-- bootstrap -->
<script type="text/javascript" src="<?=  base_url('assets/js/bootstrap.min.js') ?>"></script>
<!-- MDB -->
<script type="text/javascript" src="<?=  base_url('assets/js/mdb.min.js') ?>"></script>
<!-- Toaster -->
<script type="text/javascript" src="<?=  base_url('assets/js/toaster.js') ?>"></script>
<!-- Custom scripts -->
<script type="text/javascript" src="<?=  base_url('assets/js/main.js') ?>"></script>
<script>
	$( document ).ready(function() {

		const messageToShow = '<?php echo $message ?>';

		!!messageToShow && Toaster.toast(messageToShow, {
			color: '#28a745',
			autoClose: true,
			autoCloseDelay: 4000,
			position: 'right-bottom'
		});
	});
</script>
</body>
</html>

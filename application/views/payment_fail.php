<?php
/**
 * Created by PhpStorm
 * User: ewout
 * Date: 22.07.23
 * Time: 13:26
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!--Section: Content-->
<section class="text-center px-md-5 mx-md-5 dark-grey-text">

	<div class="row mb-5">
		<div class="col-md-4 mx-auto">
			<div class="view mb-4 pb-2">
				<img src="<?php echo base_url('assets/images/error.svg'); ?>" class="img-fluid" alt="smaple image">
			</div>
		</div>
	</div>

	<h3 class="font-weight-bold mb-4 pb-2">Er is iets foutgelopen met de betaling!</h3>

	<p class="text-center mx-auto mb-4 pb-2">Gelieve opnieuw te proberen.</p>

	<a href="<?php echo base_url('/order'); ?>" class="btn btn-primary">Terug naar mijn bestelling</a>

</section>

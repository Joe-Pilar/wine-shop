<?php
/**
 * Created by PhpStorm
 * User: ewout
 * Date: 22.07.23
 * Time: 13:26
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section class="py-5">
	<div class="container">
		<div class="row gx-5">
			<aside class="col-lg-6">
				<div class="border rounded-4 mb-3 d-flex justify-content-center">
					<a data-fslightbox="mygalley" class="rounded-4">
						<img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit" src="<?php echo base_url($product['primary_image']) ?>" />
					</a>
				</div>
				<?php if(!empty($product['extra_images'])) {  ?>
				<div class="d-flex justify-content-center mb-3">
					<a data-fslightbox="mygalley" class="border mx-1 rounded-2" class="item-thumb">
						<img width="60" height="60" class="rounded-2" src="<?php echo base_url($product['primary_image']) ?>" />
					</a>

				<?php foreach ($product['extra_images'] as $image) { ?>
					<a data-fslightbox="mygalley" class="border mx-1 rounded-2" class="item-thumb">
						<img width="60" height="60" class="rounded-2" src="<?php echo base_url($image) ?>" />
					</a>
				<?php } ?>
				</div>
			<?php } ?>
			</aside>
			<main class="col-lg-6">
				<div class="ps-lg-3">
					<h4 class="title text-dark">
						<?php echo $product['name'] ?>
					</h4>

					<div class="mb-3">
						<span class="h5">€ <?php echo  number_format($product['price'] / 100, 2, ',') ?></span>
					</div>

					<p>
						<?php echo $product['description'] ?>
					</p>

					<hr />

					<form method="post" action="<?php echo base_url("product/additem")?>">
						<div class="row mb-4">
							<!-- col.// -->
							<div class="col-md-4 col-6 mb-3">
								<label class="mb-2 d-block">Aantal</label>
								<div class="def-number-input number-input safari_only">
									<button role="button" type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
									<input class="quantity" min="1" name="amount" value="1" type="number">
									<button role="button" type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
								</div>
							</div>
						</div>
						<input type="hidden" name="productid" id="productid" value="<?php echo $product['id'] ?>">
						<button type="submit" class="btn btn-primary shadow-0"><i class="me-1 fa fa-shopping-basket"></i> Toevoegen aan bestelling</button>
					</form>
				</div>
			</main>
		</div>
	</div>
</section>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Jumbotron -->
<div class="bg-primary text-white py-5">
	<div class="container py-5">
		<h1>
			Wijn- en wafelverkoop TTC Zoersel
		</h1>
		<p>
			Plaats hier je bestelling en steun zo de werking van onze club!
		</p>
	</div>
</div>
<!-- Jumbotron -->
<section>

<?php foreach($categories as $cat) { ?>
	<div class="container my-5">
		<header class="mb-4">
			<h3><?php echo $cat['name'] ?></h3>
		</header>
		<div class="row">
		<?php foreach($cat['products'] as $product) { ?>

			<div class="col-xl-4 col-md-6 col-sm-6 d-flex product-col">
				<div class="card w-100 my-2 shadow-2-strong">
					<a href="<?php
					echo base_url("product/{$product['id']}") ?>">
						<img class="main-row-img" src="<?php
						echo base_url($product['image']) ?>">
					</a>
					<div class="card-body d-flex flex-column w-100">
						<a href="<?php
						echo base_url("product/{$product['id']}") ?>">
							<h5 class="card-title"><?php
								echo $product['name'] ?></h5>
							<p class="card-text">€ <?php
								echo number_format($product['price'] / 100, 2, ',') ?></p>
						</a>
						<form method="post" action="<?php echo base_url("product/additem")?>">
						<div class="card-footer d-flex align-items-center pt-3 px-0 pb-0 mt-auto">
							<div class="def-number-input number-input safari_only">
								<button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
								<input class="quantity" min="1" name="amount" value="1" type="number">
								<button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
							</div>
							<input type="hidden" name="productid" value="<?php echo $product['id'] ?>">
							<input type="hidden" name="redirect" value="home">
							<button type="submit" class="btn btn-primary shadow-0 me-1 add-to-cart-card">Toevoegen</button>
						</div>
						</form>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
	<?php } ?>
</section>
<!-- Products -->

<!-- Feature -->
<section class="mt-5" style="background-color: #f5f5f5;">
	<div class="container text-dark pt-3">
		<header class="pt-4 pb-3">
			<h3>Hoe werkt het ?</h3>
		</header>

		<div class="row mb-4" style="align-items: baseline;">
			<!-- col // -->
			<div class="col-lg-4 col-md-6">
				<figure class="d-flex align-items-center mb-4">
          <span class="rounded-circle bg-white p-3 d-flex me-2 mb-2">
            <i class="fas fa-star fa-2x fa-fw text-primary floating"></i>
          </span>
					<figcaption class="info">
						<h6 class="title">Topkwaliteit</h6>
						<p>Wij werken samen met topleveranciers om zo geweldige wijnen aan te bieden!</p>
					</figcaption>
				</figure>
				<!-- itemside // -->
			</div>
			<!-- col // -->
			<div class="col-lg-4 col-md-6">
				<figure class="d-flex align-items-center mb-4">
          <span class="rounded-circle bg-white p-3 d-flex me-2 mb-2">
            <i class="fas fa-thumbs-up fa-2x fa-fw text-primary floating"></i>
          </span>
					<figcaption class="info">
						<h6 class="title">Steun de club!</h6>
						<p>De winst van onze verkoop wordt integraal gebruikt om de werking van de club te verbeteren.</p>
					</figcaption>
				</figure>
				<!-- itemside // -->
			</div>
			<!-- col // -->
			<div class="col-lg-4 col-md-6">
				<figure class="d-flex align-items-center mb-4">
          <span class="rounded-circle bg-white p-3 d-flex me-2 mb-2">
            <i class="fas fa-box fa-2x fa-fw text-primary floating"></i>
          </span>
					<figcaption class="info">
						<h6 class="title">Levering</h6>
						<p>Je kan ervoor kiezen om zelf de bestelling te komen ophalen, of door de bestelling te laten brengen door het bestuur.</p>
					</figcaption>
				</figure>
				<!-- itemside // -->
			</div>
			<!-- col // -->
		</div>
	</div>
	<!-- container end.// -->
</section>
<!-- Feature -->

<style>
	@media (max-width: 766px) {
		.number-input {
			flex-direction: column-reverse;
			min-height: 100px;
		}

		button.minus, button.plus {
			width: 100% !important;
			height: 25px !important;
		}

		input.quantity {
			border-width: 1px !important;
		}
		.number-input.number-input {
			border: unset !important;
		}
	}
</style>
<!-- Blog -->

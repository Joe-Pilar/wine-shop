<!-- cart + summary -->
<section class="bg-light my-5">
	<div class="container">
		<div class="row">
			<!-- cart -->
			<div class="col-lg-9">
				<div class="card border shadow-0">
					<div class="m-4">
						<h4 class="card-title mb-4">Uw bestelling</h4>
						<?php if(!empty($subtotals)) { ?>
						<?php foreach ($subtotals as $subtotal) { ?>
						<div class="row gy-3 mb-4 a-center">
							<div class="col-lg-6">
								<div class="me-lg-5">
									<div class="d-flex a-center">
										<img src="<?php echo base_url($subtotal['primary_image']) ?>" class="border rounded me-3" style="width: 96px; height: 96px;" />
										<div class="ml-2">
											<a href="#" class=""><?php echo $subtotal['name'] ?></a>
											<p class="text-muted mb-0"><?php echo $subtotal['category_name'] ?></p>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6 col-7 d-flex flex-row flex-lg-column flex-xl-column text-nowrap a-center">

								<input class="form-control"  type="number" disabled style="width: 100%" value="<?php echo $subtotal['amount'] ?>">

								<div class="ml-1">
									<text class="h6">€ <?php echo number_format($subtotal['subtotal'] / 100, 2, ',') ?></text> <br />
									<small class="text-muted text-nowrap"> € <?php echo number_format($subtotal['price'] / 100, 2, ',') ?>/stuk </small>
								</div>
							</div>
							<div class="col-lg col-sm-3 col-3 d-flex justify-content-sm-center justify-content-md-start justify-content-lg-center justify-content-xl-end mb-2 a-center">
								<div class="float-md-end">
									<a href="<?php echo base_url("order/delete_item/{$subtotal['id']}") ?>" class="btn btn-danger icon-hover-danger">Verwijder</a>
								</div>
							</div>
						</div>
						<?php } ?>
						<?php } else {
							echo "Uw bestelling is nog leeg";
						} ?>
					</div>
				</div>
			</div>
			<!-- cart -->
			<!-- summary -->
			<div class="col-lg-3">
				<div class="card shadow-0 border">
					<div class="card-body">
						<div class="d-flex justify-content-between">
							<p class="mb-2">Totaal bestelling:</p>
							<?php if(!empty($cart)) { ?>
							<p class="mb-2">€ <?php echo number_format($cart->total / 100, 2, ',') ?></p>
							<?php } else { ?>
								<p class="mb-2">€ 0,00</p>
							<?php } ?>
						</div>
						<div class="mt-3">
							<a href="<?php echo base_url("order/checkout") ?>" class="btn btn-success w-100 shadow-0 mb-2 <?php if(empty($subtotals)) {
								echo 'disabled';
							} ?>"> Plaats bestelling </a>
							<a href="<?php echo base_url('home')?>" class="btn btn-light w-100 border mt-2"> Terug naar overzicht </a>
						</div>
					</div>
				</div>
			</div>
			<!-- summary -->
		</div>
	</div>
</section>
<!-- cart + summary -->

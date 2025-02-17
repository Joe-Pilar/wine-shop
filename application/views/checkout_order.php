<section class="bg-light py-5">
	<div class="container">
		<div class="row">
			<div class="col-xl-12 col-lg-12 mb-4">
				<!-- Checkout -->
				<form action="<?php echo base_url("order/create")?>" method="post">
				<div class="card shadow-0 border">
					<div class="p-4">
						<h5 class="card-title mb-3">Bestelling plaatsen</h5>
						<div class="row">
							<div class="col-6 mb-3">
								<p class="mb-0">Voornaam</p>
								<div class="form-outline">
									<input required name="firstname" type="text" id="typeText" placeholder="" class="form-control" />
								</div>
							</div>

							<div class="col-6">
								<p class="mb-0">Familienaam</p>
								<div class="form-outline">
									<input required name="lastname" type="text" id="typeText" placeholder="" class="form-control" />
								</div>
							</div>

							<div class="col-6 mb-3">
								<p class="mb-0">Telefoon</p>
								<div class="form-outline">
									<input required name="telephone" type="tel" id="typePhone" value="+32 " class="form-control" />
								</div>
							</div>

							<div class="col-6 mb-3">
								<p class="mb-0">E-mail</p>
								<div class="form-outline">
									<input required name="email" type="email" id="typeEmail" placeholder="example@gmail.com" class="form-control" />
								</div>
							</div>
						</div>

						<hr class="my-4" />

						<h5 class="card-title mb-3">Levering</h5>

						<div class="row mb-3">
							<div class="col-lg-6 mb-3">
								<!-- Default checked radio -->
								<div class="form-check h-100 border rounded-3">
									<div class="p-3">
										<input class="form-check-input" type="radio" name="home_delivery" id="home_delivery_radio" checked />
										<label class="form-check-label" for="flexRadioDefault1">
											Het bestuur bezorgt mijn bestelling thuis op 22 december 2023 aan het opgegeven adres <br />
										</label>
									</div>
								</div>
							</div>
							<div class="col-lg-6 mb-3">
								<!-- Default radio -->
								<div class="form-check h-100 border rounded-3">
									<div class="p-3">
										<input class="form-check-input" type="radio" name="self_pickup" id="self_pickup_radio" />
										<label class="form-check-label" for="flexRadioDefault2">
											Ik kom mijn bestelling zelf halen tussen 10:00 en 14:00 u<br />
										</label>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-8 mb-3">
								<p class="mb-0">Straat</p>
								<div class="form-outline">
									<input name="street" type="text" id="typeText" placeholder="" class="form-control" />
								</div>
							</div>
							<div class="col-sm-4 mb-3">
								<p class="mb-0">Huisnummer</p>
								<div class="form-outline">
									<input name="number" type="text" id="typeText" placeholder="" class="form-control" />
								</div>
							</div>


							<div class="col-sm-4 col-6 mb-3">
								<p class="mb-0">Postcode</p>
								<div class="form-outline">
									<input name="zip" type="text" id="typeText" class="form-control" />
								</div>
							</div>

							<div class="col-sm-4 mb-3">
								<p class="mb-0">Gemeente</p>
								<div class="form-outline">
									<input name="city" type="text" id="city" placeholder="" class="form-control" />
								</div>
							</div>
						</div>

						<div class="float-end">
							<input type="submit" class="btn btn-success" value="Verdergaan">
						</div>
					</div>
				</div>
				</form>
				<!-- Checkout -->
			</div>
		</div>
	</div>
</section>

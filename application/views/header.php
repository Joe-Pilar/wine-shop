<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta http-equiv="x-ua-compatible" content="ie=edge" />
	<title>Wijn- en Wafelverkoop TTC Zoersel</title>
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
	<!-- Google Fonts Roboto -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
	<!-- MDB -->
	<link rel="stylesheet" href="<?=  base_url('assets/css/mdb.min.css') ?>">
	<link rel="stylesheet" href="<?=  base_url('assets/css/addons/directives.min.css') ?>">
	<link rel="stylesheet" href="<?=  base_url('assets/css/addons/jquery.zmd.hierarchical-display.min.css') ?>">
	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?=  base_url('assets/css/bootstrap.css') ?>">
	<!-- Custom styles -->
	<link rel="stylesheet" href="<?=  base_url('assets/css/toaster.css') ?>">
	<link rel="stylesheet" href="<?=  base_url('assets/css/style.css') ?>">
</head>

<body>
<!--Main Navigation-->
<header>
	<!-- Navbar -->
	<nav class="navbar navbar-expand navbar-light bg-white">
		<!-- Container wrapper -->
		<div class="container justify-content-center justify-content-md-between">
			<!-- Toggle button -->
			<button
					class="navbar-toggler border py-2 text-dark"
					type="button"
					data-mdb-toggle="collapse"
					data-mdb-target="#navbarLeftAlignExample"
					aria-controls="navbarLeftAlignExample"
					aria-expanded="false"
					aria-label="Toggle navigation"
			>
				<i class="fas fa-bars"></i>
			</button>

			<!-- Collapsible wrapper -->
			<div class="collapse navbar-collapse" id="navbarLeftAlignExample">
				<!-- Left links -->
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link text-dark" aria-current="page" href="<?php echo base_url(); ?>">Home</a>
					</li>
				</ul>
				<!-- Left links -->
				<a href="<?php echo base_url('order') ?>" class="border rounded py-1 px-3 nav-link d-flex align-items-center shopping-cart-link"> <i class="fas fa-shopping-cart m-1 me-md-2"></i>
					<p class="d-none d-md-block mb-0 my-order-text">Mijn bestelling</p> &nbsp; <?php
					if (!empty($cart)) { ?><span class="badge badge-pill badge-warning">€ <?php
						echo number_format($cart->total / 100, 2, ','); ?></span><?php
					} ?>
				</a>
			</div>
		</div>
		<!-- Container wrapper -->
	</nav>
	<!-- Navbar -->
</header>

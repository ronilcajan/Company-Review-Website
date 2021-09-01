<?php
$current_page = $this->uri->segment(1);
$current_page1 = $this->uri->segment(2);
$user = $this->ion_auth->user()->row();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title><?= $title ?> | Oroquieta Evalutaion</title>

	<!-- Favicons -->
	<link href="<?= site_url() ?>assets/img/favicon.png" rel="icon">
	<link href="<?= site_url() ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<!-- Vendor CSS Files -->
	<link href="<?= site_url() ?>assets/vendor/aos/aos.css" rel="stylesheet">
	<link href="<?= site_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= site_url() ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="<?= site_url() ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="<?= site_url() ?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
	<link href="<?= site_url() ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
	<link href="<?= site_url() ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

	<!-- Template Main CSS File -->
	<link href="<?= site_url() ?>assets/css/style.css" rel="stylesheet">
	<link href="<?= site_url() ?>assets/css/custom.css" rel="stylesheet">
</head>

<body>
	<!-- ======= Header ======= -->
	<header id="header" class="fixed-top d-flex align-items-center border-bottom">
		<div class="container d-flex align-items-center justify-content-between">

			<div class="logo">
				<!-- <h1><a href="<?= site_url() ?>">Vesperr</a></h1> -->
				<!-- Uncomment below if you prefer to use an image logo -->
				<a href="<?= site_url() ?>"><img src="<?= site_url() ?>assets/img/apple-touch-icon.png" alt="" class="img-fluid"></a>
			</div>

			<nav id="navbar" class="navbar">
				<ul>
					<li><a class="nav-link <?= $current_page == '' ? 'active' : null ?>" href="<?= site_url() ?>">Home</a></li>
					<li><a class="nav-link <?= $current_page == 'about' ? 'active' : null ?>" href="<?= site_url('about') ?>">About Us</a></li>
					<li><a class="nav-link <?= $current_page == 'reviews' ? 'active' : null ?>" href="<?= site_url('reviews') ?>">Reviews</a></li>
					<li><a class="nav-link <?= $current_page == 'category' ? 'active' : null ?>" href="<?= site_url('category') ?>">Category</a></li>
					<li><a class="nav-link <?= $current_page == 'contact' ? 'active' : null ?>" href="<?= site_url('contact') ?>">Contact Us</a></li>
					<?php if ($this->ion_auth->logged_in()) : ?>
						<li class="dropdown"><a href="#" class="<?= $current_page1 == 'edit_user' ? 'active' : null ?>">
								<span>
									<?php if (empty($user->avatar)) : ?>
										<img src="<?= site_url() ?>assets/img/person.png" alt="" class="img-fluid rounded-circle" width="25" height="25">
									<?php else : ?>
										<img src="<?= site_url('assets/uploads/') . $user->avatar ?>" alt="" class="img-fluid rounded-circle" width="25" height="25">
									<?php endif ?>
									<?= $user->first_name . ' ' . $user->last_name ?>
								</span>
								<i class="bi bi-chevron-down"></i></a>
							<ul>
								<li><a href="<?= site_url('auth/edit_user/') . $user->id ?>" class="<?= $current_page1 == 'edit_user' ? 'active' : null ?>">Profile</a></li>
								<li><a href="<?= site_url('listing') ?>" class="<?= $current_page == 'listing' ? 'active' : null ?>">My Listing</a></li>
								<li><a class="text-danger" href="<?= site_url('auth/logout') ?>">Logout</a></li>
							</ul>
						</li>
					<?php else : ?>
						<li><a class="nav-link <?= $current_page1 == 'login' ? 'active' : null ?>" href="<?= site_url('auth/login') ?>">Login</a></li>
						<li><a class="getstarted" href="<?= site_url('auth/register') ?>">Register</a></li>
					<?php endif ?>

				</ul>
				<i class="bi bi-list mobile-nav-toggle"></i>
			</nav><!-- .navbar -->

		</div>
	</header><!-- End Header -->

	<?= $content ?>

	<!-- ======= Footer ======= -->
	<footer id="footer">
		<div class="container">
			<div class="row d-flex align-items-center">
				<div class="col-lg-12 text-lg-left text-center">
					<div class="copyright">
						&copy; Copyright <strong>Vesperr</strong>. All Rights Reserved
					</div>
					<div class="credits">
						<!-- All the links in the footer should remain intact. -->
						<!-- You can delete the links only if you purchased the pro version. -->
						<!-- Licensing information: https://bootstrapmade.com/license/ -->
						<!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/vesperr-free-bootstrap-template/ -->
					</div>
				</div>
			</div>
		</div>
	</footer><!-- End Footer -->

	<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

	<!-- Vendor JS Files -->
	<script src="<?= site_url() ?>assets/js/jquery.min.js"></script>
	<script src="<?= site_url() ?>assets/vendor/aos/aos.js"></script>
	<script src="<?= site_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?= site_url() ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
	<script src="<?= site_url() ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
	<script src="<?= site_url() ?>assets/vendor/purecounter/purecounter.js"></script>
	<script src="<?= site_url() ?>assets/vendor/swiper/swiper-bundle.min.js"></script>

	<!-- Template Main JS File -->
	<script src="<?= site_url() ?>assets/js/main.js"></script>
	<script src="<?= site_url() ?>assets/js/custom.js"></script>

</body>

</html>
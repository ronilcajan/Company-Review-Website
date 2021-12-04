<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

	<div class="container">
		<div class="row">
			<div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
				<h1 data-aos="fade-up">Business Reviews From The People Just Like You</h1>
				<h2 data-aos="fade-up" data-aos-delay="400">Reviews get you closer to your customers and empowr your business forward.</h2>
				<div data-aos="fade-up" data-aos-delay="800">
					<a href="#about" class="btn-get-started scrollto">Get Started</a>
				</div>
			</div>
			<div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
				<img src="<?= site_url() ?>assets/img/image001.png" class="img-fluid animated" alt="">
			</div>
		</div>
	</div>

</section><!-- End Hero -->
<main id="main">
	<!-- ======= About Us Section ======= -->
	<section id="about" class="about">
		<div class="container">

			<div class="section-title" data-aos="fade-up">
				<h2>About Us</h2>
			</div>

			<div class="row content">
				<div class="col-lg-6" data-aos="fade-up" data-aos-delay="150">
					<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
						magna aliqua.
					</p>
					<ul>
						<li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
						<li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in voluptate velit</li>
						<li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
					</ul>
				</div>
				<div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-up" data-aos-delay="300">
					<p>
						Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
						velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
						culpa qui officia deserunt mollit anim id est laborum.
					</p>
					<a href="#" class="btn-learn-more">Learn More</a>
				</div>
			</div>

		</div>
	</section><!-- End About Us Section -->

	<!-- ======= Counts Section ======= -->
	<section id="counts" class="counts">
		<div class="container">

			<div class="row">
				<div class="image col-xl-5 d-flex align-items-stretch justify-content-center justify-content-xl-start" data-aos="fade-right" data-aos-delay="150">
					<img src="assets/img/counts-img.svg" alt="" class="img-fluid">
				</div>

				<div class="col-xl-7 d-flex align-items-stretch pt-4 pt-xl-0" data-aos="fade-left" data-aos-delay="300">
					<div class="content d-flex flex-column justify-content-center">
						<div class="row">
							<div class="col-md-6 d-md-flex align-items-md-stretch">
								<div class="count-box">
									<i class="bi bi-emoji-smile"></i>
									<span data-purecounter-start="0" data-purecounter-end="65" data-purecounter-duration="1" class="purecounter"></span>
									<p><strong>Happy Clients</strong> consequuntur voluptas nostrum aliquid ipsam architecto ut.</p>
								</div>
							</div>

							<div class="col-md-6 d-md-flex align-items-md-stretch">
								<div class="count-box">
									<i class="bi bi-journal-richtext"></i>
									<span data-purecounter-start="0" data-purecounter-end="85" data-purecounter-duration="1" class="purecounter"></span>
									<p><strong>Projects</strong> adipisci atque cum quia aspernatur totam laudantium et quia dere tan</p>
								</div>
							</div>

							<div class="col-md-6 d-md-flex align-items-md-stretch">
								<div class="count-box">
									<i class="bi bi-clock"></i>
									<span data-purecounter-start="0" data-purecounter-end="18" data-purecounter-duration="1" class="purecounter"></span>
									<p><strong>Years of experience</strong> aut commodi quaerat modi aliquam nam ducimus aut voluptate non vel</p>
								</div>
							</div>

							<div class="col-md-6 d-md-flex align-items-md-stretch">
								<div class="count-box">
									<i class="bi bi-award"></i>
									<span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
									<p><strong>Awards</strong> rerum asperiores dolor alias quo reprehenderit eum et nemo pad der</p>
								</div>
							</div>
						</div>
					</div><!-- End .content-->
				</div>
			</div>

		</div>
	</section><!-- End Counts Section -->

	<!-- ======= Services Section ======= -->
	<section id="services" class="services">
		<div class="container">

			<div class="section-title" data-aos="fade-up">
				<h2>Categories</h2>
				<p>Magnam dolores commodi suscipit eius consequatur ex aliquid fug</p>
			</div>

			<div class="row">
				<?php foreach ($cat as $row) : ?>
					<div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-lg-0 mt-5">
						<div class="icon-box w-100" data-aos="fade-up" data-aos-delay="100">
							<div class="icon"><i class="bi bi-grid"></i></div>
							<h4 class="title"><a href="<?= site_url('category_info/') . $row['id'] ?>"><?= $row['name'] ?></a></h4>
							<p class="description"><?= $row['description'] ?></p>
						</div>
					</div>
				<?php endforeach ?>

			</div>

		</div>
	</section><!-- End Services Section -->

	<!-- ======= More Services Section ======= -->
	<section id="more-services" class="more-services">
		<div class="container">
			<div class="section-title" data-aos="fade-up">
				<h2>Establishment</h2>
				<p>Magnam dolores commodi suscipit eius consequatur ex aliquid fug</p>
			</div>
			<div class="row">
				<?php if ($estab) : ?>
					<?php foreach ($estab as $row) : ?>
						<?php $est_id = $row['id'];
						$query = $this->db->query('SELECT COUNT(review.id) as reviews, AVG(review.ratings) as rating FROM review WHERE `status`="Published" AND estab_id=' . $est_id . ' ');
						$result = $query->row(); ?>
						<div class="col-md-6 d-flex align-items-stretch mb-4">

							<div class="card" style='background-image: url("<?= $row['image'] ? site_url('assets/uploads/') . $row['image'] : site_url('assets/img/bg-abstract2.png') ?>");' data-aos="fade-up" data-aos-delay="100">

								<div class="card-body text-center">
									<img class="avatar-img rounded-circle mb-2" alt="user" src="<?= $row['logo'] ? site_url('assets/uploads/') . $row['logo'] : site_url('assets/img/person.png') ?>" width="60" />

									<h5 class="card-title mb-0"><a href="<?= site_url('establishment_info/') . $row['id'] ?>"> <?= $row['name'] ?></a></h5>
									<small><a class="text-muted" href="<?= site_url('category_info/') . $row['cat_id'] ?>"><?= $row['cat_name'] ?></a></small>
									<p class="card-text"><?= $row['desc'] ?></p>
									<?= display_skill_level(number_format($result->rating, 1)) ?><br>
									<small class="card-text text-center "> User Rating <?= number_format($result->rating, 1) ?> / 5.0</small>
								</div>

							</div>
						</div>
					<?php endforeach ?>
				<?php else : ?>
					<h4>No establishment</h4>
				<?php endif ?>
			</div>

		</div>
	</section><!-- End More Services Section -->

	<!-- ======= Testimonials Section ======= -->
	<section id="testimonials" class="testimonials section-bg">
		<div class="container">

			<div class="section-title" data-aos="fade-up">
				<h2>Customer Reviews</h2>
				<p>Magnam dolores commodi suscipit eum quidem consectetur velit</p>
			</div>

			<div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
				<div class="swiper-wrapper">
					<?php foreach ($reviews as $row) : ?>
						<div class="swiper-slide">
							<div class="testimonial-wrap">
								<div class="testimonial-item">
									<img src="<?= $row['avatar'] ? site_url('assets/uploads/') .  $row['avatar'] : site_url('assets/img/person.png') ?>" class="testimonial-img" alt="">
									<div class="row">
										<div class="col-md-8">
											<h3><?= $row['first_name'] . ' ' . $row['last_name'] ?></h3>
										</div>
										<div class="col-md-4 text-right">
											<?php $no = 1;
											while ($no <= 5) : ?>
												<?php if ($row['ratings'] >= $no) : ?>
													<i class="bi bi-star-fill" style="color:goldenrod"></i>
												<?php else : ?>
													<i class="bi bi-star-fill" style="color:black"></i>
												<?php endif ?>
											<?php $no++;
											endwhile ?>
											<h4>Rating <?= number_format($row['ratings'], 1) ?> / 5.0</h4>
										</div>
									</div>
									<h3>"<?= ucwords($row['title']) ?>"</h3>
									<p>
										<i class="bx bxs-quote-alt-left quote-icon-left"></i>
										<?= $row['details'] ?>
										<i class="bx bxs-quote-alt-right quote-icon-right"></i>
									</p>
									<small class="text-muted">Review Published: <?= date('F d, Y', strtotime($row['timestamp'])) ?></small>
								</div>
							</div>
						</div><!-- End testimonial item -->
					<?php endforeach ?>
				</div>
				<div class="swiper-pagination"></div>
			</div>

		</div>
	</section><!-- End Testimonials Section -->

	<!-- ======= More Services Section ======= -->
	<section id="more-services" class="more-services">
		<div class="container">
			<div class="section-title" data-aos="fade-up">
				<h2>HIGHEST REVIEWS</h2>
				<p>Based on the customers reviews</p>
			</div>
			<div class="row">
				<?php if ($estab) : ?>
					<?php foreach ($estab as $row) : ?>
						<?php $est_id = $row['id'];
						$query = $this->db->query('SELECT COUNT(review.id) as reviews, AVG(review.ratings) as rating FROM review WHERE `status`="Published" AND estab_id=' . $est_id . ' ');
						$result = $query->row(); ?>
						<?php if (number_format($result->rating, 1) >= 4) : ?>
							<div class="col-md-6 d-flex align-items-stretch mb-4">
								<div class="card" style='background-image: url("<?= $row['image'] ? site_url('assets/uploads/') . $row['image'] : site_url('assets/img/bg-abstract2.png') ?>");' data-aos="fade-up" data-aos-delay="100">

									<div class="card-body text-center">
										<img class="avatar-img rounded-circle mb-2" alt="user" src="<?= $row['logo'] ? site_url('assets/uploads/') . $row['logo'] : site_url('assets/img/person.png') ?>" width="60" />

										<h5 class="card-title mb-0"><a href="<?= site_url('establishment_info/') . $row['id'] ?>"> <?= $row['name'] ?></a></h5>
										<small><a class="text-muted" href="<?= site_url('category_info/') . $row['cat_id'] ?>"><?= $row['cat_name'] ?></a></small>
										<p class="card-text"><?= $row['desc'] ?></p>
										<?= display_skill_level(number_format($result->rating, 1)) ?><br>
										<small class="card-text text-center "> User Rating <?= number_format($result->rating, 1) ?> / 5.0</small>
									</div>

								</div>
							</div>
						<?php endif ?>
					<?php endforeach ?>
				<?php else : ?>
					<h4>No establishment</h4>
				<?php endif ?>
			</div>

		</div>
	</section><!-- End More Services Section -->

	<!-- ======= More Services Section ======= -->
	<section id="more-services" class="more-services">
		<div class="container">
			<div class="section-title" data-aos="fade-up">
				<h2>LOWEST REVIEWS</h2>
				<p>Based on the customers reviews</p>
			</div>
			<div class="row">
				<?php if ($estab) : ?>
					<?php foreach ($estab as $row) : ?>
						<?php $est_id = $row['id'];
						$query = $this->db->query('SELECT COUNT(review.id) as reviews, AVG(review.ratings) as rating FROM review WHERE `status`="Published" AND estab_id=' . $est_id . ' ');
						$result = $query->row(); ?>
						<?php if (number_format($result->rating, 1) <= 2) : ?>
							<div class="col-md-6 d-flex align-items-stretch mb-4">
								<div class="card" style='background-image: url("<?= $row['image'] ? site_url('assets/uploads/') . $row['image'] : site_url('assets/img/bg-abstract2.png') ?>");' data-aos="fade-up" data-aos-delay="100">
									<div class="card-body text-center">
										<img class="avatar-img rounded-circle mb-2" alt="user" src="<?= $row['logo'] ? site_url('assets/uploads/') . $row['logo'] : site_url('assets/img/person.png') ?>" width="60" />

										<h5 class="card-title mb-0"><a href="<?= site_url('establishment_info/') . $row['id'] ?>"> <?= $row['name'] ?></a></h5>
										<small><a class="text-muted" href="<?= site_url('category_info/') . $row['cat_id'] ?>"><?= $row['cat_name'] ?></a></small>
										<p class="card-text"><?= $row['desc'] ?></p>
										<?= display_skill_level(number_format($result->rating, 1)) ?><br>
										<small class="card-text text-center "> User Rating <?= number_format($result->rating, 1) ?> / 5.0</small>
									</div>
								</div>
							</div>
						<?php endif ?>
					<?php endforeach ?>
				<?php else : ?>
					<h4>No establishment</h4>
				<?php endif ?>
			</div>

		</div>
	</section><!-- End More Services Section -->

</main><!-- End #main -->

<?php
function display_skill_level($number)
{
	// Convert any entered number into a float
	// Because the rating can be a decimal e.g. 4.5
	$number = number_format($number, 1);

	// Get the integer part of the number
	$intpart = floor($number);

	// Get the fraction part
	$fraction = $number - $intpart;

	// Rating is out of 5
	// Get how many stars should be left blank
	$unrated = 5 - ceil($number);

	// Populate the full-rated stars
	if ($intpart <= 5) {
		for ($i = 0; $i < $intpart; $i++)
			echo '<i class="bi bi-star-fill" style="color:goldenrod"></i> ';
	}

	// Populate the half-rated star, if any
	if ($fraction == 0.5) {
		echo '<i class="bi bi-star-half" style="color:goldenrod"></i> ';
	}

	// Populate the unrated stars, if any
	if ($unrated > 0) {
		for ($j = 0; $j < $unrated; $j++)
			echo '<i class="bi bi-star-fill" style="color:black"></i> ';
	}
}
?>
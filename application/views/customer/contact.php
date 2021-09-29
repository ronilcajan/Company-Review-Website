<!-- ======= Hero Section ======= -->
<section class="d-flex align-items-center hero-bg">

	<div class="container">
		<div class="text-center">
			<h1 data-aos="fade-up">Contact Us</h1>
			<h3 data-aos="fade-up" data-aos-delay="400">Get In Touch</h3>
		</div>
	</div>

</section><!-- End Hero -->
<main id="main">
	<!-- ======= Contact Section ======= -->
	<section id="contact" class="contact">
		<div class="container">

			<div class="row">

				<div class="col-lg-5 col-md-12" data-aos="fade-up" data-aos-delay="100">
					<div class="contact-about">
						<h3>Get In Touch With Us <br>For Any Help!!</h3>
					</div>
					<div class="info mt-4">
						<div>
							<i class="ri-map-pin-line"></i>
							<p>A108 Adam Street<br>New York, NY 535022</p>
						</div>

						<div>
							<i class="ri-mail-send-line"></i>
							<p>info@example.com</p>
						</div>

						<div>
							<i class="ri-phone-line"></i>
							<p>+1 5589 55488 55s</p>
						</div>

					</div>
				</div>

				<div class="col-lg-7 col-md-12" data-aos="fade-up" data-aos-delay="300">
					<div class="contact-about">
						<h3 class="mb-2">Any Question? Send a Message</h3>
						<p>Excepteur sint occaecat cupidatat non proident mollit any laboruys perspiciatis accusan
							dolor que totams mollit anim est laborum sedut perspiciatis und omnis.</p>
					</div>
					<?php if (!empty($this->session->flashdata('success'))) : ?>
						<div class="alert alert-<?= $this->session->flashdata('success') != 'success' ? 'danger' : 'success' ?> alert-dismissible fade show" role="alert">
							<small><?= $this->session->flashdata('message') ?></small>
						</div>
					<?php endif ?>
					<form action="<?= site_url('inquiry/create') ?>" method="post" role="form" class="php-email-form">
						<div class="form-group">
							<input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
						</div>
						<div class="form-group">
							<input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
						</div>
						<div class="form-group">
							<textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
						</div>
						<div class="my-3">
							<div class="loading">Loading</div>
							<div class="error-message"></div>
							<div class="sent-message">Your message has been sent. Thank you!</div>
						</div>
						<div class="text-center"><button type="submit">Send Message</button></div>
					</form>
				</div>

			</div>

		</div>
	</section>

</main>
<main id="main" style="height:85vh" class="section-bg">
	<!-- ======= Login Section ======= -->
	<section class="contact mt-5">
		<div class="container">

			<div class="section-title mt-5" data-aos="fade-up">
			<h3><?php echo lang('forgot_password_heading');?></h3>
			</div>
			<div class="row m-1">
				<div class="col-lg-4"></div>
				<div class="col-lg-4 col-md-12 border p-5 bg-white shadow" data-aos="fade-up" data-aos-delay="300">
					<form action="<?= site_url('auth/forgot_password') ?>" method="post" role="form" class="php-email-form">
						<?php if($message): ?>
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
								<small><?= $message ?></small>
							</div>
						<?php endif ?>
                                    <p><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>
						<div class="form-group">
							<input type="email" name="identity" class="form-control" id="name" placeholder="Your Email" required>
						</div>
						<div class="text-center"><button type="submit">Submit</button></div>
					</form>
				</div>
				<div class="col-lg-4"></div>
			</div>

		</div>
	</section><!-- End Login Section -->

</main><!-- End #main -->

<main id="main" style="height:85vh" class="section-bg">
	<!-- ======= Login Section ======= -->
	<section class="contact mt-5">
		<div class="container">

			<div class="section-title mt-5" data-aos="fade-up">
			<h3><?php echo lang('reset_password_heading');?></h3>
			</div>
			<div class="row m-1">
				<div class="col-lg-4"></div>
				<div class="col-lg-4 col-md-12 border p-5 bg-white shadow" data-aos="fade-up" data-aos-delay="300">
					<form action="<?= site_url('auth/reset_password/').$code ?>" method="post" role="form" class="php-email-form">
						<?php if($message): ?>
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
								<small><?= $message ?></small>
							</div>
						<?php endif ?>
						<div class="form-group">
							<small><?php echo sprintf(lang('reset_password_new_password_label'), $min_password_length);?></small> <br />
							<?php echo form_input($new_password);?>
						</div>
						<div class="form-group">
							<small><?php echo lang('reset_password_new_password_confirm_label', 'new_password_confirm');?></small> <br />
							<?php echo form_input($new_password_confirm);?>
						</div>
						<?php echo form_input($user_id);?>
						<?php echo form_hidden($csrf); ?>
						<div class="text-center"><button type="submit">Change</button></div>
					</form>
				</div>
				<div class="col-lg-4"></div>
			</div>

		</div>
	</section><!-- End Login Section -->

</main><!-- End #main -->
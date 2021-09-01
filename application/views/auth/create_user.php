<main id="main" class="section-bg" style="height:90vh">
	<!-- ======= Login Section ======= -->
	<section class="contact mt-1">
		<div class="container">

			<div class="section-title mt-5" data-aos="fade-up">
			      <h3>Register Here</h3>
			</div>
			<div class="row m-1">
				<div class="col-lg-3"></div>
				<div class="col-lg-6 col-md-12 border p-5 bg-white shadow" data-aos="fade-up" data-aos-delay="300">
					<form action="<?= site_url('auth/register') ?>" method="post" role="form" class="php-email-form">
						<?php if($message): ?>
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
								<small><?= $message ?></small>
							</div>
						<?php endif ?>
						<small><?php echo lang('create_user_subheading');?></small>
						<div class="row mt-2">
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
										<small>First Name:</small>
										<input type="text" name="first_name" class="form-control" placeholder="Enter Firstname" required>
								</div>
							</div>
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
										<small>Last Name:</small>
										<input type="text" name="last_name" class="form-control" placeholder="Enter Lastname" required>
								</div>
							</div>
						</div>
						<div class="form-group">
							<small>Email Address:</small>
							<input type="email" name="email" class="form-control" placeholder="Enter Email" required>
						</div>
						<div class="form-group">
							<small>Password:</small>
							<input type="password" class="form-control" name="password" id="password" placeholder="Enter password" required>
							<span toggle="#password" class="field-icon toggle-password bi bi-eye"></span>
						</div>
						<div class="form-group">
							<small>Confirn Password:</small>
							<input type="password" class="form-control" name="password_confirm" id="password_confirm" placeholder="Confirm password" required>
							<span toggle="#password_confirm" class="field-icon toggle-password bi bi-eye"></span>
						</div>
						<div class="text-center"><button type="submit">Create User</button></div>
                        <div class="text-center mt-2"><small>Already have an account? <a href="<?= site_url('auth/login') ?>">Login Here</a></small></div>
					</form>
				</div>
				<div class="col-lg-3"></div>
			</div>

		</div>
	</section><!-- End Login Section -->

</main><!-- End #main -->

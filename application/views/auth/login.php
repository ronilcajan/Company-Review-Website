<main id="main" style="height:87vh" class="section-bg">
	<!-- ======= Login Section ======= -->
	<section class="contact mt-5">
		<div class="container">

			<div class="section-title mt-5" data-aos="fade-up">
				<h2>Login Here</h2>
			</div>
			<div class="row m-1">
				<div class="col-lg-4"></div>
				<div class="col-lg-4 col-md-12 border p-5 bg-white shadow" data-aos="fade-up" data-aos-delay="300">
					<form action="<?= site_url('auth/login') ?>" method="post" role="form" class="php-email-form ">
						<?php if($message): ?>
							<div class="alert alert-<?= $this->session->flashdata('alert') != 'success' ? 'danger' : 'success' ?> alert-dismissible fade show" role="alert">
								<small><?= $message ?></small>
							</div>
						<?php endif ?>
						<div class="form-group">
							<input type="email" name="identity" class="form-control" id="name" placeholder="Your Email" required>
						</div>
						<div class="form-group">
							<input type="password" class="form-control" name="password" id="password" placeholder="Your Password" required>
							<span toggle="#password" class="field-icon toggle-password bi bi-eye"></span>
						</div>
						<div class="custom-control custom-checkbox mb-2">
							<input type="checkbox" class="custom-control-input" name="remember" id="rememberme" value="1">
							<label class="custom-control-label" for="rememberme"><small>Remember Me</small></label>
						</div>
						<div class="text-center"><button type="submit">Login</button></div>
						<div class="text-center mt-2"><a href="<?= site_url('auth/forgot_password') ?>"><small>Forgot your password?</small></a></div>
						<hr>
						<div class="text-center"><a href="<?= site_url('auth/register') ?>" class="btn btn-sm btn-success">Create New Account</a></div>
					</form>
				</div>
				<div class="col-lg-4"></div>
			</div>

		</div>
	</section><!-- End Login Section -->

</main><!-- End #main -->
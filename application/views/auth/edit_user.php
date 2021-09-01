<!-- ======= Hero Section ======= -->
<section class="d-flex align-items-center hero-bg">
      <div class="container">
            <div class="text-center">
                  <h1 data-aos="fade-up">Profile</h1>
                  <h3 data-aos="fade-up" data-aos-delay="400">Home | Profile</h3>
            </div>
      </div>
</section><!-- End Hero -->
<section class="contact" style="padding-top:0">
      <section class="d-flex align-items-center">
            <div class="container">
                  <div class="row m-1">
                        <div class="col-lg-12 pt-5 pt-lg-0 order-2 order-lg-1 border p-5 bg-white shadow " data-aos="fade-up" data-aos-delay="200">
                              <form action="<?= site_url(uri_string()) ?>" method="post" role="form" class="php-email-form" enctype="multipart/form-data">
                                    <input type="hidden" name="size" value="1000000">
                                    <?php if ($message) : ?>
                                          <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                                <small><?= $message ?></small>
                                          </div>
                                    <?php endif ?>
                                    <p class="mt-5"><b>My Profile</b></p>
                                    <hr>
                                    <div class="row">
                                          <div class="col-md-3">
                                                <?php if ($user->avatar != '') : ?>
                                                      <div class="mt-2">
                                                            <small>Avatar:</small> </br>
                                                            <img src="<?= site_url('assets/uploads/') . $user->avatar ?>" class="img-fluid animated border mt-2 mb-2" alt="" width='200'>
                                                      </div>
                                                <?php else : ?>
                                                      <div class=" mt-2">
                                                            <small>Avatar:</small> </br>
                                                            <img src="<?= site_url() ?>assets/img/person.png" class="img-fluid animated border mt-2 mb-2" alt="" width='200'>
                                                      </div>
                                                <?php endif ?>
                                                <div class="form-group">
                                                      <small>Change Avatar</small>
                                                      <input type="file" class="form-control" name="avatar" accept="image/*">
                                                </div>
                                          </div>
                                          <div class="col-md-9">
                                                <div class="row">
                                                      <div class="col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                  <small><?= lang('edit_user_fname_label', 'first_name'); ?></small>
                                                                  <?= form_input($first_name); ?>
                                                            </div>
                                                      </div>
                                                      <div class="col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                  <small><?= lang('edit_user_lname_label', 'last_name'); ?></small>
                                                                  <?= form_input($last_name); ?>
                                                            </div>
                                                      </div>
                                                </div>
                                                <div class="row">
                                                      <div class="col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                  <small>Birthdate</small>
                                                                  <?= form_input($birthdate); ?>
                                                            </div>
                                                      </div>
                                                      <div class="col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                  <small>Gender</small> </br>
                                                                  <?= form_dropdown('gender', $options, $user->gender, 'class="form-control"'); ?>
                                                            </div>
                                                      </div>
                                                </div>
                                                <div class="row">
                                                      <div class="col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                  <small>Company Name</small>
                                                                  <?= form_input($company); ?>
                                                            </div>
                                                      </div>
                                                      <div class="col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                  <small>Contact Number</small> </br>
                                                                  <?= form_input($phone); ?>
                                                            </div>
                                                      </div>
                                                </div>
                                                <div class="form-group">
                                                      <small>Address:</small> </br>
                                                      <?= form_input($address); ?>
                                                </div>
                                                <div class="form-group">
                                                      <small><?= lang('edit_user_password_label', 'password'); ?> </small>
                                                      <?= form_input($password); ?>
                                                      <span toggle="#password" class="field-icon toggle-password bi bi-eye"></span>
                                                </div>
                                                <div class="form-group">
                                                      <small><?= lang('edit_user_password_confirm_label', 'password_confirm'); ?> </small>
                                                      <?= form_input($password_confirm); ?>
                                                      <span toggle="#password_confirm" class="field-icon toggle-password bi bi-eye"></span>
                                                </div>
                                          </div>
                                    </div>


                                    <?= form_hidden('id', $user->id); ?>
                                    <?= form_hidden($csrf); ?>
                                    <div class="text-left"><button type="submit">Update</button></div>
                              </form>
                        </div>

                  </div>
            </div>

      </section><!-- End Hero -->
</section><!-- End Login Section -->
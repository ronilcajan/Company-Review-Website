<!-- Modal -->
<div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="msg"></div>
                <form method="POST" action="<?= site_url(uri_string()) ?>" enctype="multipart/form-data" id="create_user_form">
                    <input type="hidden" name="size" value="1000000">
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="input-file input-file-image text-center">
                                <img class="img-upload-preview img-circle ml-auto mr-auto" width="180" height="180" src="http://placehold.it/100x100" alt="preview">
                                <input type="file" class="form-control form-control-file" id="uploadImg1" name="avatar" accept="image/*">
                                <label for="uploadImg1" class="  label-input-file btn btn-black btn-round">
                                    <span class="btn-label">
                                        <i class="fa fa-file-image"></i>
                                    </span>
                                    Upload a Avatar
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-floating-label">
                                <label>First Name</label>
                                <input type="text" class="form-control" name="first_name" required value="<?= set_value('first_name') ?>">
                            </div>
                            <div class="form-group form-floating-label">
                                <label>Last Name</label>
                                <input type="text" class="form-control" name="last_name" required value="<?= set_value('last_name') ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-floating-label">
                                <label>User Role</label>
                                <select class="form-control" name="group" required>
                                    <?php foreach ($this->ion_auth->groups()->result() as $row) : ?>
                                        <option value="<?= $row->id ?>" <?= set_value('group') == $row->name ? 'selected' : null ?>><?= $row->name ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-floating-label">
                                <label>Gender</label>
                                <select class="form-control" name="gender">
                                    <option <?= set_value('gender') == 'Male' ? 'selected' : null ?>>Male</option>
                                    <option <?= set_value('gender') == 'Female' ? 'selected' : null ?>>Female</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-floating-label">
                                <label>Contact Number</label>
                                <input type="text" class="form-control" name="phone" value="<?= set_value('phone') ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-floating-label">
                                <label>Company</label>
                                <input type="text" class="form-control" name="company" value="<?= set_value('company') ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-floating-label">
                                <label>Email Address</label>
                                <input type="email" class="form-control" name="email" required value="<?= set_value('email') ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-floating-label">
                                <label>Birthdate</label>
                                <input type="date" class="form-control" name="birthdate" value="<?= set_value('birthdate') ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-floating-label">
                        <label>Address</label>
                        <input type="text" class="form-control" name="address" required value="<?= set_value('address') ?>">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Password</label>
                                <div class="position-relative">
                                    <input id="password" name="password" type="password" class="form-control mb-0" required="" minlength="5" value="<?= set_value('password') ?>">
                                    <div class="show-password" style="cursor:pointer">
                                        <small>Show Password</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <div class="position-relative">
                                    <input id="confirmpassword" name="password_confirm" type="password" class="form-control" required="" minlength="5" value="<?= set_value('password_confirm') ?>">
                                    <div class="show-password" style="cursor:pointer">
                                        <small>Show Password</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
            </form>
        </div>
    </div>
</div>
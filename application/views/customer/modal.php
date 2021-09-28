<div class="modal fade" id="addEstab" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Establishment</h5>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= site_url('establishment/create') ?>" id="establishment_form" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="uploadImg1" class="label-input-file btn btn-black btn-round">
                                    <span class="btn-label">
                                        <i class="fa fa-file-image"></i>
                                    </span>
                                    Upload a Logo
                                </label>
                                <input type="file" class="form-control form-control-file" id="uploadImg1" name="logo" accept="image/*">
                            </div>
                            <div class="form-group">
                                <label>Select Category</label>
                                <div>
                                    <select name="category" class="form-control" style="width:100%;">
                                        <optgroup label="Category Name">
                                            <?php foreach ($cat as $row) : ?>
                                                <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                            <?php endforeach ?>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="uploadImg1" class="label-input-file btn btn-black btn-round">
                                    <span class="btn-label">
                                        <i class="fa fa-file-image"></i>
                                    </span>
                                    Upload a Background Image
                                </label>
                                <input type="file" class="form-control form-control-file" id="uploadImg2" name="image" accept="image/*">
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <div class="select2-input">
                                    <select name="status" class="form-control">
                                        <optgroup label="Status">
                                            <option>Pending</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Establishment Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-group form-floating-label">
                                <label>Contact Number</label>
                                <input type="text" class="form-control" name="phone" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-floating-label">
                                <label>Email Address</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-group form-floating-label">
                                <label>Facebook URL</label>
                                <input type="url" class="form-control" name="facebook" placeholder="https://facebook.com/username" pattern="https://.*">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-floating-label">
                                <label>Website URL</label>
                                <input type="url" class="form-control" name="website" placeholder="https://example.com" pattern="https://.*">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name="address" required>
                    </div>
                    <div class="form-group">
                        <label>Description/Bio</label>
                        <textarea class="form-control" name="description" required></textarea>
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

<div class="modal fade" id="editEstab" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Establishment</h5>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= site_url('establishment/update') ?>" id="edit_establishment_form" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-file input-file-image text-center">
                                <img class="img-upload-preview img-circle ml-auto mr-auto" width="120" height="120" src="http://placehold.it/100x100" alt="preview" id="e_logo">
                                <input type="file" class="form-control form-control-file" id="uploadImg3" name="logo" accept="image/*">
                                <label for="uploadImg3" class="label-input-file btn btn-black btn-round">
                                    <span class="btn-label">
                                        <i class="fa fa-file-image"></i>
                                    </span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Select Category</label>
                                <div class="select2-input">
                                    <select name="category" class="form-control" style="width:100%;" id="e_cat">
                                        <optgroup label="Category Name">
                                            <?php foreach ($cat as $row) : ?>
                                                <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                            <?php endforeach ?>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-file input-file-image text-center">
                                <img class="img-upload-preview ml-auto mr-auto" width="180" height="120" src="<?= site_url() ?>assets/img/bgheading01.jpg" alt="preview" id="e_image">
                                <input type="file" class="form-control form-control-file" id="uploadImg4" name="image" accept="image/*">
                                <label for="uploadImg4" class="label-input-file btn btn-black btn-round">
                                    <span class="btn-label">
                                        <i class="fa fa-file-image"></i>
                                    </span>
                                </label>
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="status" id="e_status">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Establishment Name</label>
                        <input type="text" class="form-control" name="name" required id="e_name">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-floating-label">
                                <label>Contact Number</label>
                                <input type="text" class="form-control" name="phone" required id="e_phone">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-floating-label">
                                <label>Email Address</label>
                                <input type="email" class="form-control" name="email" required id="e_email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-floating-label">
                                <label>Facebook URL</label>
                                <input type="url" class="form-control" name="facebook" placeholder="https://facebook.com/username" pattern="https://.*" id="e_facebook">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-floating-label">
                                <label>Website URL</label>
                                <input type="url" class="form-control" name="website" placeholder="https://example.com" pattern="https://.*" id="e_website">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name="address" required id="e_address">
                    </div>
                    <div class="form-group">
                        <label>Description/Bio</label>
                        <textarea class="form-control" name="description" required id="e_desc"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id" id="e_id">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
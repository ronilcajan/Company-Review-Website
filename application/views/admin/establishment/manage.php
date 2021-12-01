<div class="page-header">
    <h4 class="page-title"><?= $title ?></h4>
    <ul class="breadcrumbs">
        <li class="nav-home">
            <a href="#">
                <i class="icon-grid"></i>
            </a>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
            <a href="javascript:void(0)">Establishment</a>
        </li>
    </ul>
    <div class="ml-md-auto py-2 py-md-0">
        <a href="#addEstab" data-toggle="modal" class="btn btn-secondary btn-round text-light">Add Establishment</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Establishment Table</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="estabTable" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Logo</th>
                                <th>Description</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Logo</th>
                                <th>Description</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($estab as $row) : ?>
                                <tr>
                                    <td><a href="<?= site_url('admin/establishment/') . $row['id'] ?>"><?= htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8'); ?></a></td>
                                    <td>
                                        <?php if (empty($row['logo'])) : ?>
                                            <div class="avatar avatar-xs">
                                                <img class="avatar-img rounded-circle" alt="user" src="http://placehold.it/100x100" />
                                            </div>
                                        <?php else : ?>
                                            <div class="avatar avatar-xs">
                                                <img class="avatar-img rounded-circle" alt="user" src="<?= site_url() . 'assets/uploads/' . $row['logo'] ?>" />
                                            </div>
                                        <?php endif ?>
                                    </td>
                                    <td><?= htmlspecialchars($row['description'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?= htmlspecialchars($row['phone'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?= htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?= htmlspecialchars($row['address'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?= $row['status'] == 'Active' ? '<span class="text-success">Active</span>' : '<span class="text-primary">Pending</span>' ?></td>
                                    <td>
                                        <div class="form-button-action">
                                            <a class="btn btn-link btn-primary p-1" type="button" onclick="editEstab(this)" href="#editEstab" data-toggle="modal" title="Edit Category" data-id="<?= $row['id'] ?>">
                                                <i class=" fa fa-edit"></i>
                                            </a>
                                            <a class="btn btn-link btn-danger p-1" type="button" href="<?= site_url("establishment/delete/" . $row['id']); ?>" data-toggle="tooltip" onclick="return confirm('Are you sure you want to delete this establishment?');" data-original-title="Remove">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('admin/establishment/modal') ?>
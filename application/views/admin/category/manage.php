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
            <a href="javascript:void(0)">Category</a>
        </li>
    </ul>
    <div class="ml-md-auto py-2 py-md-0">
        <a href="#addCat" data-toggle="modal" class="btn btn-secondary btn-round text-light">Add Category</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Category Table</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="catTable" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Category Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Category Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $no = 1;
                            foreach ($cat as $row) : ?>
                                <tr>
                                    <td><?= htmlspecialchars($no, ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?= htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?= htmlspecialchars($row['description'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td>
                                        <div class="form-button-action">
                                            <a class="btn btn-link btn-primary p-1" type="button" onclick="editCat(this)" href="#editCat" data-toggle="modal" title="Edit Category" data-id="<?= $row['id'] ?>" data-cname="<?= $row['name'] ?>" data-desc="<?= $row['description'] ?> ">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a class="btn btn-link btn-danger p-1" type="button" href="<?= site_url("category/delete/" . $row['id']); ?>" data-toggle="tooltip" onclick="return confirm('Are you sure you want to delete this category?');" data-original-title="Remove">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php $no++;
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('admin/category/modal') ?>
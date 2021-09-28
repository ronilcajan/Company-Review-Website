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
            <a href="javascript:void(0)">Reviews</a>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Reviews Table</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="catTable" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Review Title</th>
                                <th>Details</th>
                                <th>Ratings</th>
                                <th>Establishment</th>
                                <th>User</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Review Title</th>
                                <th>Details</th>
                                <th>Ratings</th>
                                <th>Establishment</th>
                                <th>User</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($review as $row) : ?>
                                <tr>
                                    <td><?= htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?= htmlspecialchars($row['details'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?= htmlspecialchars(number_format($row['ratings'], 1), ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?= htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?= htmlspecialchars($row['first_name'] . ' ' . $row['last_name'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?= htmlspecialchars(date('F d, Y ', strtotime($row['timestamp'])), ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?= $row['status'] == 'Published' ? '<span class="text-success">Published</span>' : '<span class="text-primary">Pending</span>' ?></td>
                                    <td>
                                        <div class="form-button-action">
                                            <?php if ($row['status'] != 'Published') : ?>
                                                <a class="btn btn-link btn-primary p-1" type="button" href="<?= site_url("review/published/" . $row['rev_id']); ?>" data-toggle="tooltip" onclick="return confirm('Are you sure you want to publish this review?');" data-original-title="Publish">
                                                    <i class="icon-paper-plane"></i>
                                                </a>
                                            <?php endif ?>

                                            <a class="btn btn-link btn-danger p-1" type="button" href="<?= site_url("review/delete/" . $row['rev_id']); ?>" data-toggle="tooltip" onclick="return confirm('Are you sure you want to delete this review?');" data-original-title="Remove">
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
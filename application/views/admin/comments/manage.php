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
                    <table id="commentsTable" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Review Title</th>
                                <th>Comments</th>
                                <th>User</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Review Title</th>
                                <th>Comments</th>
                                <th>User</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($comments as $row) : ?>
                                <tr>
                                    <td><?= htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?= htmlspecialchars($row['comments'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?= htmlspecialchars($row['first_name'] . ' ' . $row['last_name'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?= htmlspecialchars(date('F d, Y ', strtotime($row['timestamp'])), ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td>
                                        <div class="form-button-action">
                                            <a class="btn btn-link btn-danger p-1" type="button" href="<?= site_url("review/delete_comment/" . $row['id']); ?>" data-toggle="tooltip" onclick="return confirm('Are you sure you want to delete this comment?');" data-original-title="Remove">
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
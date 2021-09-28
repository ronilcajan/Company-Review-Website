<h4 class="page-title"><?= $title ?></h4>
<div class="row">
    <div class="col-md-8">
        <div class="card card-with-nav">
            <div class="card-header">
                <div class="row row-nav-line">
                    <ul class="nav nav-tabs nav-line nav-color-secondary w-100 pl-3" role="tablist">
                        <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true">Reviews</a> </li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="catTable" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Review Title</th>
                                <th>Details</th>
                                <th>Ratings</th>
                                <th>User</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Review Title</th>
                                <th>Details</th>
                                <th>Ratings</th>
                                <th>User</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($review as $row) : ?>
                                <tr>
                                    <td><?= htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?= htmlspecialchars($row['details'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?= htmlspecialchars(number_format($row['ratings'], 1), ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?= htmlspecialchars($row['first_name'] . ' ' . $row['last_name'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?= htmlspecialchars(date('F d, Y ', strtotime($row['timestamp'])), ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?= $row['status'] == 'Published' ? '<span class="text-success">Published</span>' : '<span class="text-primary">Pending</span>' ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-profile">
            <div class="card-header" style="background-image: url('<?= site_url('assets/uploads/') . $estab->image ?>')">
                <div class="profile-picture">
                    <div class="avatar avatar-xl">
                        <img src="<?= $estab->logo ? site_url('assets/uploads/') . $estab->logo : site_url('assets/img/person.png') ?>" alt="..." class="avatar-img rounded-circle border">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="user-profile text-center">
                    <div class="name"><?= $estab->name ?></div>
                    <div class="job"><?= $estab->description ?></div>
                    <div class="desc"><i class="icon-location-pin"></i> <?= $estab->address ?></div>
                    <div class="social-media">
                        <?php if ($estab->phone) : ?>
                            <a class="btn btn-info btn-twitter btn-sm btn-link" href="tel:<?= $estab->phone ?>">
                                <span class="btn-label just-icon"><i class="icon-phone"></i> </span>
                            </a>
                        <?php endif ?>
                        <?php if ($estab->email) : ?>
                            <a class="btn btn-danger btn-sm btn-link" rel="publisher" href="mailto:<?= $estab->email ?>">
                                <span class="btn-label just-icon"><i class="icon-envelope"></i> </span>
                            </a>
                        <?php endif ?>
                        <?php if ($estab->facebook_url) : ?>
                            <a class="btn btn-primary btn-sm btn-link" rel="publisher" href="<?= $estab->facebook_url ?>" target="_blank">
                                <span class="btn-label just-icon"><i class="flaticon-facebook"></i> </span>
                            </a>
                        <?php endif ?>
                        <?php if ($estab->website) : ?>
                            <a class="btn btn-danger btn-sm btn-link" rel="publisher" href="<?= $estab->website ?>" target="_blank">
                                <span class="btn-label just-icon"><i class="flaticon-internet"></i> </span>
                            </a>
                        <?php endif ?>
                    </div>
                    <div class="view-profile">
                        <a href="<?= site_url('establishment_info/') . $estab->id ?>" class="btn btn-secondary btn-block">View as Client</a>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row user-stats text-center">
                    <div class="col">
                        <div class="number">125</div>
                        <div class="title">Ratings</div>
                    </div>
                    <div class="col">
                        <div class="number">25K</div>
                        <div class="title">Reviews</div>
                    </div>
                    <div class="col">
                        <div class="number">134</div>
                        <div class="title">Likes</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
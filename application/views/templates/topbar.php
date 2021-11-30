<?php
$user = $this->ion_auth->user()->row();
$query = $this->db->query("SELECT * FROM systems WHERE id=1");
$sys = $query->row();

$sql = $this->db->query("SELECT * FROM review JOIN users ON users.id=review.user_id JOIN establishment ON establishment.id=review.estab_id WHERE review.status='Pending'");
$review = $sql->result();
?>
<div class="main-header">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="dark2">

        <a href="<?= site_url('admin/dashboard') ?>" class="logo">
            <img src="<?= site_url('assets/uploads/') . $sys->system_logo ?>" alt="navbar brand" class="navbar-brand" width="40">
            <span class="text-light ml-2 fw-bold" style="font-size:20px">
                <?= $sys->system_acronym ?>
            </span>
        </a>
        <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <i class="icon-menu"></i>
            </span>
        </button>
        <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
        <div class="nav-toggle">
            <button class="btn btn-toggle toggle-sidebar">
                <i class="icon-menu"></i>
            </button>
        </div>
    </div>
    <!-- End Logo Header -->

    <!-- Navbar Header -->
    <nav class="navbar navbar-header navbar-expand-lg" data-background-color="dark">

        <div class="container-fluid">
            <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                <li class="nav-item dropdown hidden-caret" data-original-title="Visit Website" data-toggle="tooltip">
                    <a class="nav-link" href="<?= site_url() ?>" aria-expanded="false">
                        <i class="icon-globe"></i>
                    </a>
                </li>
                <li class="nav-item dropdown hidden-caret">
                    <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bell"></i>
                        <?= empty($review) ? '' : ' <span class="notification">' . count($review) . '</span>'  ?>

                    </a>
                    <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                        <li>
                            <div class="dropdown-title">You have <?= count($review) ?> pending reviews</div>
                        </li>
                        <li>
                            <div class="notif-scroll scrollbar-outer">
                                <div class="notif-center">
                                    <?php if (!empty($review)) : ?>
                                        <?php foreach ($review as $row) : ?>
                                            <a href="<?= site_url('admin/reviews') ?>">
                                                <div class="notif-icon notif-primary"> <i class="fas fa-trophy"></i> </div>
                                                <div class="notif-content">
                                                    <span class="block">
                                                        <?= $row->first_name ?> reviews on <?= $row->name ?>
                                                    </span>
                                                    <span class="time"><?= time_elapsed_string($row->timestamp) ?></span>
                                                </div>
                                            </a>
                                        <?php endforeach ?>
                                    <?php else : ?>
                                        <a href="<?= site_url('admin/reviews') ?>">
                                            <div class="notif-icon notif-primary"> <i class="fa fa-bell"></i> </div>
                                            <div class="notif-content">
                                                <span class="block">
                                                    No reviews
                                                </span>
                                                <span class="time">5 minutes ago</span>
                                            </div>
                                        </a>
                                    <?php endif ?>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a class="see-all" href="<?= site_url('admin/reviews') ?>">See all notifications<i class="fa fa-angle-right"></i> </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown hidden-caret">
                    <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="icon-settings"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <div class="dropdown-user-scroll scrollbar-outer">
                            <li>
                                <div class="user-box">
                                    <div class="avatar-lg">
                                        <?php if (empty($user->avatar)) : ?>
                                            <img src="<?= site_url() ?>assets/img/person.png" alt="image profile" class="avatar-img rounded">
                                        <?php else : ?>
                                            <img alt="preview" src="<?= preg_match('/data:image/i', $user->avatar) ? $user->avatar : site_url() . 'assets/uploads/' . $user->avatar ?>" class="avatar-img rounded" />
                                        <?php endif ?>

                                    </div>
                                    <div class="u-text">
                                        <h4><?= $user->first_name . ' ' . $user->last_name ?></h4>
                                        <p class="text-muted"><?= $user->email ?></p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= site_url('auth/user_profile/') . $user->id ?>">Edit Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= site_url('auth/logout') ?>">Logout</a>
                            </li>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
</div>

<?php
function time_elapsed_string($datetime, $full = false)
{
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
?>
<?php $current_page = $this->uri->segment(2); ?>
<!-- Sidebar -->
<div class="sidebar sidebar-style-2" data-background-color="purple2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-primary">
                <li class="nav-item <?= $current_page == 'dashboard' ? 'active' : null ?>">
                    <a href="<?= site_url('admin/dashboard') ?>">
                        <i class="icon-screen-desktop"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">MENU</h4>
                </li>
                <li class="nav-item <?= $current_page == 'establishment' ? 'active' : null ?>">
                    <a href="<?= site_url('admin/establishment') ?>">
                        <i class="far fa-building"></i>
                        <p>Establishment</p>
                    </a>
                </li>
                <li class="nav-item <?= $current_page == 'reviews' ? 'active' : null ?>">
                    <a href="<?= site_url('admin/reviews') ?>">
                        <i class="fas fa-trophy"></i>
                        <p>Reviews</p>
                    </a>
                </li>
                <li class="nav-item <?= $current_page == 'comments' ? 'active' : null ?>">
                    <a href="<?= site_url('admin/comments') ?>">
                        <i class="icon-bubbles"></i>
                        <p>Comments</p>
                    </a>
                </li>
                <li class="nav-item <?= $current_page == 'category' ? 'active' : null ?>">
                    <a href="<?= site_url('admin/category') ?>">
                        <i class="icon-grid"></i>
                        <p>Category</p>
                    </a>
                </li>
                <li class="nav-item <?= $current_page == 'inquiry' ? 'active' : null ?>">
                    <a href="<?= site_url('admin/inquiry') ?>">
                        <i class="far fa-question-circle"></i>
                        <p>Inquiry</p>
                    </a>
                </li>
                <?php if ($this->ion_auth->is_admin()) : ?>
                    <li class="nav-section">
                        <span class="sidebar-mini-icon">
                            <i class="fa fa-ellipsis-h"></i>
                        </span>
                        <h4 class="text-section">System</h4>
                    </li>
                    <li class="nav-item <?= $current_page == 'users' ? 'active' : null ?>">
                        <a data-toggle="collapse" href="#settings">
                            <i class="icon-settings"></i>
                            <p>System</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse <?= $current_page == 'users' ? 'show' : null ?>" id="settings">
                            <ul class="nav nav-collapse">
                                <li class="<?= $current_page == 'users' ? 'active' : null ?>">
                                    <a href="<?= site_url('admin/users') ?>">
                                        <span class="sub-item">Users</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#sett" data-toggle="modal">
                                        <span class="sub-item">Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#restore" data-toggle="modal">
                                        <span class="sub-item">Restore</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= site_url('settings/backup') ?>">
                                        <span class="sub-item">Backup</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                <?php endif ?>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
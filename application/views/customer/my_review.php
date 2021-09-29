<!-- ======= Hero Section ======= -->
<section class="d-flex align-items-center hero-bg">

    <div class="container">
        <div class="text-center">
            <h1 data-aos="fade-up"><?= $title ?></h1>
            <h3 data-aos="fade-up" data-aos-delay="400">We are team of talented designers making websites with Bootstrap</h3>
        </div>
    </div>

</section><!-- End Hero -->

</section><!-- End Hero -->
<main id="main" style="height: 100%;">
    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
        <div class="container">
            <?php if ($this->session->flashdata('message')) : ?>
                <div class="alert alert-<?= $this->session->flashdata('success') != 'success' ? 'danger' : 'success' ?> alert-dismissible fade show" role="alert">
                    <small><?= $this->session->flashdata('message') ?></small>
                </div>
            <?php endif ?>
            <div class="card card-profile">
                <div class="card-header">
                    <h6 class="card-title mt-2">My Reviews</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Establishment</th>
                                    <th>Review Title</th>
                                    <th>Details</th>
                                    <th>Ratings</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Establishment</th>
                                    <th>Review Title</th>
                                    <th>Details</th>
                                    <th>Ratings</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php foreach ($review as $row) : ?>
                                    <tr>

                                        <td>
                                            <?php if (empty($row['logo'])) : ?>
                                                <img class="img-fluid" width="30" alt="establishment" src="<?= site_url() ?>assets/img/person.png" />
                                            <?php else : ?>
                                                <img class="img-fluid" width="30" alt="establishment" src="<?= site_url() . 'assets/uploads/' . $row['logo'] ?>" />
                                            <?php endif ?>
                                            <a href="<?= site_url('establishment_info/') . $row['id'] ?>"><?= htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8'); ?></a>
                                        </td>
                                        <td><?= htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?= htmlspecialchars($row['details'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?= htmlspecialchars(number_format($row['ratings'], 1), ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?= htmlspecialchars(date('F d, Y h:i:s A', strtotime($row['timestamp'])), ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?= $row['status'] == 'Published' ? '<span class="text-success">Published</span>' : '<span class="text-primary">Pending</span>' ?></td>

                                        <td>
                                            <div class="form-button-action">
                                                <a class="btn btn-link text-danger" type="button" href="<?= site_url("review/delete/" . $row['rev_id']); ?>" data-toggle="tooltip" onclick="return confirm('Are you sure you want to delete this establishment?');" data-original-title="Remove">
                                                    <i class="bi bi-trash"></i>
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
    </section><!-- End Features Section -->
</main>

<?php $this->load->view('customer/modal') ?>
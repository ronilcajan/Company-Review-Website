<?php $user = $this->ion_auth->user()->row(); ?>
<!-- ======= Hero Section ======= -->
<section class="d-flex align-items-center hero-estab">

    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-md-2">
                <?php if ($estab->logo) : ?>
                    <img class="img-fluid" src="<?= site_url('assets/uploads/') . $estab->logo ?>" width="200" data-aos="fade-right">
                <?php else : ?>
                    <img class="img-fluid" src="<?= site_url('assets/img/person.png')  ?>" width="200" data-aos="fade-right">
                <?php endif ?>
            </div>
            <div class="col-md-7 mt-3">
                <p class="text-light" data-aos="fade-up"><?= $estab->cat_name ?></p>
                <h1 data-aos="fade-up" class="mb-3"><?= $estab->name ?></h1>
                <h6 class="text-light" data-aos="fade-up" data-aos-delay="400"><i class="bi bi-pin-map"></i> <?= $estab->address ?></h6>
            </div>
            <div class="col-md-3 mt-5 text-center">
                <div class="row">
                    <div class="col-sm-6 col-6 mt-3">
                        <?= display_skill_level(number_format($ratings->ratings, 1)) ?>
                        <br> <small>Based on <?= $ratings->reviews ?> reviews</small>
                    </div>
                    <div class="col-sm-6 col-6">
                        <div class="p-3" id="rating">
                            <h3><?= number_format($ratings->ratings, 1) ?></h3>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

</section><!-- End Hero -->

</section><!-- End Hero -->
<main id="main">
    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
        <div class="container">
            <div class="row">
                <div class="col-md-8 testimonials">
                    <?php if ($estab->image) : ?>
                        <img class="img-fluid" src="<?= site_url('assets/uploads/') . $estab->image ?>" style="width:100%;">
                    <?php else : ?>
                        <img class="img-fluid" src="<?= site_url('assets/img/bg-abstract2.png')  ?>" style="width:100%;">
                    <?php endif ?>

                    <?php foreach ($reviews as $row) : ?>
                        <div class="testimonial-wrap">
                            <div class="testimonial-item">
                                <img src="<?= $row['avatar'] ? site_url('assets/uploads/') . $row['avatar'] : site_url('assets/img/person.png') ?>" class="testimonial-img" alt="">
                                <div class="row">
                                    <div class="col-md-9">
                                        <h3><?= $row['first_name'] . ' ' . $row['last_name'] ?></h3>
                                    </div>
                                    <div class="col-md-3 text-right">
                                        <?php $no = 1;
                                        while ($no <= 5) : ?>
                                            <?php if ($row['ratings'] >= $no) : ?>
                                                <i class="bi bi-star-fill" style="color:goldenrod"></i>
                                            <?php else : ?>
                                                <i class="bi bi-star-fill" style="color:black"></i>
                                            <?php endif ?>
                                        <?php $no++;
                                        endwhile ?>
                                        <h4>Rating <?= number_format($row['ratings'], 1) ?> / 5.0</h4>
                                    </div>
                                </div>
                                <h3>"<?= ucwords($row['title']) ?>"</h3>
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    <?= $row['details'] ?>
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                                <small class="text-muted">Review Published: <?= date('F d, Y', strtotime($row['timestamp'])) ?></small>
                                <?php $rev_id = $row['rev_id'];
                                $query = $this->db->query('SELECT * FROM comments JOIN users ON users.id=comments.user_id WHERE review_id=' . $rev_id . ' ');
                                $result = $query->row(); ?>
                                <?php if ($estab->user_id == $user->id && empty($result)) : ?>
                                    <form method="POST" action="<?= site_url('add_comment') ?>">
                                        <div class="row mt-3 ">
                                            <div class="col-2 text-center">
                                                <img class="img-rounded" width="40" src="<?= $user->avatar ? site_url('assets/uploads/') . $user->avatar : site_url('assets/img/person.png') ?>" />
                                            </div>
                                            <div class="col-8">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" name="comments" placeholder="Enter reply" required />
                                                    <input type="hidden" name="rev_id" value="<?= $rev_id ?>" />
                                                </div>
                                            </div>
                                            <div class="col-2 ">
                                                <button type="submit" class="btn btn-primary btn-sm">Reply</button>
                                            </div>
                                        </div>
                                    </form>
                                <?php else : ?>
                                    <div class="row mt-5 ">
                                        <p>Reply from "<?= $estab->name ?>" </p>
                                        <div class="col-2 text-center">
                                            <img class="img-rounded mt-2" width="40" src="<?= $estab->logo ? site_url('assets/uploads/') . $estab->logo : site_url('assets/img/person.png') ?>" />
                                        </div>
                                        <div class="col-10">
                                            <div class="form-group">
                                                <p class="mt-0"><?= $result->comments ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif ?>
                            </div>

                        </div>
                    <?php endforeach ?>


                    <hr>
                    <section id="contact" class="contact" style="margin-top: -20px;">
                        <div class="contact-about">
                            <?php if ($this->session->flashdata('message')) : ?>
                                <div class="alert alert-<?= $this->session->flashdata('success') != 'success' ? 'danger' : 'success' ?> alert-dismissible fade show" role="alert">
                                    <small><?= $this->session->flashdata('message') ?></small>
                                </div>
                            <?php endif ?>
                            <h3 class="font-weight-bold mb-4">Add Review</h3>
                            <form method="POST" id="review_form" role="form" class="php-email-form" action="<?= site_url('review/add_review') ?>">
                                <div class="text-left mb-3" id="stars">
                                    Rating:
                                    <i class="bi bi-star-fill star-rate" id="st1"></i>
                                    <i class="bi bi-star-fill star-rate" id="st2"></i>
                                    <i class="bi bi-star-fill star-rate" id="st3"></i>
                                    <i class="bi bi-star-fill star-rate" id="st4"></i>
                                    <i class="bi bi-star-fill star-rate" id="st5"></i>
                                </div>
                                <input type="hidden" name="ratings" id="myrating">
                                <input type="hidden" name="estab" value="<?= $estab->id ?>">
                                <div class="form-group">
                                    <input type="text" name="title" class="form-control" id="title" placeholder="Add Title" required>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="review" id="review" placeholder="Your Review" required></textarea>
                                </div>
                                <div class="text-center"><button type="submit">Submit Review</button></div>
                            </form>
                        </div>
                    </section>

                </div>
                <div class="col-md-4">
                    <div class="border">
                        <iframe style="width:100%;height:300px; border:0" loading="lazy" allowfullscreen src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCEA35Ma2rPs1Iij0tLmodKPrejFj53eqA&q=<?= $estab->address ?>"></iframe>
                        <div class="m-5">
                            <h3 class="mt-5"><?= $estab->name ?></h3>
                            <p class="mt-3 mb-5 text-muted"><?= $estab->description ?></p>
                            <hr>
                            <p class="text-primary"><b><small>Address:</small></b></p>
                            <p class="mt-3 text-muted"><?= $estab->address ?></p>
                            <p class="text-primary"><b><small>Phone:</small></b></p>
                            <p class="mt-3 text-muted"><?= $estab->phone ?></p>
                            <p class="text-primary"><b><small>Email Address:</small></b></p>
                            <p class="mt-3 text-muted"><?= $estab->email ?></p>
                            <p class="text-primary"><b><small>Website:</small></b></p>
                            <p class="mt-3 text-muted mb-5"><?= $estab->website ?></p>
                            <hr>
                            <?= !empty($estab->facebook_url) ? '<a target="_blank" href="' . $estab->facebook_url . '" class="mr-3"><i class="bi bi-facebook"></i></a>' : null ?>
                            <?= !empty($estab->website) ? '<a target="_blank" href="' . $estab->website . '"><i class="bi bi-globe"></i></a>' : null ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Features Section -->
</main>
<?php
function display_skill_level($number)
{
    // Convert any entered number into a float
    // Because the rating can be a decimal e.g. 4.5
    $number = number_format($number, 1);

    // Get the integer part of the number
    $intpart = floor($number);

    // Get the fraction part
    $fraction = $number - $intpart;

    // Rating is out of 5
    // Get how many stars should be left blank
    $unrated = 5 - ceil($number);

    // Populate the full-rated stars
    if ($intpart <= 5) {
        for ($i = 0; $i < $intpart; $i++)
            echo '<i class="bi bi-star-fill" style="color:goldenrod"></i> ';
    }

    // Populate the half-rated star, if any
    if ($fraction == 0.5) {
        echo '<i class="bi bi-star-half" style="color:goldenrod"></i> ';
    }

    // Populate the unrated stars, if any
    if ($unrated > 0) {
        for ($j = 0; $j < $unrated; $j++)
            echo '<i class="bi bi-star-fill" style="color:black"></i> ';
    }
}
?>
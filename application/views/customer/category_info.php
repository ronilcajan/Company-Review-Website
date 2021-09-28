<!-- ======= Hero Section ======= -->
<section class="d-flex align-items-center hero-bg">

    <div class="container">
        <div class="text-center">
            <h1 data-aos="fade-up"><?= $title ?></h1>
        </div>
    </div>

</section><!-- End Hero -->
<main id="main" style="min-height: 55vh;">
    <!-- ======= More Services Section ======= -->
    <section id="more-services" class="more-services">
        <div class="container">

            <div class="row">
                <?php if ($estab) : ?>
                    <h4 class="mb-5 mt-3">Establishments</h4>
                    <?php foreach ($estab as $row) : ?>
                        <?php $est_id = $row['id'];
                        $query = $this->db->query('SELECT COUNT(review.id) as reviews, AVG(review.ratings) as rating FROM review WHERE `status`="Published" AND estab_id=' . $est_id . ' ');
                        $result = $query->row(); ?>
                        <div class="col-md-6 d-flex align-items-stretch mb-4">
                            <div class="card" style='background-image: url("<?= $row['image'] ? site_url('assets/uploads/') . $row['image'] : site_url('assets/img/bg-abstract2.png') ?>");' data-aos="fade-up" data-aos-delay="100">
                                <div class="card-body text-center">
                                    <img class="avatar-img rounded-circle mb-2" alt="user" src="<?= $row['logo'] ? site_url('assets/uploads/') . $row['logo'] : site_url('assets/img/person.png') ?>" width="60" />
                                    <h5 class="card-title mb-0"><a href="<?= site_url('establishment_info/') . $row['id'] ?>"> <?= $row['name'] ?></a></h5>
                                    <small><a class="text-muted" href="<?= site_url('category_info/') . $row['cat_id'] ?>"><?= $row['cat_name'] ?></a></small>
                                    <p class="card-text"><?= $row['desc'] ?></p>
                                    <?= display_skill_level(number_format($result->rating, 1)) ?><br>
                                    <small class="card-text text-center "> User Rating <?= number_format($result->rating, 1) ?> / 5.0</small>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                <?php else : ?>
                    <h4>No establishment</h4>
                <?php endif ?>
            </div>
    </section><!-- End More Services Section -->
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
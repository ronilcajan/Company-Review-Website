<!-- ======= Hero Section ======= -->
<section class="d-flex align-items-center hero-bg">

    <div class="container">
        <div class="text-center">
            <h1 data-aos="fade-up"><?= $title ?></h1>
        </div>
    </div>

</section><!-- End Hero -->

</section><!-- End Hero -->
<main id="main">
    <!-- ======= Services Section ======= -->
    <section id="services" class="services" style="min-height: 55vh;">
        <div class="container">

            <div class="row">
                <?php
                foreach ($cat as $row) : ?>
                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-lg-0 mt-5">
                        <div class="icon-box w-100" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon"><i class="bi bi-grid"></i></div>
                            <h4 class="title"><a href="<?= site_url('category_info/') . $row['id'] ?>"><?= $row['name'] ?></a></h4>
                            <p class="description"><?= $row['description'] ?></p>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </section><!-- End Services Section -->
</main>
<div class="page-header">
    <h4 class="page-title">Dashboard</h4>
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
            <a href="javascript:void(0)">Dashboard</a>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-primary card-round">
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <div class="icon-big text-center">
                            <i class="far fa-building"></i>
                        </div>
                    </div>
                    <div class="col-9 col-stats">
                        <div class="numbers">
                            <p class="card-category">Establishment</p>
                            <h4 class="card-title"><?= number_format($estab) ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-info card-round">
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <div class="icon-big text-center">
                            <i class="fas fa-trophy"></i>
                        </div>
                    </div>
                    <div class="col-9 col-stats">
                        <div class="numbers">
                            <p class="card-category">Reviews</p>
                            <h4 class="card-title"><?= number_format($reviews) ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-success card-round">
            <div class="card-body ">
                <div class="row">
                    <div class="col-3">
                        <div class="icon-big text-center">
                            <i class="icon-grid"></i>
                        </div>
                    </div>
                    <div class="col-9 col-stats">
                        <div class="numbers">
                            <p class="card-category">Category</p>
                            <h4 class="card-title"><?= number_format($cat) ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-secondary card-round">
            <div class="card-body ">
                <div class="row">
                    <div class="col-3">
                        <div class="icon-big text-center">
                            <i class="far fa-question-circle"></i>
                        </div>
                    </div>
                    <div class="col-9 col-stats">
                        <div class="numbers">
                            <p class="card-category">Inquiry</p>
                            <h4 class="card-title"><?= number_format($inqui) ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="card-title">User Chart</div>
            </div>
            <div class="card-body">
                <div class="chart-container">
                    <canvas id="doughnutChart1" style="width: 50%; height: 50%"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Establishment Chart</div>
            </div>
            <div class="card-body">
                <div class="chart-container">
                    <canvas id="doughnutChart" style="width: 50%; height: 50%"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card w-100">
    <div class="card-body">
        <img src="<?= site_url('assets/img/review.jpg') ?>" class="img-fluid w-100" />
    </div>
</div>
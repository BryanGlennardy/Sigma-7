<?= $this->extend('layout/indextemplate'); ?>

<?= $this->section('indextemplate'); ?>

<!-- Start Navigation -->
<header class="nav-solid" id="home">

    <nav class="navbar navbar-fixed-top">
        <div class="navigation">
            <div class="container-fluid">
                <div class="row">

                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <!-- Logo -->
                        <div class="logo-container">
                            <div class="logo-wrap local-scroll">
                                <a href="<?= base_url('Home/index'); ?>">
                                    <img class="logo" src="<?= base_url('assets/img/logo/logo.png'); ?>" alt="logo" data-rjs="2">
                                </a>
                            </div>
                        </div>
                    </div> <!-- end navbar-header -->

                    <div class="col-md-8 col-xs-12 nav-wrap">
                        <div class="collapse navbar-collapse" id="navbar-collapse">

                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="<?= base_url('Home/index'); ?>">Home</a></li>
                                <li><a href="<?= base_url('Home/exercisesPage'); ?>">Exercises</a></li>
                                <li><a href="<?= base_url('Home/aboutPage'); ?>">About</a></li>
                                <?php if (!session()->get('log_sess')) { ?>
                                    <li><a href="<?= base_url('home/login'); ?>">Login</a></li>
                                <?php } else { ?>
                                    <li><a href="<?= base_url('home/history'); ?>">History</a></li>
                                    <li><a href="<?= base_url('home/logoutUser'); ?>">Logout</a></li>
                                <?php } ?>
                            </ul>

                        </div>
                    </div> <!-- /.col -->

                </div> <!-- /.row -->
            </div>
            <!--/.container -->
        </div> <!-- /.navigation-overlay -->
    </nav> <!-- /.navbar -->

</header>
<!-- End Navigation -->

<!-- Start Website -->
<div class="diagnosis-image">
    <section id="diagnosis" class="p-top-80 p-bottom-50">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <!-- Section Title -->
                    <div class="section-title text-center m-bottom-40">
                        <h2 class="wow fadeInDown white-color" data-wow-duration="1s" data-wow-delay="0.6s">Hasil Diagnosa</h2>
                        <div class="divider-center-small divider-white wow zoomIn" data-wow-duration="1s" data-wow-delay="0.6s"></div>
                    </div>
                </div> <!-- /.col -->
            </div> <!-- /.row -->

            <div class="row white-color" style="text-align: center">
                <p style="font-size: 20px;"><?= $name; ?>, Anda tergolong sebagai <span class="theme-color"><?= $class; ?></span>.</p>
                <p style="font-size: 20px;">Sistem kami merekomendasikan Anda untuk berolahraga sebanyak <?= $intensity; ?> menit <?= $frequency; ?> hari per minggu.</p>
            </div>
        </div>
    </section>

    <!-- Start Exercises -->
    <section id="box" class="p-top-80 p-bottom-50">
        <div id="diagnosis" class="container">

            <div class="row row-space-between">
                <div class="col-md-10">
                    <!-- Section Title -->
                    <div class="section-title text-center m-bottom-40">
                        <h2 class="wow fadeInDown white-color" data-wow-duration="1s" data-wow-delay="0.6s">Exercises</h2>
                        <div class="divider-center-small divider-white wow zoomIn" data-wow-duration="1s" data-wow-delay="0.6s"></div>
                    </div>
                    <div class="row white-color" style="text-align: center">
                        <p style="font-size: 20px;">Berikut adalah olahraga yang bisa Anda lakukan untuk mengembangkan otot bagian <span class="theme-color"><?= $musclepart; ?></span></p>
                    </div>
                </div> <!-- /.col -->
            </div> <!-- /.row -->

            <div class="row p-top-80">

                <!-- === Exercise items === -->
                <?php foreach ($exercises as $ex) { ?>
                    <div class="col-xs-4 p-bottom-50 p-top-20 row-space-between">
                        <div class="col-xs-10">
                            <div class="box-item wow zoomIn" data-wow-duration="1s" data-wow-delay="0.9s">
                                <div class="box-item-image">
                                    <div class="box-item-image-overlay">
                                        <div class="box-item-icons">
                                            <p><?= $ex['reps'] . ' x ' . $sets . ' sets'; ?></p>
                                        </div>
                                    </div>
                                    <img src="<?= base_url('assets/img/exercises/' . $ex['img_path']); ?>" alt="<?= $ex['name']; ?>" />
                                </div>
                                <div class="box-item-info">
                                    <div class="box-item-name">
                                        <?= $ex['name']; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- /.col -->
                <?php } ?>

            </div> <!-- /.row -->
            <form action="<?= base_url('Home/history'); ?>" method="POST" class="d-inline">
                <div class="col-xs-4 btn-custom-box m-top-30 m-bottom-10">
                    <button type="submit" class="btn btn-main btn-theme btn-custom wow fadeInUp" data-lang="en">Go To History</button>
                </div>
            </form>
        </div> <!-- /.container -->
    </section>
    <!-- End Exercises -->
</div>

<?= $this->endSection(); ?>
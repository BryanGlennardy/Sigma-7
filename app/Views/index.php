<?= $this->extend('layout/indextemplate'); ?>

<?= $this->section('indextemplate'); ?>

<?php $validation = \Config\Services::validation(); ?>

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
                                <li class="active"><a href="<?= base_url('Home/index'); ?>">Home</a></li>
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

<!-- Start Intro -->
<div id="intro-carousel" class="carousel slide" data-ride="carousel">
    <!-- Indicator -->
    <ol class="carousel-indicators">
        <li data-target="#intro-carousel" data-slide-to="0" class="active"></li>
        <li data-target="#intro-carousel" data-slide-to="1"></li>
        <li data-target="#intro-carousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <!-- Slide 1 -->
        <div class="item active">
            <div class="overlay"></div>
            <img src="<?= base_url('assets/img/slider/s1.jpg'); ?>" alt="Slide 1" />
            <!-- Caption -->
            <div class="carousel-caption">
                <h3 class="welcome">WELCOME</h3>
                <p class="text-upper">Good exercises makes your body healthy</p>
                <a class="btn btn-main btn-theme wow fadeInUp m-top-10" data-scroll="" href="#biodata">Fill the form</a>
            </div>
        </div>

        <!-- Slide 2 -->
        <div class="item">
            <div class="overlay"></div>
            <img src="<?= base_url('assets/img/slider/s2.jpg'); ?>" alt="Slide 2" />
            <!-- Caption -->
            <div class="carousel-caption" style="top: 25%">
                <h3 class="white-color">Satu-satunya orang yang dapat menghentikan Anda mencapai tujuan adalah <span class="theme-color">Anda</span> sendiri</h3>
                <a class="btn btn-main btn-theme wow fadeInUp m-top-10" data-scroll="" href="#biodata">Fill the form</a>
            </div>
        </div>

        <!-- Slide 3 -->
        <div class="item">
            <div class="overlay"></div>
            <img src="<?= base_url('assets/img/slider/s3.jpg'); ?>" alt="Slide 3" />
            <!-- Caption -->
            <div class="carousel-caption">
                <h3 class="white-color">Berikan dorongan yang <span class="theme-color">lebih kuat</span> dari kemarin</h3>
                <a class="btn btn-main btn-theme wow fadeInUp m-top-10" data-scroll="" href="#biodata">Fill the form</a>
            </div>
        </div>
    </div>

    <!-- Controls -->
    <a class="carousel-control left" href="#intro-carousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control right" href="#intro-carousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!-- End Intro -->

<!-- Start Biodata -->
<section id="biodata" class="p-top-70 p-bottom-60">
    <div class="container">

        <div class="row biodata-layout">

            <!-- === Biodata Form === -->
            <div class="col-md-3 col-sm-3">
                <div class="biodata-form row">
                    <?= form_open(base_url('Home/acceptBiodata')); ?>
                    <div class="col-sm-12 biodata-form-item wow zoomIn">
                        <input class="<?= ($validation->hasError('name')) ? 'error' : ''; ?>" name="name" id="name" type="text" placeholder="Nama: *" value="<?= old('name'); ?>" />
                    </div>
                    <div class="col-sm-12 biodata-form-item wow zoomIn">
                        <input class="<?= ($validation->hasError('age')) ? 'error' : ''; ?>" name="age" id="age" type="number" placeholder="Usia: *" value="<?= old('age'); ?>" />
                    </div>
                    <div class="col-sm-12 biodata-form-item wow zoomIn">
                        <select class="<?= ($validation->hasError('gender')) ? 'error' : ''; ?>" name="gender" id="gender" type="text" value="<?= old('gender'); ?>">
                            <option value="" hidden>Pilih Jenis Kelamin: *</option>
                            <option value="M">Laki-laki</option>
                            <option value="F">Perempuan</option>
                        </select>
                    </div>
                    <div class="col-sm-12 row m-0 biodata-form-item with-unit wow zoomIn">
                        <input class="col-sm-9 with-unit <?= ($validation->hasError('height')) ? 'error' : ''; ?>" name="height" id="height" type="number" step=".01" placeholder="Tinggi Badan: *" value="<?= old('height'); ?>" />
                        <p class="col-sm-3">cm</p>
                    </div>
                    <div class="col-sm-12 row m-0 biodata-form-item with-unit wow zoomIn">
                        <input class="col-sm-9 with-unit <?= ($validation->hasError('weight')) ? 'error' : ''; ?>" name="weight" id="weight" type="number" step=".01" placeholder="Berat Badan: *" value="<?= old('weight'); ?>" />
                        <p class="col-sm-3">kg</p>
                    </div>
                    <div class="col-sm-12 biodata-form-item">
                        <button type="submit" class="btn btn-main btn-theme btn-custom wow fadeInUp" data-lang="en">Take the test</button>
                    </div>
                    <?= form_close(); ?>
                </div> <!-- /.biodatas-form & inner row -->
            </div> <!-- /.col -->

            <!-- === Biodata Information === -->
            <div class="col-md-7 col-sm-7 biodata-info">
                <div class="m-bottom-40">
                    <h1>Ketahui olahraga yang <span class="theme-color">tepat</span> untukmu</h1>
                    <hr>
                    <p>Mulai kebiasaan baru dengan memilih olahraga yang tepat.</p>
                    <p>Sistem pakar ini dapat membantumu menentukan</p>
                    <p>intensitas dan olahraga sesuai dengan kebutuhan tubuhmu.</p>
                </div>
            </div> <!-- /.col -->

        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>
<!-- End Contact -->

<?= $this->endSection(); ?>
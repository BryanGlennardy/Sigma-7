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
                                <li><a href="<?= base_url('Home/index'); ?>">Home</a></li>
                                <li><a href="<?= base_url('Home/exercisesPage'); ?>">Exercises</a></li>
                                <li><a href="<?= base_url('Home/aboutPage'); ?>">About</a></li>
                                <?php if (!session()->get('log_sess')) { ?>
                                    <li><a href="<?= base_url('home/login'); ?>">Login</a></li>
                                <?php } else { ?>
                                    <li class="active"><a href="<?= base_url('home/history'); ?>">History</a></li>
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

<!-- Start Batch 1 Header Photo-->
<div id="intro-carousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <!-- Slide 2 -->
        <div class="item active">
            <div class="overlay"></div>
            <img src="<?= base_url('assets/img/slider/s3.jpg'); ?>" alt="Slide 2" />
            <!-- Caption -->
            <div class="carousel-caption" style="top: 30%">
                <h3 class="white-color">Satu-satunya orang yang dapat menghentikan Anda mencapai tujuan adalah <span class="theme-color">Anda</span> sendiri</h3>
            </div>
        </div>
    </div>
</div>
<!-- End Batch 1 Header Photo -->


<!-- Start History -->
<div class="container">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h1 class="theme-color m-bottom-30">History Table</h1>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr class="text-nowrap">
                                <th class="border-top-0">Nama</th>
                                <th class="border-top-0">Umur</th>
                                <th class="border-top-0">Jenis Kelamin</th>
                                <th class="border-top-0">Tinggi Badan</th>
                                <th class="border-top-0">Berat Badan</th>
                                <th class="border-top-0">BMI</th>
                                <th class="border-top-0">Kelas</th>
                                <th class="border-top-0">Bagian Otot</th>
                                <th class="border-top-0">Intensitas</th>
                                <th class="border-top-0">Frekuensi</th>
                                <th class="border-top-0">Email</th>
                                <th class="border-top-0">Tanggal Test</th>
                                <th class="border-top-0">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($result as $row) : ?>
                                <tr>
                                    <td><?= $row['name']; ?></td>
                                    <td><?= $row['age']; ?></td>
                                    <td><?= $row['gender']; ?></td>
                                    <td><?= $row['height']; ?></td>
                                    <td><?= $row['weight']; ?></td>
                                    <td><?= $row['bmi']; ?></td>
                                    <td><?= $row['class']; ?></td>
                                    <td><?= $row['musclepart']; ?></td>
                                    <td><?= $row['intensity']; ?></td>
                                    <td><?= $row['frequency']; ?></td>
                                    <td><?= $row['user_email']; ?></td>
                                    <td><?= $row['tanggal_test']; ?></td>
                                    <td class="text-nowrap">
                                        <form action="<?= base_url('Home/exercisesPage'); ?>" method="POST" class="d-inline">
                                            <button type="submit" class="btn btn-main btn-theme btn-custom wow fadeInUp" data-lang="en">Go To Exercises</button>
                                        </form>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
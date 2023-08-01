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
                                <li class="active"><a href="<?= base_url('Home/aboutPage'); ?>">About</a></li>
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
<section id="team" class="p-top-80 p-bottom-50">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <!-- Section Title -->
                <div class="section-title text-center m-bottom-40">
                    <h2 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.6s">About Website</h2>
                    <div class="divider-center-small wow zoomIn" data-wow-duration="1s" data-wow-delay="0.6s"></div>
                </div>
            </div> <!-- /.col -->
        </div> <!-- /.row -->

        <div class="row" style="text-align: center;">
            <p>Sigma 7 merupakan sebuah website yang dapat memberikan rekomendasi mengenai olahraga yang tepat <br>
                berdasarkan tingkatan yang telah ditentukan melalui jawaban dari pertanyaan yang diberikan sesuai dengan bagian tubuh yang ingin dilatih</p>
        </div>
    </div>
</section>

<!-- Start Team -->
<section id="box" class="p-top-80 p-bottom-50">
    <div class="container">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <!-- Section Title -->
                <div class="section-title text-center m-bottom-40">
                    <h2 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.6s">Team Members</h2>
                    <div class="divider-center-small wow zoomIn" data-wow-duration="1s" data-wow-delay="0.6s"></div>
                </div>
            </div> <!-- /.col -->
        </div> <!-- /.row -->

        <div class="row">

            <!-- === Team Item 1 === -->
            <div class="col-xs-4 p-bottom-30 row-space-between">
                <div class="col-xs-10">
                    <div class="box-item wow zoomIn" data-wow-duration="1s" data-wow-delay="0.9s">
                        <div class="box-item-image">
                            <div class="box-item-image-overlay">
                                <div class="box-item-icons">
                                    <a href="https://www.instagram.com/brya9xs/"><i class="fa fa-instagram"></i></a>
                                    <a href="https://github.com/brya9xs/"><i class="fa fa-github"></i></a>
                                </div>
                            </div>
                            <img src="<?= base_url('assets/img/team/Bryan.png'); ?>" alt="Bryan" />
                        </div>
                        <div class="box-item-info">
                            <div class="box-item-name">
                                Bryan Glennardy
                            </div>
                            <div class="box-item-caption">
                                00000036471
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- /.col -->

            <!-- === Team Item 2 === -->
            <div class="col-xs-4 p-bottom-30 row-space-between">
                <div class="col-xs-10">
                    <div class="box-item wow zoomIn" data-wow-duration="1s" data-wow-delay="0.9s">
                        <div class="box-item-image">
                            <div class="box-item-image-overlay">
                                <div class="box-item-icons">
                                    <a href="https://www.instagram.com/dc.darren/"><i class="fa fa-instagram"></i></a>
                                    <a href="https://github.com/Darren-34810/"><i class="fa fa-github"></i></a>
                                </div>
                            </div>
                            <img src="<?= base_url('assets/img/team/Darren.png'); ?>" alt="Darren" />
                        </div>
                        <div class="box-item-info">
                            <div class="box-item-name">
                                Darren Denisson Chandra
                            </div>
                            <div class="box-item-caption">
                                00000034810
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- /.col -->

            <!-- === Team Item 3 === -->
            <div class="col-xs-4 p-bottom-30 row-space-between">
                <div class="col-xs-10">
                    <div class="box-item wow zoomIn" data-wow-duration="1s" data-wow-delay="0.9s">
                        <div class="box-item-image">
                            <div class="box-item-image-overlay">
                                <div class="box-item-icons">
                                    <a href="https://www.instagram.com/willyamlim_/"><i class="fa fa-instagram"></i></a>
                                    <a href="https://github.com/WillyTH/"><i class="fa fa-github"></i></a>
                                </div>
                            </div>
                            <img src="<?= base_url('assets/img/team/Willy.png'); ?>" alt="Willy" />
                        </div>
                        <div class="box-item-info">
                            <div class="box-item-name">
                                Willyam
                            </div>
                            <div class="box-item-caption">
                                00000034868
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- /.col -->

        </div> <!-- /.row -->

    </div> <!-- /.container -->
</section>
<!-- End Team -->

<?= $this->endSection(); ?>
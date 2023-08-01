<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sigma 7</title>

    <meta name="description" content="Sigma 7">
    <meta name="keywords" content="">
    <meta name="author" content="tabthemes">

    <!-- Favicons -->
    <link rel="icon" href="<?= base_url('assets/img/logo/favicon.png') ?>">

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" />

    <!-- CSS Files For Plugin -->
    <link href="<?= base_url('assets/css/animate.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/font-awesome/font-awesome.min.css') ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="homepage_slider" data-spy="scroll" data-target=".navbar-fixed-top" data-offset="100">
    <!-- Preloader -->
    <div id="preloader">
        <div id="spinner"></div>
    </div>
    <!-- End Preloader-->
    <?= $this->renderSection('indextemplate'); ?>

    <!-- Start Footer -->
    <footer class="site-footer">
        <div class="container">
            <p>Copyrights © 2021 All Rights Reserved By Sigma 7.</p>
        </div>
        <!-- /container -->
    </footer>
    <!-- End Footer -->


    <!-- Back to top -->
    <a href="#" id="back-to-top" title="Back to top"><i class="fa fa-angle-up"></i></a>
    <!-- /Back to top -->


    <!-- jQuery -->
    <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>

    <!-- Bootstrap -->
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>

    <!-- Components Plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/smooth-scroll/16.1.3/smooth-scroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.appear/0.4.1/jquery.appear.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-countto/1.2.0/jquery.countTo.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/4.1.4/imagesloaded.pkgd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>

    <!-- Custom Plugin -->
    <script src="<?= base_url('assets/js/custom.js') ?>"></script>

</body>

</html>
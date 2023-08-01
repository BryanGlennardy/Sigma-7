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
                                <li><a href="<?= base_url('Home/indexPage'); ?>">Home</a></li>
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

<!-- Start Batch 1 Header Photo-->
<div id="intro-carousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <!-- Slide 2 -->
        <div class="item active">
            <div class="overlay"></div>
            <img src="<?= base_url('assets/img/slider/s2.jpg'); ?>" alt="Slide 2" />
            <!-- Caption -->
            <div class="carousel-caption" style="top: 30%">
                <h3 class="white-color">Satu-satunya orang yang dapat menghentikan Anda mencapai tujuan adalah <span class="theme-color">Anda</span> sendiri</h3>
            </div>
        </div>
    </div>
</div>
<!-- End Batch 1 Header Photo -->


<!-- Start Form Batch 1 -->
<div class="form-image">
    <div class="form-content">
        <h1 class="theme-color m-bottom-30">FORM</h1>
        <?= form_open(base_url('Home/acceptForm')); ?>
        <div id="form-rutin" class="form-statement">
            <span class="theme-color <?= ($validation->hasError('rutin')) ? '' : 'display-none'; ?>">
                *Harap memilih opsi berikut
            </span>
            <p>Saya rutin berolahraga.</p>
            <span class="align-left">
                <input type="radio" id="rutinYes" name="rutin" value="Yes" <?= old('rutin') ? 'checked' : ''; ?> />
                <label for="rutinYes">Ya</label>
            </span>
            <span class="align-right">
                <input type="radio" id="rutinNo" name="rutin" value="No" <?= old('rutin') ? 'checked' : ''; ?> />
                <label for="rutinNo">Tidak</label>
            </span>
        </div>
        <hr>
        <div id="form-atlet" class="form-statement">
            <span class="theme-color <?= ($validation->hasError('atlet')) ? '' : 'display-none'; ?>">
                *Harap memilih opsi berikut
            </span>
            <p>Saya seorang atlet.</p>
            <span class="align-left">
                <input type="radio" id="atletYes" name="atlet" value="Yes" <?= old('atlet') ? 'checked' : ''; ?> />
                <label for="atletYes">Ya</label>
            </span>
            <span class="align-right">
                <input type="radio" id="atletNo" name="atlet" value="No" <?= old('atlet') ? 'checked' : ''; ?> />
                <label for="atletNo">Tidak</label>
            </span>
        </div>
        <hr>
        <div id="form-bagianotot" class="form-statement form-statement-multiple-option">
            <span class="theme-color <?= ($validation->hasError('bagianotot')) ? '' : 'display-none'; ?>">
                *Harap memilih opsi berikut
            </span>
            <p>Bagian otot mana yang ingin Anda latih?</p>
            <span class="align-left">
                <input type="radio" id="perut" name="bagianotot" value="Perut" <?= old('bagianotot') ? 'checked' : ''; ?> />
                <label for="perut">Perut</label>
            </span>
            <span class="align-center">
                <input type="radio" id="lengan" name="bagianotot" value="Lengan" <?= old('bagianotot') ? 'checked' : ''; ?> />
                <label for="lengan">Lengan</label>
            </span>
            <span class="align-center">
                <input type="radio" id="kaki" name="bagianotot" value="Kaki" <?= old('bagianotot') ? 'checked' : ''; ?> />
                <label for="kaki">Kaki</label>
            </span>
            <span>
                <input type="radio" id="dada" name="bagianotot" value="Dada" <?= old('bagianotot') ? 'checked' : ''; ?> />
                <label for="dada">Dada</label>
            </span>
        </div>
        <hr>
        <div id="form-specific" class="form-statement">
            <span class="theme-color <?= ($validation->hasError('specific')) ? '' : 'display-none'; ?>">
                *Harap mengisi pertanyaan berikut
            </span>
            <p id="form-specific-question">Pilih bagian otot yang ingin Anda latih.</p>
            <span>
                <input type="number" class="align-center" id="specific" name="specific" min="0" <?= old('specific') ? old('specific') : ''; ?>>
            </span>
        </div>
        <div class="col-xs-4 btn-custom-box m-top-30 m-bottom-10">
            <button type="submit" class="btn btn-main btn-theme btn-custom wow fadeInUp" data-lang="en">Submit</button>
        </div>
        <?= form_close(); ?>
    </div>
</div>
<!-- End Form Batch 1 -->

<script>
    let formBagianOtot = document.getElementById('form-bagianotot');
    let formSpecificQuestion = document.getElementById('form-specific-question');
    let bagianOtotBefore = null;
    formBagianOtot.onclick = () => {
        let bagianOtot = null;
        let specific = null;
        try {
            bagianOtot = document.querySelector('input[name=bagianotot]:checked').value;
            specific = document.getElementById('specific');
        } catch (e) {}
        if (bagianOtot != null) {
            if (bagianOtot != bagianOtotBefore) {
                if (bagianOtotBefore != "Lengan" || bagianOtotBefore != "Dada") specific.value = '';
                if (bagianOtot == "Perut") formSpecificQuestion.innerHTML = "Berapa lama Anda dapat melakukan Plank? (detik)";
                else if (bagianOtot == "Kaki") formSpecificQuestion.innerHTML = "Berapa banyak Squats yang dapat Anda lakukan dalam 1 menit?";
                else formSpecificQuestion.innerHTML = "Berapa banyak Push Up yang dapat Anda lakukan dalam 1 menit?";
            }
            bagianOtotBefore = bagianOtot;
        }
    }
</script>

<?= $this->endSection(); ?>
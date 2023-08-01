<?= $this->extend('layout/loginregistemplate'); ?>

<?= $this->section('content'); ?>

<?php $validation = \Config\Services::validation(); ?>

<div class="main">
    <!-- Sign up form -->
    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">Sign up</h2>
                    <form action="<?= base_url("Home/registerUser"); ?>" method="POST" enctype="multipart/form-data" class="register-form" id="register-form">
                        <?= csrf_field(); ?>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" class="<?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" name="email" id="email" placeholder="Email" value="<?= old('email'); ?>" />
                            <div class="invalid-feedback">
                                <?= $validation->getError('email'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" class="<?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" name="password" id="password" placeholder="Password" value="<?= old('password'); ?>" />
                            <div class="invalid-feedback">
                                <?= $validation->getError('password'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" class="<?= ($validation->hasError('retypePass')) ? 'is-invalid' : ''; ?>" name="retypePass" id="retypePass" placeholder="Confirm Password" value="<?= old('retypePass'); ?>" />
                            <div class="invalid-feedback">
                                <?= $validation->getError('retypePass'); ?>
                            </div>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signup" id="signup" class="btn btn-main btn-theme btn-custom wow fadeInUp" value="Sign Up" /><br><br>
                            <p>
                                <a href="<?= base_url('home/login'); ?>">I Already Have an Account !</a>
                            </p>
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="<?= base_url('assets/img/logo/logo.png'); ?>" alt="sing up image"></figure>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>
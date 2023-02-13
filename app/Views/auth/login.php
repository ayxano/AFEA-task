<?= $this->extend('app') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
        <div class="row justify-content-md-center">
            <div class="col-5">
                <h2>Login</h2>
                <?= form_open('api/login', ['class' => 'ajaxForm']); ?>
                    <div class="form-group mb-3">
                        <?= form_input(['class' => 'form-control', 'name' => 'email', 'placeholder' => 'Email', 'type' => 'email']); ?>
                    </div>
                    <div class="form-group mb-3">
                        <?= form_password(['class' => 'form-control', 'name' => 'password', 'placeholder' => 'Password', 'type' => 'password']); ?>
                    </div>
                    <div class="d-grid">
                        <?= form_submit(['class' => 'btn btn-dark btn-block'], 'Login'); ?>
                    </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>

<?= $this->endSection() ?>
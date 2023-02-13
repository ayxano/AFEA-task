<?= $this->extend('app') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
        <div class="row justify-content-md-center">
            <div class="col-5">
                <h2>Register User</h2>
                <?= form_open('api/register', ['class' => 'ajaxForm']); ?>
                    <div class="form-group mb-3">
                        <?= form_input(['class' => 'form-control', 'name' => 'first_name', 'placeholder' => 'First Name']); ?>
                    </div>
                    <div class="form-group mb-3">
                        <?= form_input(['class' => 'form-control', 'name' => 'last_name', 'placeholder' => 'Last Name']); ?>
                    </div>
                    <div class="form-group mb-3">
                        <?= form_input(['class' => 'form-control', 'name' => 'email', 'placeholder' => 'Email', 'type' => 'email']); ?>
                    </div>
                    <div class="form-group mb-3">
                        <?= form_password(['class' => 'form-control', 'name' => 'password', 'placeholder' => 'Password']); ?>
                    </div>
                    <div class="form-group mb-3">
                        <?= form_password(['class' => 'form-control', 'name' => 'confirmpassword', 'placeholder' => 'Confirm Password']); ?>
                    </div>
                    <div class="d-grid">
                        <?= form_submit(['class' => 'btn btn-dark btn-block'], 'Signup'); ?>
                    </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>

<?= $this->endSection() ?>
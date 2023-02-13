<?= $this->extend('app') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
        <div class="row justify-content-md-center">
            <div class="col-5">
                <h2>Register User</h2>
                <form action="<?php echo base_url(); ?>/api/register" method="post" class="ajaxForm">
                    <div class="form-group mb-3">
                        <input type="text" name="first_name" placeholder="First Name" class="form-control" >
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" name="last_name" placeholder="Last Name" class="form-control" >
                    </div>
                    <div class="form-group mb-3">
                        <input type="email" name="email" placeholder="Email" class="form-control" >
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" name="password" placeholder="Password" class="form-control" >
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" name="confirmpassword" placeholder="Confirm Password" class="form-control" >
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-dark" id="submitButton">Signup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>

<?= $this->endSection() ?>
<?= $this->extend('app') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
        <div class="row justify-content-md-center">
            <div class="col-5">
                <h2>Add Post</h2>
                <form action="<?php echo base_url(); ?>/api/addPost" method="post" class="ajaxForm">
                    <div class="form-group mb-3">
                        <input type="text" name="title" placeholder="Title" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <textarea name="content" placeholder="Content" class="form-control"></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <textarea name="tags" placeholder="Tags" class="form-control"></textarea>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-dark" id="submitButton">Add Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>

<?= $this->endSection() ?>
<?= $this->extend('app') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
        <div class="row justify-content-md-center">
            <div class="col-5">
                <h2>Add Post</h2>
                <?= form_open('api/addPost', ['class' => 'ajaxForm']); ?>
                    <div class="form-group mb-3">
                        <?= form_input(['class' => 'form-control', 'name' => 'title', 'placeholder' => 'Title']); ?>
                    </div>
                    <div class="form-group mb-3">
                        <?= form_textarea(['class' => 'form-control', 'name' => 'content', 'placeholder' => 'Content']); ?>
                    </div>
                    <div class="form-group mb-3">
                        <?= form_input(['class' => 'form-control', 'name' => 'tags', 'placeholder' => 'Tags']); ?>
                    </div>
                    <div class="d-grid">
                        <?= form_submit(['class' => 'btn btn-dark btn-block'], 'Add Post'); ?>
                    </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>

<?= $this->endSection() ?>
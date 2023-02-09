<?= $this->extend('app') ?>

<?= $this->section('content') ?>
    <h1>Hello User!</h1>
    <p>Currently we have <?= esc($postsCount); ?> posts on our application. Please login to see your posts!</p>
<?= $this->endSection() ?>
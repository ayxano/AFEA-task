<?= $this->extend('app') ?>

<?= $this->section('content') ?>
    <h1><?= esc($post['title']); ?></h1>
    <p>
        <?= esc($post['content']); ?>
    </p>
    
<?= $this->endSection() ?>
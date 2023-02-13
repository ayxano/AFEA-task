<?= $this->extend('app') ?>

<?= $this->section('content') ?>
    <h1><?= esc($post->getTitle()); ?></h1>
    <p>
        <?= esc($post->getContent()); ?>
    </p>
    
<?= $this->endSection() ?>
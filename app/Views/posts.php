<?= $this->extend('app') ?>

<?= $this->section('content') ?>
    <h1>Hello <?= session('user')['first_name']; ?>, here are your posts:</h1>
    <ul>
        <? foreach($userPosts as $post): ?>
            <li>
                <?= anchor('posts/' . $post->getId(), $post->getTitle()) ?>
            </li>
        <? endforeach; ?>
    </ul>
    
<?= $this->endSection() ?>
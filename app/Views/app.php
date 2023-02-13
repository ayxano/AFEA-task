<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= link_tag('//cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css'); ?>
    <?= script_tag('//cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js'); ?>
    <?= script_tag('//cdn.jsdelivr.net/npm/sweetalert2@11'); ?>
    <title>Document</title>
</head>

<body class="d-flex flex-column h-100">
    <?= $this->include('navbar') ?>
    <main role="main" class="flex-shrink-0">
        <div class="container">
            <?= $this->renderSection('content') ?>
        </div>
    </main>
</body>
<?= script_tag('assets/js/app.js'); ?>
<?= $this->include('footer') ?>

</html>
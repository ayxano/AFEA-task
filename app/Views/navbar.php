<header style="margin-bottom: 10vh;">
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="<?= site_url(); ?>">Project</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?= (url_is('/') ? 'active' : '') ?>">
                    <a class="nav-link" href="<?= url_to('Home::index'); ?>">Main Page</a>
                </li>
            </ul>
            <?php if(isLogged() == false): ?>
            <ul class="navbar-nav mt-2 mt-md-0">
                <li class="nav-item <?= (url_is('/login') ? 'active' : '') ?>">
                    <a class="nav-link" href="<?= url_to('AuthController::login'); ?>">Login</a>
                </li>
                <li class="nav-item <?= (url_is('/register') ? 'active' : '') ?>">
                    <a class="nav-link" href="<?= url_to('AuthController::register'); ?>">Sign Up</a>
                </li>
            </ul>
            <?php else: ?>
            <ul class="navbar-nav mt-2 mt-md-0">
                <li class="nav-item <?= (url_is('/posts') ? 'active' : '') ?>">
                    <a class="nav-link" href="<?= url_to('PostsController::index'); ?>">My posts</a>
                </li>
                <li class="nav-item <?= (url_is('/posts/new') ? 'active' : '') ?>">
                    <a class="nav-link" href="<?= url_to('PostsController::addPost'); ?>">Add post</a>
                </li>
                <li class="nav-item <?= (url_is('/logout') ? 'active' : '') ?>">
                    <a class="nav-link" href="<?= url_to('AuthController::logout'); ?>">Logout</a>
                </li>
            </ul>
            <?php endif; ?>
        </div>
    </nav>
</header>
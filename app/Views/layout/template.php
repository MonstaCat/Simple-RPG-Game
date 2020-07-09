<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <title><?= $title ?></title>
</head>

<body>
    <?php $uri = service('uri'); ?>
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary <?= (session()->get('role')) == 'Player' || session()->get('isLoggedIn') == null ? 'd-none' : null ?>">
        <div class="container">
            <a class="navbar-brand" href="/login">RPG</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse">
                <?php if (session()->get('isLoggedIn')) : ?>
                    <ul class="nav navbar-nav mr-auto">
                        <li class="nav-item <?= (($uri->getSegment(1)) == 'home') || (($uri->getSegment(1)) == 'admin') ? 'active' : null ?>">
                            <a class="nav-link" href="<?= (session()->get('role') == 'Admin') ? '/admin' : '/home' ?>">Home</a>
                        </li>
                        <li class="nav-item <?= ($uri->getSegment(1)) == 'profile' ? 'active' : null ?>">
                            <a class="nav-link" href="/profile">Profile</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/logout">Logout</a>
                        </li>
                    </ul>
                <?php else : ?>
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item <?= ($uri->getSegment(1)) == 'register' ? 'active' : null ?>">
                            <a class="nav-link" href="/register">Register</a>
                        </li>
                        <li class="nav-item <?= ($uri->getSegment(1)) == 'login' ? 'active' : null ?>">
                            <a class="nav-link" href="/login">Login</a>
                        </li>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </nav>
    <div class="container <?= (session()->get('role')) == 'Admin' ? 'mb-5 pb-5' : null ?>"></div>

    <?= $this->renderSection('content') ?>

    <script src="/assets/js/jquery-3.5.1.slim.min.js"></script>
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/masonry.pkgd.min.js"></script>
    <script src="/assets/js/custom.js"></script>

</body>

</html>
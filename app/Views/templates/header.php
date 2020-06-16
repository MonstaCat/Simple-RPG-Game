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
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="/login">RPG</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse">
                <?php if (session()->get('isLoggedIn')) : ?>
                    <ul class="nav navbar-nav mr-auto">
                        <li class="nav-item <?= ($uri->getSegment(1)) == 'home' ? 'active' : null ?>">
                            <a class="nav-link" href="/home">Home</a>
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
    <div class="container mb-5 pb-5"></div>
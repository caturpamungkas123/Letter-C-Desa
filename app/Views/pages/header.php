<nav class="navbar navbar-expand-lg main-navbar">
    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>

    <ul class="navbar-nav ml-auto">
        <li class="dropdown"><a href="#profil" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="<?= base_url() ?>/asset/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hi, <?= user()->username ?></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right" id="profil">
                <div class="dropdown-divider"></div>
                <a href="<?= base_url('logout') ?>" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
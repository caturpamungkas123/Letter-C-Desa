<div class="main-sidebar background">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="nav">
                <a href="/" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="nav">
                <a href="<?= base_url() ?>/admin/data/datakepemilikan" class="nav-link"><i class="fas fa-file"></i><span>Data Kepemilikan</span></a>
            </li>
            <!-- <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Data Kepemilikan</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="<?= base_url() ?>/admin/data/datakepemilikan/1">Blok 1</a></li>
                    <li><a class="nav-link" href="<?= base_url() ?>/admin/data/datakepemilikan/2">Blok 2</a></li>
                    <li><a class="nav-link" href="<?= base_url() ?>/admin/data/datakepemilikan/3">Blok 3</a></li>
                    <li><a class="nav-link" href="<?= base_url() ?>/admin/data/datakepemilikan/4">Blok 4</a></li>
                    <li><a class="nav-link" href="<?= base_url() ?>/admin/data/datakepemilikan/5">Blok 5</a></li>
                </ul>
            </li> -->
            <li class="nav mt-1">
                <a class="nav-link" href="<?= base_url('admin/data/datatanah') ?>"><i class="fas fa-file"></i><span>Data Tanah</span></a>
            </li>
            <li class="nav mt-1">
                <a class="nav-link" href="<?= base_url('admin/data/tambah') ?>"><i class="fas fa-plus"></i><span>Tambah Data</span></a>
            </li>
        </ul>
    </aside>
</div>
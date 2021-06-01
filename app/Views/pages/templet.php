<!-- head -->
<?= $this->include('pages/head') ?>
<!-- end head -->

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <!-- header -->
            <?= $this->include('pages/header') ?>
            <!-- end header -->
            <!-- sidebar/navbar -->
            <?= $this->include('pages/nav') ?>
            <!-- end nav -->

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-body">
                        <?= $this->renderSection('content') ?>
                    </div>
                </section>
            </div>
            <!-- footer -->
            <?= $this->include('pages/footer') ?>
            <!-- endfooter -->
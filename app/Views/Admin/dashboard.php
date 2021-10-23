<?= $this->extend('pages/templet') ?>
<?= $this->section('content') ?>

<div class="section-header">
    <marquee behavior="" scrollamount="10" direction="left">
        <h1>Selamat Datang Di Control Panel Letter C Desa Ampih, Kec.Buluspesantern Kab.Kebumen</h1>
    </marquee>
</div>
<div class="row justify-content-center">
    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="fas fa-user"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Data Tanah</h4>
                </div>
                <div class="card-body">
                    <?= $total_tanah ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
                <i class="fas fa-newspaper"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Warga</h4>
                </div>
                <div class="card-body">
                    <?= $total_warga ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
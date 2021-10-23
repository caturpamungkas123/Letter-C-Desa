<?= $this->extend('pages/templet') ?>
<?= $this->section('content') ?>
<div class="section-header">
    <h4>Bukti Transaksi</h4>
    <div onclick="window.print()" class="btn btn-lg btn-warning ml-auto"><i class="fa fa-print"></i> Cetak</div>
</div>
<div class="row">
    <img id="foto_transaksi" src="<?= base_url('img/transaksi/' . $image . '') ?>" class="img-fluid img-thumbnail" alt="Responsive image">
</div>

<?= $this->endSection() ?>
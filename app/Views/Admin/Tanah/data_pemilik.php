<?= $this->extend('pages/templet') ?>
<?= $this->section('content') ?>

<div class="section-header">
    <h4>Data Kepemilikan</h4>
</div>
<div class="col-12 col-md-12 col-lg-12">
    <div class="card card-content">
        <div class="card-header">
            <a href="<?= base_url() ?>/admin/data/tambah" class="btn btn-primary btn-action" data-toggle="tooltip" title="Tambah"><i class="fas fa-plus pt-2"></i></a>
            <a href="<?= base_url('admin/data/dataKepemilikan') ?>" class="btn btn-primary btn-action ml-sm-1 ml-md-3" data-toggle="tooltip" title="Reload"><i class="fa fa-refresh"></i></a>
            <h4></h4>
            <div class="card-header-form">
                <form action="<?= base_url() ?>/admin/data/dataKepemilikan" method="GET">
                    <div class="input-group">
                        <input name="keywords" type="text" class="form-control" placeholder="Search">
                        <div class="input-group-btn">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <tr class="table-lurus table-title">
                        <th>Nomer Buku C</th>
                        <th>Nama Pemilik</th>
                        <th>Bin</th>
                        <th>Aksi</th>
                    </tr>
                    <?php foreach ($pemilik as $pemilik) : ?>
                        <tr class="table-lurus">
                            <td><?= $pemilik['no_buku_c'] ?></td>
                            <td><?= $pemilik['nama_pemilik'] ?></td>
                            <td><?= $pemilik['bin'] ?></td>
                            <td>
                                <a href="<?= base_url() ?>/admin/data/detailkepemilikan/<?= $pemilik['no_buku_c'] ?>/<?= $pemilik['nama_pemilik'] ?>" data-toggle="tooltip" title="Detail" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                <a href="<?= base_url() ?>/admin/tanah/tambah_data_tanah/<?= $pemilik['no_buku_c'] ?>/<?= $pemilik['nama_pemilik'] ?>/<?= $pemilik['bin'] ?>" data-toggle="tooltip" title="Tambah" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                                <a href="<?= base_url() ?>/admin/cetak/cetak/<?= $pemilik['no_buku_c'] ?>/<?= $pemilik['nama_pemilik'] ?>" target="_blank" data-toggle="tooltip" title="Print" class="btn btn-warning"><i class="fa fa-print"></i></a>
                                <a href="<?= base_url() ?>/admin/cetak/download/<?= $pemilik['no_buku_c'] ?>/<?= $pemilik['nama_pemilik'] ?>" data-toggle="tooltip" title="Download" class="btn btn-info"><i class="fa fa-download"></i></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<?= $this->endSection() ?>
<?= $this->extend('pages/templet') ?>
<?= $this->section('content') ?>

<div class="section-header">
    <h4>Data Kepemilikan Tanah</h4>
</div>
<div class="col-12 col-md-12 col-lg-12">
    <div class="card card-content">
        <div class="card-header">
            <a href="" class="btn btn-primary btn-action" data-toggle="tooltip" title="Tambah"><i class="fas fa-plus pt-2"></i></a>
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
                <table class="table table-striped">
                    <tr class="table-lurus table-title">
                        <th>No</th>
                        <th>Nama Pemilik</th>
                        <th>Aksi</th>
                    </tr>
                    <?php $i = 1; ?>
                    <?php foreach ($pemilik as $pemilik) : ?>
                        <tr class="table-lurus">
                            <td><?= $i++ ?></td>
                            <td><?= $pemilik['nama_pemilik'] ?></td>
                            <td>
                                <a href="<?= base_url() ?>/admin/data/detailkepemilikan/<?= $pemilik['nama_pemilik'] ?>" data-toggle="tooltip" title="Detail" class="btn btn-success px-4">
                                    <i class="fa fa-lg fa-eye"></i>
                                </a>
                                <a href="<?= base_url() ?>/admin/tanah/tambah_data_tanah/<?= $pemilik['nama_pemilik'] ?>" data-toggle="tooltip" title="Tambah" class="btn btn-primary px-4"><i class="fa fa-plus"></i></a>
                                <a href="<?= base_url() ?>/admin/cetak/cetak/<?= $pemilik['nama_pemilik'] ?>" target="_blank" data-toggle="tooltip" title="Print" class="btn btn-warning px-4"><i class="fa fa-print"></i></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
        <div class="card-footer text-right">
            <?= $pager->links('pemilik', 'data_kepemilikan') ?>
        </div>
    </div>
</div>
</div>
<?= $this->endSection() ?>
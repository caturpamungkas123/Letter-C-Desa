<?= $this->extend('pages/templet') ?>
<?= $this->section('content') ?>

<div class="section-header">
    <h4>Data Tanah Desa Ampih</h4>
    <div class="success" data-success="<?= session()->getFlashdata('success') ?>"></div>
</div>
<div class="col-12 col-md-12 col-lg-12">
    <div class="card card-content">
        <div class="card-header">
            <a href="<?= base_url('admin/data/tambah') ?>" class="btn btn-primary btn-action" data-toggle="tooltip" title="Tambah"><i class="fas fa-plus pt-2"></i></a>
            <a href="<?= base_url('admin/data/datatanah') ?>" class="btn ml-3 btn-primary btn-action" data-toggle="tooltip" title="Refresh"><i class="fas fa-refresh pt-2"></i></a>
            <h4></h4>
            <div class="card-header-form">
                <form action="<?= base_url('admin/data/datatanah') ?>" method="GET">
                    <div class="input-group">
                        <input type="text" name="keywords" class="form-control" placeholder="Search">
                        <div class="input-group-btn">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-md">
                    <tr class="table-lurus table-title">
                        <th>Nama Pemilik</th>
                        <th>Bin</th>
                        <th>Nomer Persil</th>
                        <th>Aksi</th>
                    </tr>
                    <?php foreach ($data as $data) : ?>
                        <tr class="table-lurus">
                            <td><?= $data['nama_pemilik'] ?></td>
                            <td><?= $data['bin'] ?></td>
                            <td><?= $data['nomer_persil'] ?></td>
                            <td>
                                <a href="<?= base_url() ?>/admin/tanah/detailTanah/<?= $data['id'] ?>" data-toggle="tooltip" title="Lihat" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                <a href="<?= base_url() ?>/admin/tanah/edit/<?= $data['id'] ?>" data-toggle="tooltip" title="Edit" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                <a href="<?= base_url() ?>/admin/tanah/hapus/<?= $data['id'] ?>" data-toggle="tooltip" title="Hapus" class="btn btn-danger hapus"><i class="fas fa-archive"></i></a>
                                <a href="<?= base_url() ?>/admin/cetak/viewImage/<?= $data['id'] ?>" data-toggle="tooltip" title="View Image" class="btn btn-info"><i class="fa fa-image"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
        <div class="card-footer text-right">
            <nav class="d-inline-block">
                <?= $pager->links('tanah', 'data_tanah') ?>
            </nav>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
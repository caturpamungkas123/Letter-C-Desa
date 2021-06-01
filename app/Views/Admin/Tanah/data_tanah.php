<?= $this->extend('pages/templet') ?>
<?= $this->section('content') ?>

<div class="section-header">
    <h4>Data Tanah Desa Ampih</h4>
    <div class="success" data-success="<?= session()->getFlashdata('success') ?>"></div>
</div>
<div class="col-12 col-md-12 col-lg-12">
    <div class="card">
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
                    <tr class="table-lurus">
                        <th>Blok</th>
                        <th>NOP</th>
                        <th>Nama Pemilik</th>
                        <th>Aksi</th>
                    </tr>
                    <?php foreach ($data as $data) : ?>
                        <tr class="table-lurus">
                            <td><?= $data['no_block'] ?></td>
                            <td><?= $data['nop'] ?></td>
                            <td>
                                <a href="" data-toggle="modal" data-target="#modal-<?= $data['nop'] ?>"><?= $data['nama_pemilik'] ?></a>
                            </td>
                            <td>
                                <a href="<?= base_url() ?>/admin/tanah/edit/<?= $data['nop'] ?>" data-toggle="tooltip" title="Edit" class="btn btn-success mr-2"><i class="fas fa-edit"></i></a>
                                <div data-toggle="tooltip" title="Print" class="btn btn-warning mr-2"><i class="fa fa-print"></i></div>
                                <a href="<?= base_url() ?>/admin/tanah/hapus/<?= $data['nop'] ?>" data-toggle="tooltip" title="Hapus" class="btn btn-danger hapus"><i class="fas fa-crutch"></i></a>
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
<!-- modal -->
<!-- modal -->
<?php foreach ($tanah as $tanah) : ?>
    <div class="modal fade modal-detail" tabindex="-1" role="dialog" id="modal-<?= $tanah['nop'] ?>">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">NOP : <?= $tanah['nop'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4">
                                <table class="table">
                                    <tr>
                                        <td class="coba">Nama Pemilik</td>
                                        <td class="titik2">:</tdstyle=>
                                        <td><?= $tanah['nama_pemilik'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="coba">No Blok</td>
                                        <td class="titik2">:</tdstyle=>
                                        <td><?= $tanah['no_block'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Luas Tanah NOP</tdstyle=>
                                        <td>:</td>
                                        <td><?= $tanah['luas_tanah_nop'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Luas Rumah NOP</td>
                                        <td>:</td>
                                        <td><?= $tanah['luas_rumah_nop'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tahun</td>
                                        <td>:</td>
                                        <td><?= $tanah['tahun'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tagihan</td>
                                        <td>:</td>
                                        <td><?= $tanah['tagihan'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>No Buku C</td>
                                        <td>:</td>
                                        <td><?= $tanah['no_buku_c'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Buku C</td>
                                        <td>:</td>
                                        <td><?= $tanah['nama_buku_c'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nomer Persil</td>
                                        <td>:</td>
                                        <td><?= $tanah['nomer_persil'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Kelas</td>
                                        <td>:</td>
                                        <td><?= $tanah['kelas'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis NOP</td>
                                        <td>:</td>
                                        <td><?= $tanah['jenis_nop'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Luas Buku C</td>
                                        <td>:</td>
                                        <td><?= $tanah['luas_buku_c'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>:</td>
                                        <td><?= $tanah['alamat'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Mutasi</td>
                                        <td>:</td>
                                        <td><?= $tanah['ket_mutasi'] ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6 ml-auto">
                                <table class="table">
                                    <tr>
                                        <ul>Gambar Tanah
                                            <li>
                                                <img width="400" src="<?= base_url() ?>/img/tanah/<?= $tanah['gambar_peta'] ?>" alt="">
                                            </li>
                                        </ul>
                                    </tr>
                                    <tr>
                                        <ul>Gambar Buku C
                                            <li>
                                                <img width="400" src="<?= base_url() ?>/img/buku/<?= $tanah['gambar_buku_c'] ?>" alt="">
                                            </li>
                                        </ul>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>
<!-- end modal -->
<?= $this->endSection() ?>
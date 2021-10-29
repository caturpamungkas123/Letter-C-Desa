<?= $this->extend('pages/templet') ?>
<?= $this->section('content') ?>

<div class="section-header">
    <h4>Data Tanah <?= $nama['nama_pemilik'] ?></h4>

    <div class="section-header-breadcrumb">
        <a href="<?= base_url() ?>/admin/tanah/tambah_data_tanah/<?= $noBuku ?>/<?= $nama['nama_pemilik'] ?>/<?= $nama['bin'] ?>" class="btn btn-outline-primary"><i class="fa fa-plus"></i> Tambah</a>
    </div>
    <div class="section-header-button">
        <button type="button" class="btn btn-sm btn-success btn-icon icon-left">
            <i class="fas fa-file"></i> Total Data <span class="badge badge-transparent"><?= $total_data ?></span>
        </button>
    </div>
</div>


<div class="row">
    <?php foreach ($pemilik as $key) : ?>
        <div class="mr-2 col-sm-12 col-md-2">
            <div class="card p-3 btn icon-document" id="icon-doc" data-toggle="modal" data-target="#modal-<?= $key['nomer_persil'] ?>" style="width: 10rem; height: 15rem;">
                <img src="<?= base_url() ?>/img/document.png" class="card-img-top">
                <div class="card-body">
                    <p class="card-text h5"><?= $key['nomer_persil'] ?></p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<!-- modal -->
<?php foreach ($pemilik as $key) : ?>
    <div class="modal fade modal-detail" tabindex="-1" role="dialog" id="modal-<?= $key['nomer_persil'] ?>">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nomer Persil : <?= $key['nomer_persil'] ?></h5>
                    <a href="<?= base_url('admin/tanah/edit/' . $key['id'] . '') ?>" class="btn btn-success ml-auto"><i class="fa fa-pencil-alt"></i> Edit</a>
                    <a href="<?= base_url('admin/cetak/viewImage/' . $key['id'] . '') ?>" class="btn btn-warning ml-1"><i class="fa fa-print"></i> Print Foto Transaksi</a>
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
                                        <td>Nomer Buku C</tdstyle=>
                                        <td>:</td>
                                        <td><?= $key['no_buku_c'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Luas Tanah NOP</tdstyle=>
                                        <td>:</td>
                                        <td><?= $key['luas_tanah_nop'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Diperoleh</td>
                                        <td>:</td>
                                        <td><?= $key['diperoleh'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>No Buku C</td>
                                        <td>:</td>
                                        <td><?= $key['no_buku_c'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Buku C</td>
                                        <td>:</td>
                                        <td><?= $key['nama_buku_c'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nomer Persil</td>
                                        <td>:</td>
                                        <td><?= $key['nomer_persil'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis NOP</td>
                                        <td>:</td>
                                        <td><?= $key['jenis_nop'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Luas Buku C</td>
                                        <td>:</td>
                                        <td><?= $key['luas_buku_c'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tempat Tinggal</td>
                                        <td>:</td>
                                        <td><?= ($key['alamat'] == 'IIIL' || $key['alamat'] == 'VL' || $key['alamat'] == 'IVL' ? $key['alamat'] . ' ' . $key['asal_desa'] : $key['alamat']) ?></td>
                                    </tr>
                                    <tr>
                                        <td>Mutasi</td>
                                        <td>:</td>
                                        <td><?= $key['ket_mutasi'] ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6 ml-auto">
                                <table class="table">
                                    <tr>
                                        <ul>Bukti Transaksi
                                            <li>
                                                <img width="200" src="<?= base_url() ?>/img/transaksi/<?= $key['foto_transaksi'] ?>" alt="">
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
    <?php endforeach ?>
    <!-- end modal -->
    <?= $this->endSection() ?>
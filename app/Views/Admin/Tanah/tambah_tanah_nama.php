<?= $this->extend('pages/templet') ?>
<?= $this->section('content') ?>

<div class="section-header">
    <h4>Tambah Data Tanah <?= $nama ?></h4>
    <div class="success" data-success="<?= session()->getFlashdata('success') ?>"></div>
</div>
<div class="card card-content">
    <div class="card-body">
        <form action="<?= base_url() ?>/admin/tanah/insert/<?= $nama ?>" method="POST" enctype="multipart/form-data">
            <div class="letter">
                <div class="form-group">
                    <label for="blok">No Blok</label>
                    <input name="no_blok" type="number" autofocus class="form-control col-md-3" id="blok">
                </div>
                <hr>

                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="NOP">NOP</label>
                        <input type="number" name="nop" class="form-control <?= ($validat->hasError('nop') ? 'is-invalid' : '') ?>" id="NOP">
                        <div class="invalid-feedback">
                            <?= $validat->getError('nop') ?>
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="NAMANOP">Nama NOP</label>
                        <input type="text" name="" class="form-control" disabled="true" value="<?= $nama ?>" id="NAMANOP">
                        <input type="hidden" name="nama_nop" value="<?= $nama ?>">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="luastnah">luas Tanah NOP</label>
                        <input type="number" name="luas_tanah_nop" class="form-control <?= ($validat->hasError('luas_tanah_nop') ? 'is-invalid' : '') ?>" id="luastnah">
                        <div class="invalid-feedback">
                            <?= $validat->getError('luas_tanah_nop') ?>
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="luasrumah">Luas Rumah NOP</label>
                        <input type="number" class="form-control <?= ($validat->hasError('luas_rumah_nop') ? 'is-invalid' : '') ?>" name="luas_rumah_nop" id="luasrumah">
                        <div class="invalid-feedback">
                            <?= $validat->getError('luas_rumah_nop') ?>
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="tahun">Tahun</label>
                        <input type="number" class="form-control <?= ($validat->hasError('tahun') ? 'is-invalid' : '') ?>" id="tahun" name="tahun">
                        <div class="invalid-feedback">
                            <?= $validat->getError('tahun') ?>
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="Tagihan">Tagihan</label>
                        <input type="number" class="form-control <?= ($validat->hasError('tagihan') ? 'is-invalid' : '') ?>" id="Tagihan" name="tagihan">
                        <div class="invalid-feedback">
                            <?= $validat->getError('tagihan') ?>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="nobuku">No Buku C</label>
                        <input type="number" class="form-control <?= ($validat->hasError('no_buku_c') ? 'is-invalid' : '') ?>" id="nobuku" name="no_buku_c">
                        <div class="invalid-feedback">
                            <?= $validat->getError('no_buku_c') ?>
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="namabuku">Nama Buku C</label>
                        <input type="text" class="form-control <?= ($validat->hasError('nama_buku_c') ? 'is-invalid' : '') ?>" id="namabuku" name="nama_buku_c">
                        <div class="invalid-feedback">
                            <?= $validat->getError('nama_buku_c') ?>
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="nopersil">Nomer Persil</label>
                        <input type="number" class="form-control <?= ($validat->hasError('nomer_persil') ? 'is-invalid' : '') ?>" id="nopersil" name="nomer_persil">
                        <div class="invalid-feedback">
                            <?= $validat->getError('nomer_persil') ?>
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="kelas">Kelas</label>
                        <input type="number" class="form-control <?= ($validat->hasError('kelas') ? 'is-invalid' : '') ?>" id="kelas" name="kelas">
                        <div class="invalid-feedback">
                            <?= $validat->getError('kelas') ?>
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <div class="form-group">
                            <label>Jenis NOP</label>
                            <select class="form-control selectric" name="jenis_nop">
                                <option value="sawah">Sawah</option>
                                <option value="tanah_kering">Tanah Kering</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="luasbukuc">Luas Buku C</label>
                        <input type="number" class="form-control <?= ($validat->hasError('luas_buku_c') ? 'is-invalid' : '') ?>" name="luas_buku_c" id="luasbukuc">
                        <div class="invalid-feedback">
                            <?= $validat->getError('luas_buku_c') ?>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="alamat">Alamat</label>
                        <input type="number" class="form-control <?= ($validat->hasError('alamat') ? 'is-invalid' : '') ?>" id="alamat" name="alamat">
                        <div class="invalid-feedback">
                            <?= $validat->getError('alamat') ?>
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="ketmutasi">Ket. Mutasi</label>
                        <input type="text" class="form-control <?= ($validat->hasError('ket_mutasi') ? 'is-invalid' : '') ?>" id="ketmutasi" name="ket_mutasi">
                        <div class="invalid-feedback">
                            <?= $validat->getError('ket_mutasi') ?>
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Foto Tanah</label>
                        <input type="file" onchange="previewTanah()" id="tanah" class="form-control <?= ($validat->hasError('foto_tanah') ? 'is-invalid' : '') ?>" name="foto_tanah">
                        <div class="invalid-feedback">
                            <?= $validat->getError('foto_tanah') ?>
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <img width="150" height="230" src="<?= base_url('img/no-image.png') ?>" class="img-thumbnail img-tanah">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Foto Buku C</label>
                        <input type="file" onchange="buku()" id="buku_c" class="form-control <?= ($validat->hasError('foto_buku_c') ? 'is-invalid' : '') ?>" name="foto_buku_c">
                        <div class="invalid-feedback">
                            <?= $validat->getError('foto_buku_c') ?>
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <img width="150" height="230" src="<?= base_url('img/no-image.png') ?>" class="img-thumbnail img-buku">
                    </div>
                </div>
                <div class="card-footer" id="button">
                    <button class="btn btn-primary">Kirim</button>
                </div>
            </div>
        </form>
    </div>
    <?= $this->endSection() ?>
<?= $this->extend('pages/templet') ?>
<?= $this->section('content') ?>

<div class="section-header">
    <h4>Edit Data <?= $data['nop'] ?></h4>
</div>
<div class="card">
    <div class="card-body">
        <form action="<?= base_url() ?>/admin/tanah/saveedit/<?= $data['nop'] ?>" method="POST" enctype="multipart/form-data">
            <div class="letter">
                <div class="form-group">
                    <label for="blok">No Blok</label>
                    <input name="no_blok" type="number" value="<?= $data['no_block'] ?>" class="form-control col-md-3" id="blok">
                </div>
                <hr>

                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="NOP">NOP</label>
                        <input type="number" value="<?= $data['nop'] ?>" name="nop" class="form-control <?= ($validat->hasError('nop') ? 'is-invalid' : '') ?>" id="NOP">
                        <div class="invalid-feedback">
                            <?= $validat->getError('nop') ?>
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="NAMANOP">Nama NOP</label>
                        <input type="text" value="<?= $data['nama_pemilik'] ?>" name="nama_nop" class="form-control" id="NAMANOP">
                        <div class="invalid-feedback">
                            Bajinagn
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="luastnah">luas Tanah NOP</label>
                        <input type="number" value="<?= $data['luas_tanah_nop'] ?>" name="luas_tanah_nop" class="form-control" id="luastnah">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="luasrumah">Luas Rumah NOP</label>
                        <input type="number" value="<?= $data['luas_rumah_nop'] ?>" class="form-control" name="luas_rumah_nop" id="luasrumah">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="tahun">Tahun</label>
                        <input type="number" value="<?= $data['tahun'] ?>" class="form-control" id="tahun" name="tahun">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="Tagihan">Tagihan</label>
                        <input type="number" value="<?= $data['tagihan'] ?>" class="form-control" id="Tagihan" name="tagihan">
                    </div>
                </div>
                <hr>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="nobuku">No Buku C</label>
                        <input type="number" value="<?= $data['no_buku_c'] ?>" class="form-control" id="nobuku" name="no_buku_c">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="namabuku">Nama Buku C</label>
                        <input type="text" value="<?= $data['nama_buku_c'] ?>" class="form-control" id="namabuku" name="nama_buku_c">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="nopersil">Nomer Persil</label>
                        <input type="number" value="<?= $data['nomer_persil'] ?>" class="form-control" id="nopersil" name="nomer_persil">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="kelas">Kelas</label>
                        <input type="number" value="<?= $data['kelas'] ?>" class="form-control" id="kelas" name="kelas">
                    </div>
                    <div class="form-group col-md-2">
                        <div class="form-group">
                            <label>Jenis NOP</label>
                            <select class="form-control selectric" name="jenis_nop">
                                <option value="<?= $data['jenis_nop'] ?>"><?= $data['jenis_nop'] ?></option>
                                <option value="sawah">Sawah</option>
                                <option value="tanah kering">Tanah Kering</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="luasbukuc">Luas Buku C</label>
                        <input type="number" value="<?= $data['luas_buku_c'] ?>" class="form-control" name="luas_buku_c" id="luasbukuc">
                    </div>
                </div>
                <hr>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="alamat">Alamat</label>
                        <input type="number" value="<?= $data['alamat'] ?>" class="form-control" id="alamat" name="alamat">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="ketmutasi">Ket. Mutasi</label>
                        <input type="text" value="<?= $data['ket_mutasi'] ?>" class="form-control" id="ketmutasi" name="ket_mutasi">
                    </div>

                    <div class="form-group col-md-2">
                        <label>Foto Tanah</label>
                        <input type="hidden" name="foto_tanah_lama" value="<?= $data['gambar_peta'] ?>">
                        <input type="file" name="foto_tanah" onchange="previewTanah()" id="tanah" class="form-control <?= ($validat->hasError('foto_tanah') ? 'is-invalid' : '') ?>">
                        <div class="invalid-feedback">
                            <?= $validat->getError('foto_tanah') ?>
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <img width="150" height="230" src="<?= base_url() ?>/img/tanah/<?= $data['gambar_peta'] ?>" class="img-thumbnail img-tanah">
                    </div>


                    <div class="form-group col-md-2">
                        <label>Foto Buku C</label>
                        <input type="hidden" name="foto_buku_c_lama" value="<?= $data['gambar_buku_c'] ?>">
                        <input type="file" name="foto_buku_c" onchange="buku()" id="buku_c" class="form-control <?= ($validat->hasError('foto_buku_c') ? 'is-invalid' : '') ?>">
                        <div class="invalid-feedback">
                            <?= $validat->getError('foto_buku_c') ?>
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <img width="150" height="230" src="<?= base_url() ?>/img/buku/<?= $data['gambar_buku_c'] ?>" class="img-thumbnail img-buku">
                    </div>
                </div>
                <div class="card-footer" id="button">
                    <button class="btn btn-primary">Ubah</button>
                </div>
            </div>
        </form>
    </div>
    <?= $this->endSection() ?>
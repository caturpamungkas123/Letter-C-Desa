<?= $this->extend('pages/templet') ?>
<?= $this->section('content') ?>

<div class="section-header">
    <h3>Edit Data <?= $data['nama_pemilik'] ?></h3>
    <div class="success" data-success="<?= session()->getFlashdata('success') ?>"></div>
</div>
<div class="card card-content">
    <div class="card-body">
        <form action="<?= base_url() ?>/admin/tanah/saveedit/<?= $data['id'] ?>" method="POST" enctype="multipart/form-data">
            <div class="letter">
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="NAMANOP">Nama Pemilik</label>
                        <input type="text" name="nama_nop" value="<?= $data['nama_pemilik'] ?>" class="form-control <?= ($validat->hasError('nama_nop') ? 'is-invalid' : '') ?>" id="NAMANOP">
                        <input type="hidden" name="nama_pemilik_lama" value="<?= $data['nama_pemilik'] ?>">
                        <div class="invalid-feedback">
                            <?= $validat->getError('nama_nop') ?>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="bin">Bin</label>
                        <input type="text" name="bin" value="<?= $data['bin'] ?>" class="form-control <?= ($validat->hasError('bin') ? 'is-invalid' : '') ?>" id="bin">
                        <div class="invalid-feedback">
                            <?= $validat->getError('bin') ?>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="asal">Asal Diperoleh</label>
                        <input type="number" name="asal" value="<?= $data['asal'] ?>" class="form-control <?= ($validat->hasError('asal') ? 'is-invalid' : '') ?>" id="asal">
                        <div class="invalid-feedback">
                            <?= $validat->getError('asal') ?>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="luastnah">luas Tanah NOP / ha</label>
                        <input type="text" name="luas_tanah_nop" value="<?= $data['luas_tanah_nop'] ?>" class="form-control <?= ($validat->hasError('luas_tanah_nop') ? 'is-invalid' : '') ?>" id="luastnah">
                        <div class="invalid-feedback">
                            <?= $validat->getError('luas_tanah_nop') ?>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="diperoleh">Tahun Diperoeh</label>
                        <input type="date" value="<?= $data['diperoleh'] ?>" class="form-control <?= ($validat->hasError('diperoleh') ? 'is-invalid' : '') ?>" id="diperoleh" name="diperoleh">
                        <div class="invalid-feedback">
                            <?= $validat->getError('diperoleh') ?>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="nobuku">No Buku C</label>
                        <input type="number" value="<?= $data['no_buku_c'] ?>" class="form-control <?= ($validat->hasError('no_buku_c') ? 'is-invalid' : '') ?>" id="nobuku" name="no_buku_c">
                        <div class="invalid-feedback">
                            <?= $validat->getError('no_buku_c') ?>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="nopersil">Nomer Persil</label>
                        <input type="number" value="<?= $data['nomer_persil'] ?>" class="form-control <?= ($validat->hasError('nomer_persil') ? 'is-invalid' : '') ?>" id="nopersil" name="nomer_persil">
                        <div class="invalid-feedback">
                            <?= $validat->getError('nomer_persil') ?>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <div class="form-group">
                            <label>Kelas</label>
                            <select class="form-control selectric <?= ($validat->hasError('jenis_nop') ? 'is-invalid' : '') ?>" name="jenis_nop">
                                <option value="<?= $data['jenis_nop'] ?>"><?= $data['jenis_nop'] ?></option>
                                <option value="DI">D I</option>
                                <option value="DII">D II</option>
                                <option value="DIII">D III</option>
                                <option value="DIV">D IV</option>
                                <option value="DV">D V</option>
                                <option value="DVI">D VI</option>
                                <option value="SI">S I</option>
                                <option value="SII">S II</option>
                                <option value="SIII">S III</option>
                                <option value="SIV">S IV</option>
                                <option value="SV">S V</option>
                                <option value="SVI">S VI</option>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validat->getError('jenis_nop') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="luasbukuc">Luas Buku C / ha</label>
                        <input type="text" value="<?= $data['luas_buku_c'] ?>" class="form-control <?= ($validat->hasError('luas_buku_c') ? 'is-invalid' : '') ?>" name="luas_buku_c" id="luasbukuc">
                        <div class="invalid-feedback">
                            <?= $validat->getError('luas_buku_c') ?>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="alamat">Tempat Tinggal</label>
                        <div class="row">
                            <div class="col">
                                <select onchange="cekLive()" name="rw" id="rw" class="form-control selectric <?= ($validat->hasError('rw') ? 'is-invalid' : '') ?>">
                                    <option value="<?= $data['alamat'] ?>"><?= $data['alamat'] ?></option>
                                    <option value="I">I</option>
                                    <option value="II">II</option>
                                    <option value="III">III</option>
                                    <option value="IV">IV</option>
                                    <option value="V">V</option>
                                    <option disabled>------------
                                    </option>
                                    <option value="VL">VL</option>
                                    <option value="IIIL">III L</option>
                                    <option value="IVL">IV L</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validat->getError('rw') ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="almt">Alamat</label>
                        <input type="text" class="form-control" value="<?= $data['asal_desa'] ?>" id="almt" name="luar_desa">
                        <small class="form-text form-muted">Diisi bilamana diluar desa Ampih</small>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="ketmutasi">Ket.Mutasi</label>
                        <select name="ket_mutasi" class="form-control selectric <?= ($validat->hasError('ket_mutasi') ? 'is-invalid' : '') ?>" id="mutasi">
                            <option value="<?= $data['ket_mutasi'] ?>"><?= $data['ket_mutasi'] ?></option>
                            <option value="JB">Jual Beli</option>
                            <option value="WRS">Warisan</option>
                            <option value="HB">Hibah</option>
                            <option value="TG">Tukar Guling</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validat->getError('ket_mutasi') ?>
                        </div>
                    </div>

                    <div class="form-group col-md">
                        <label for="foto_transaksi">Foto Transaksi</label>
                        <input type="file" onchange="previewImg()" id="foto_transaksi" class="<?= ($validat->hasError('foto_transaksi') ? 'is-invalid' : '') ?>" name="foto_transaksi">
                        <input type="hidden" name="foto_transaksi_lama" value="<?= $data['foto_transaksi'] ?>">
                        <div class="invalid-feedback">
                            <?= $validat->getError('foto_transaksi') ?>
                        </div>
                    </div>
                    <div class="form-group col-md">
                        <img width="300" height="200" src="<?= base_url() ?>/img/transaksi/<?= $data['foto_transaksi'] ?>" class="img-thumbnail transaksi">
                    </div>
                </div>
                <div class="card-footer" id="button">
                    <button class="btn btn-md btn-primary"><i class="fa fa-plus"></i> Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
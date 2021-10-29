<?= $this->extend('pages/templet') ?>
<?= $this->section('content') ?>

<div class="section-header">
  <h4>Data Tanah <?= $data['nama_pemilik'] ?></h4>
  <section class="ml-auto">
    <a href="<?= base_url() ?>/admin/tanah/edit/<?= $data['id'] ?>" class="btn btn-success mr-3">Edit</a>
    <div onclick="goBack()" class="btn btn-primary rounded-circle ml-auto"><i class="fa fa-lg fa-arrow-left"></i></div>
  </section>
</div>

<div class="col-12 col-md-12 col-lg-12 letter">
  <div class="card card-content">
    <div class="card-body p-0">
      <table style="margin-bottom: 5px;width: 100% ">
        <tr>
          <th style="width: 50%;">NAMA WAJIB-IPEDA : <?= $data['nama_pemilik'] ?></th>
          <th style="width: 20%;">NO: <?= $data['no_buku_c'] ?></th>
          <th style="width: 30%;">TEMPAT TINGGAL : <?= ($data['alamat'] == 'VL' || $data['alamat'] == 'IIIL' || $data['alamat'] == 'IVL' ? $data['alamat'] . ' ' . $data['asal_desa'] : $data['alamat']) ?></th>
        </tr>
        <tr>
          <th style="padding-left: 150px;">Bin <?= $data['bin'] ?></th>
        </tr>
      </table>
      <table style="width:100%;" class="table-bordered">
        <thead>
          <tr>
            <th colspan="7" class="text-center" style="width:50%">SAWAH</th>
            <th colspan="7" class="text-center" style="width:50%">TANAH KERING</th>
          </tr>
          <tr>
            <th rowspan="3" class="text-center">Nomer<br>Persil<br>dan<br>huruf<br>bagian<br>persil</th>
            <th class="text-center" style="writing-mode: vertical-lr;" rowspan="3">Kelas desa</th>
            <th colspan="4" class="text-center">Menurut daftar<br>perinci</th>
            <th rowspan="3" class="text-center">Sebab dan<br>Tanggal<br>perubahan</th>
            <th rowspan="3" class="text-center">Nomer<br>Persil<br>dan<br>huruf<br>bagian<br>persil</th>
            <th class="text-center" style="writing-mode: vertical-lr;" rowspan="3">Kelas desa</th>
            <th colspan="4" class="text-center">Menurut daftar<br>perinci</th>
            <th rowspan="3" class="text-center">Sebab dan<br>Tanggal<br>perubahan</th>
          </tr>
          <tr>
            <th colspan="2" class="text-center">Luas<br>milik</th>
            <th colspan="2" class="text-center">Ipeda</th>
            <th colspan="2" class="text-center">Luas<br>milik</th>
            <th colspan="2" class="text-center">Ipeda</th>
          </tr>
          <tr>
            <th class="text-center">ha</th>
            <th class="text-center">da</th>
            <th class="text-center">R.</th>
            <th class="text-center">S.</th>
            <th class="text-center">ha</th>
            <th class="text-center">da</th>
            <th class="text-center">R.</th>
            <th class="text-center">S.</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php if ($data['jenis_tanah'] == 'sawah') : ?>
              <td><?= $data['nomer_persil'] ?></td>
              <td><?= $data['jenis_nop'] ?></td>
              <td><?= $data['luas_tanah_nop'] ?></td>
              <td>-</td>
              <td>-</td>
              <td>-</td>
              <td><?= date('j-n-y', strtotime($data['diperoleh'])) ?> <?= $data['ket_mutasi'] ?> <?= $data['asal'] ?></td>
              <td>-</td>
              <td>-</td>
              <td>-</td>
              <td>-</td>
              <td>-</td>
              <td>-</td>
              <td>-</td>
            <?php else : ?>
              <td>-</td>
              <td>-</td>
              <td>-</td>
              <td>-</td>
              <td>-</td>
              <td>-</td>
              <td>-</td>
              <td><?= $data['nomer_persil'] ?></td>
              <td><?= $data['jenis_nop'] ?></td>
              <td><?= $data['luas_tanah_nop'] ?></td>
              <td>-</td>
              <td>-</td>
              <td>-</td>
              <td><?= date('j-n-y', strtotime($data['diperoleh'])) ?> <?= $data['ket_mutasi'] ?> <?= $data['asal'] ?></td>
            <?php endif; ?>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- image transaksi -->
<div class="col-12">
  <div class="card card-content">
    <img src="<?= base_url('img/transaksi/' . $data['foto_transaksi'] . '') ?>" class="img-fluid img-thumbnail" alt="Images transaksi">
  </div>
</div>
<?= $this->endSEction() ?>
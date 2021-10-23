<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use \Mpdf\Mpdf;
use App\Models\Admin\Pemilik_Model;
use App\Models\Admin\Tanah_Model;

class Cetak extends BaseController
{
  protected $pemilik;
  protected $tanah;
  public function __construct()
  {
    $this->pemilik = new Pemilik_Model();
    $this->tanah = new Tanah_Model();
  }

  public function cetak($nop, $nama)
  {
    // cari data berdasarkan nama
    $pemilik = $this->tanah->detailPemilik($nop, $nama)->findAll();
    foreach ($pemilik as $dataPemilik);
    $mpdf = new Mpdf([
      'format' => 'A4',
      'orientation' => 'P',
      'margin_left' => 5,
      'margin_right' => 5,
      'margin_top' => 5,
      'margin_bottom' => 5,
    ]);
    $letter = '<table style="margin-bottom: 5px;width: 100%;">
       <tr>
         <th style="width: 50%;">NAMA WAJIB-IPEDA : ' . $dataPemilik['nama_pemilik'] . '</th>
         <th style="width: 20%;">NO: ' . $dataPemilik['no_buku_c'] . '</th>
         <th style="width: 30%;">TEMPAT TINGGAL : ' . $dataPemilik['alamat'] . '</th>
       </tr>
       <tr>
         <th style="padding-left: 120px;">Bin Sakiya</th>
       </tr>
     </table>
     <table style="width:100%;border:1px solid black;border-collapse: collapse;" class="table-bordered">
       <thead>
         <tr>
           <th colspan="7" class="text-center" style="width:50%;border:1px solid black;border-collapse: collapse;">SAWAH</th>
           <th colspan="7" class="text-center" style="width:50%;border:1px solid black;border-collapse: collapse;">TANAH KERING</th>
         </tr>
         <tr>
           <th style="border:1px solid black;border-collapse: collapse;" rowspan="3" class="text-center">Nomer<br>Persil<br>dan<br>huruf<br>bagian<br>persil</th>
           <th text-rotate="90" class="text-center" style="border:1px solid black;border-collapse: collapse;" rowspan="3">Kelas desa</th>
           <th style="border:1px solid black;border-collapse: collapse;" colspan="4" class="text-center">Menurut daftar<br>perinci</th>
           <th style="border:1px solid black;border-collapse: collapse;" rowspan="3" class="text-center">Sebab dan<br>Tanggal<br>perubahan</th>
           <th style="border:1px solid black;border-collapse: collapse;" rowspan="3" class="text-center">Nomer<br>Persil<br>dan<br>huruf<br>bagian<br>persil</th>
           <th text-rotate="90" class="text-center" style="border:1px solid black;border-collapse: collapse;" rowspan="3">Kelas desa</th>
           <th style="border:1px solid black;border-collapse: collapse;" colspan="4" class="text-center">Menurut daftar<br>perinci</th>
           <th style="border:1px solid black;border-collapse: collapse;" rowspan="3" class="text-center">Sebab dan<br>Tanggal<br>perubahan</th>
         </tr>
         <tr>
           <th style="border:1px solid black;border-collapse: collapse;" colspan="2" class="text-center">Luas<br>milik</th>
           <th style="border:1px solid black;border-collapse: collapse;" colspan="2" class="text-center">Ipeda</th>
           <th style="border:1px solid black;border-collapse: collapse;" colspan="2" class="text-center">Luas<br>milik</th>
           <th style="border:1px solid black;border-collapse: collapse;" colspan="2" class="text-center">Ipeda</th>
         </tr>
         <tr>
           <th style="border:1px solid black;border-collapse: collapse;" class="text-center">ha</th>
           <th style="border:1px solid black;border-collapse: collapse;" class="text-center">da</th>
           <th style="border:1px solid black;border-collapse: collapse;" class="text-center">R.</th>
           <th style="border:1px solid black;border-collapse: collapse;" class="text-center">S.</th>
           <th style="border:1px solid black;border-collapse: collapse;"class="text-center">ha</th>
           <th style="border:1px solid black;border-collapse: collapse;"class="text-center">da</th>
           <th style="border:1px solid black;border-collapse: collapse;"class="text-center">R.</th>
           <th style="border:1px solid black;border-collapse: collapse;"class="text-center">S.</th>
         </tr>
       </thead>
       <tbody>';
    foreach ($pemilik as $val) {
      $letter .=
        '<tr>';
      if (
        $val['jenis_nop'] == 'DI' ||
        $val['jenis_nop'] == 'DII' ||
        $val['jenis_nop'] == 'DIII' ||
        $val['jenis_nop'] == 'DIV' ||
        $val['jenis_nop'] == 'DV' ||
        $val['jenis_nop'] == 'DVI'
      ) {
        $letter .= '
                              
                                 <td style="border:1px solid black;border-collapse: collapse;"></td>
                                 <td style="border:1px solid black;border-collapse: collapse;"></td>
                                 <td style="border:1px solid black;border-collapse: collapse;"></td>
                                 <td style="border:1px solid black;border-collapse: collapse;"></td>
                                 <td style="border:1px solid black;border-collapse: collapse;"></td>
                                 <td style="border:1px solid black;border-collapse: collapse;"></td>
                                 <td style="border:1px solid black;border-collapse: collapse;"></td>

                                 <td style="border:1px solid black;border-collapse: collapse;">' . $val['nomer_persil'] . '</td>
                                 <td style="border:1px solid black;border-collapse: collapse;">' . $val['jenis_nop'] . '</td>
                                 <td style="border:1px solid black;border-collapse: collapse;">' . $val['luas_tanah_nop'] . '</td>
                                 <td style="border:1px solid black;border-collapse: collapse;">-</td>
                                 <td style="border:1px solid black;border-collapse: collapse;">-</td>
                                 <td style="border:1px solid black;border-collapse: collapse;">-</td>
                                 <td style="border:1px solid black;border-collapse: collapse;">'  . date('j/n/y', strtotime($val['diperoleh'])) . ' ' . $val['ket_mutasi'] . ' ' . $val['asal'] . '</td>
                             </tr>';
      } else {
        $letter .= '
                <td style="border:1px solid black;border-collapse: collapse;">' . $val['nomer_persil'] . '</td>
                <td style="border:1px solid black;border-collapse: collapse;">' . $val['jenis_nop'] . '</td>
                <td style="border:1px solid black;border-collapse: collapse;">' . $val['luas_tanah_nop'] . '</td>
                <td style="border:1px solid black;border-collapse: collapse;">-</td>
                <td style="border:1px solid black;border-collapse: collapse;">-</td>
                <td style="border:1px solid black;border-collapse: collapse;">-</td>
                <td style="border:1px solid black;border-collapse: collapse;">' . date('j/n/y', strtotime($val['diperoleh'])) . ' ' . $val['ket_mutasi'] . ' ' . $val['asal'] . '</td>

                    <td style="border:1px solid black;border-collapse: collapse;"></td>
                    <td style="border:1px solid black;border-collapse: collapse;"></td>
                    <td style="border:1px solid black;border-collapse: collapse;"></td>
                    <td style="border:1px solid black;border-collapse: collapse;"></td>
                    <td style="border:1px solid black;border-collapse: collapse;"></td>
                    <td style="border:1px solid black;border-collapse: collapse;"></td>
                    <td style="border:1px solid black;border-collapse: collapse;"></td>
       
                   
                </tr>';
      }
    }
    $letter .= '</tbody>
     </table>';
    $mpdf->WriteHTML($letter);
    return redirect()->to($mpdf->Output('data-letter-c.pdf', 'I'));
  }

  public function download($nop, $nama)
  {
    // cari data berdasarkan nama
    $pemilik = $this->tanah->detailPemilik($nop, $nama)->findAll();
    foreach ($pemilik as $dataPemilik);
    $mpdf = new Mpdf([
      'format' => 'A4',
      'orientation' => 'P',
      'margin_left' => 5,
      'margin_right' => 5,
      'margin_top' => 5,
      'margin_bottom' => 5,
    ]);
    $letter = '<table style="margin-bottom: 5px;width: 100%;">
       <tr>
         <th style="width: 50%;">NAMA WAJIB-IPEDA : ' . $dataPemilik['nama_pemilik'] . '</th>
         <th style="width: 20%;">NO: ' . $dataPemilik['no_buku_c'] . '</th>
         <th style="width: 30%;">TEMPAT TINGGAL : ' . $dataPemilik['alamat'] . '</th>
       </tr>
       <tr>
         <th style="padding-left: 120px;">Bin Sakiya</th>
       </tr>
     </table>
     <table style="width:100%;border:1px solid black;border-collapse: collapse;" class="table-bordered">
       <thead>
         <tr>
           <th colspan="7" class="text-center" style="width:50%;border:1px solid black;border-collapse: collapse;">SAWAH</th>
           <th colspan="7" class="text-center" style="width:50%;border:1px solid black;border-collapse: collapse;">TANAH KERING</th>
         </tr>
         <tr>
           <th style="border:1px solid black;border-collapse: collapse;" rowspan="3" class="text-center">Nomer<br>Persil<br>dan<br>huruf<br>bagian<br>persil</th>
           <th text-rotate="90" class="text-center" style="border:1px solid black;border-collapse: collapse;" rowspan="3">Kelas desa</th>
           <th style="border:1px solid black;border-collapse: collapse;" colspan="4" class="text-center">Menurut daftar<br>perinci</th>
           <th style="border:1px solid black;border-collapse: collapse;" rowspan="3" class="text-center">Sebab dan<br>Tanggal<br>perubahan</th>
           <th style="border:1px solid black;border-collapse: collapse;" rowspan="3" class="text-center">Nomer<br>Persil<br>dan<br>huruf<br>bagian<br>persil</th>
           <th text-rotate="90" class="text-center" style="border:1px solid black;border-collapse: collapse;" rowspan="3">Kelas desa</th>
           <th style="border:1px solid black;border-collapse: collapse;" colspan="4" class="text-center">Menurut daftar<br>perinci</th>
           <th style="border:1px solid black;border-collapse: collapse;" rowspan="3" class="text-center">Sebab dan<br>Tanggal<br>perubahan</th>
         </tr>
         <tr>
           <th style="border:1px solid black;border-collapse: collapse;" colspan="2" class="text-center">Luas<br>milik</th>
           <th style="border:1px solid black;border-collapse: collapse;" colspan="2" class="text-center">Ipeda</th>
           <th style="border:1px solid black;border-collapse: collapse;" colspan="2" class="text-center">Luas<br>milik</th>
           <th style="border:1px solid black;border-collapse: collapse;" colspan="2" class="text-center">Ipeda</th>
         </tr>
         <tr>
           <th style="border:1px solid black;border-collapse: collapse;" class="text-center">ha</th>
           <th style="border:1px solid black;border-collapse: collapse;" class="text-center">da</th>
           <th style="border:1px solid black;border-collapse: collapse;" class="text-center">R.</th>
           <th style="border:1px solid black;border-collapse: collapse;" class="text-center">S.</th>
           <th style="border:1px solid black;border-collapse: collapse;"class="text-center">ha</th>
           <th style="border:1px solid black;border-collapse: collapse;"class="text-center">da</th>
           <th style="border:1px solid black;border-collapse: collapse;"class="text-center">R.</th>
           <th style="border:1px solid black;border-collapse: collapse;"class="text-center">S.</th>
         </tr>
       </thead>
       <tbody>';
    foreach ($pemilik as $val) {
      $letter .=
        '<tr>';
      if (
        $val['jenis_nop'] == 'DI' ||
        $val['jenis_nop'] == 'DII' ||
        $val['jenis_nop'] == 'DIII' ||
        $val['jenis_nop'] == 'DIV' ||
        $val['jenis_nop'] == 'DV' ||
        $val['jenis_nop'] == 'DVI'
      ) {
        $letter .= '
                              
                                 <td style="border:1px solid black;border-collapse: collapse;"></td>
                                 <td style="border:1px solid black;border-collapse: collapse;"></td>
                                 <td style="border:1px solid black;border-collapse: collapse;"></td>
                                 <td style="border:1px solid black;border-collapse: collapse;"></td>
                                 <td style="border:1px solid black;border-collapse: collapse;"></td>
                                 <td style="border:1px solid black;border-collapse: collapse;"></td>
                                 <td style="border:1px solid black;border-collapse: collapse;"></td>

                                 <td style="border:1px solid black;border-collapse: collapse;">' . $val['nomer_persil'] . '</td>
                                 <td style="border:1px solid black;border-collapse: collapse;">' . $val['jenis_nop'] . '</td>
                                 <td style="border:1px solid black;border-collapse: collapse;">' . $val['luas_tanah_nop'] . '</td>
                                 <td style="border:1px solid black;border-collapse: collapse;">-</td>
                                 <td style="border:1px solid black;border-collapse: collapse;">-</td>
                                 <td style="border:1px solid black;border-collapse: collapse;">-</td>
                                 <td style="border:1px solid black;border-collapse: collapse;">'  . date('j/n/y', strtotime($val['diperoleh'])) . ' ' . $val['ket_mutasi'] . ' ' . $val['asal'] . '</td>
                             </tr>';
      } else {
        $letter .= '
                <td style="border:1px solid black;border-collapse: collapse;">' . $val['nomer_persil'] . '</td>
                <td style="border:1px solid black;border-collapse: collapse;">' . $val['jenis_nop'] . '</td>
                <td style="border:1px solid black;border-collapse: collapse;">' . $val['luas_tanah_nop'] . '</td>
                <td style="border:1px solid black;border-collapse: collapse;">-</td>
                <td style="border:1px solid black;border-collapse: collapse;">-</td>
                <td style="border:1px solid black;border-collapse: collapse;">-</td>
                <td style="border:1px solid black;border-collapse: collapse;">' . date('j/n/y', strtotime($val['diperoleh'])) . ' ' . $val['ket_mutasi'] . ' ' . $val['asal'] . '</td>

                    <td style="border:1px solid black;border-collapse: collapse;"></td>
                    <td style="border:1px solid black;border-collapse: collapse;"></td>
                    <td style="border:1px solid black;border-collapse: collapse;"></td>
                    <td style="border:1px solid black;border-collapse: collapse;"></td>
                    <td style="border:1px solid black;border-collapse: collapse;"></td>
                    <td style="border:1px solid black;border-collapse: collapse;"></td>
                    <td style="border:1px solid black;border-collapse: collapse;"></td>
       
                   
                </tr>';
      }
    }
    $letter .= '</tbody>
     </table>';
    $mpdf->WriteHTML($letter);
    $mpdf->Output('data-letter-c.pdf', 'D');
  }
  public function viewImage($id)
  {
    $data = $this->tanah->find($id);
    $dta = [
      'image' => $data['foto_transaksi']
    ];
    return view('cetak/viewImage', $dta);
  }
}

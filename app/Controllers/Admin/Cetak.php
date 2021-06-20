<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use \Mpdf\Mpdf;
use App\Models\Admin\Pemilik_Model;
use App\Models\Admin\Tanah_Model;

class Cetak extends BaseController
{
    protected $pemilik;
    public function __construct()
    {
        $this->pemilik = new Pemilik_Model();
        $this->tanah = new Tanah_Model();
    }

    public function cetak($nama)
    {
        // cari data berdasarkan nama
        $pemilik = $this->tanah->detailPemilik($nama)->find();
        $mpdf = new Mpdf(['format' => 'A4-L']);

        $header = '
                <div style="text-align: center;">
                    <div style="margin-bottom:15px;">
                        <font size="4">LEMBAGA PERATIKUM 2019</font><br>
                        <font size="5"><b>SMK BAITUL HIKAH</b></font><br>
                        <font size="2">Bidang Keahlian : Bisnis dan Menejemen - Teknologi informasi dan Komunikasi</font><br>
                        <font size="2"><i>Jln Cut NyaDien No. 02 Kode Pos : 68173 Telp./Fax (0331)758005 Tempurejo Jember Jawa
                        Timur</i></font>
                        </div>
                </div>
          ';

        $letter = '
                <div class="container-fluid mt-3" style="padding-top: 80px;">

                <div class="row">
                    <table style="
                   border-collapse: collapse;
                   width: 100%;
                  ">
                        <thead>
                            <tr style=" border: 1px solid black">
                                <th style=" border: 1px solid black ; padding: 5px;">No</th>
                                <th style=" border: 1px solid black ; padding: 5px;">No Blok</th>
                                <th style=" border: 1px solid black ; padding: 5px;">NOP</th>
                                <th style=" border: 1px solid black ; padding: 5px;">Luas Tanah NOP</th>
                                <th style=" border: 1px solid black ; padding: 5px;">Luas Rumah NOP</th>
                                <th style=" border: 1px solid black ; padding: 5px;">Tahun</th>
                                <th style=" border: 1px solid black ; padding: 5px;">Tagihan</th>
                                <th style=" border: 1px solid black ; padding: 5px;">No Buku C</th>
                                <th style=" border: 1px solid black ; padding: 5px;">Nama Buku C</th>
                                <th style=" border: 1px solid black ; padding: 5px;">Nomer Persil</th>
                                <th style=" border: 1px solid black ; padding: 5px;">Kelas</th>
                                <th style=" border: 1px solid black ; padding: 5px;">Jenis NOP</th>
                            </tr>
                        </thead>
                        <tbody>';
        $i = 1;
        foreach ($pemilik as $pemilik) {
            $letter .= '
                            <tr style=" border: 1px solid black">
                            <td style=" border: 1px solid black; text-align: center; padding: 7px"> ' . $i++ . ' </td>
                            <td style=" border: 1px solid black; text-align: center; padding: 7px"> ' . $pemilik["no_block"] . ' </td>
                            <td style=" border: 1px solid black; text-align: center; padding: 7px">' . $pemilik["nop"] . '</td>
                            <td style=" border: 1px solid black; text-align: center; padding: 7px">' . $pemilik["luas_tanah_nop"] . '</td>
                            <td style=" border: 1px solid black; text-align: center; padding: 7px">' . $pemilik["luas_rumah_nop"] . '</td>
                            <td style=" border: 1px solid black; text-align: center; padding: 7px">' . $pemilik["tahun"] . '</td>
                            <td style=" border: 1px solid black; text-align: center; padding: 7px">' . $pemilik["tagihan"] . '</td>
                            <td style=" border: 1px solid black; text-align: center; padding: 7px">' . $pemilik["no_buku_c"] . '</td>
                            <td style=" border: 1px solid black; text-align: center; padding: 7px">' . $pemilik["nama_buku_c"] . '</td>
                            <td style=" border: 1px solid black; text-align: center; padding: 7px">' . $pemilik["nomer_persil"] . '</td>
                            <td style=" border: 1px solid black; text-align: center; padding: 7px">' . $pemilik["kelas"] . '</td>
                            <td style=" border: 1px solid black; text-align: center; padding: 7px">' . $pemilik["jenis_nop"] . '</td>
                        </tr>';
        }
        $letter .= '</tbody>
                    </table>
                </div>
          ';

        $mpdf->SetHeader($header);

        $mpdf->WriteHTML($letter);

        $mpdf->Output();

        return redirect()->to($mpdf->Output());
    }
}

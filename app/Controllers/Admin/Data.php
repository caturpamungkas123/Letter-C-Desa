<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Data extends BaseController
{
    protected $pemilik;
    protected $tanah;

    public function __construct()
    {
        $this->pemilik = new \App\Models\Admin\Pemilik_Model();
        $this->tanah = new \App\Models\Admin\Tanah_Model();
    }

    public function dataTanah()
    {
        $keywords = $this->request->getVar('keywords');
        if ($keywords) {
            $tanah = $this->tanah->getTanah($keywords);
        } else {
            $tanah = $this->tanah;
        }

        $dta = [
            'title' => 'Data Tanah',
            'data' => $tanah->paginate(5, 'tanah'),
            'pager' => $tanah->pager
        ];
        return view('admin/tanah/data_tanah', $dta);
    }
    //  kepemilikan
    public function dataKepemilikan()
    {
        $keywords = $this->request->getVar('keywords');
        if ($keywords) {
            $pemilik = $this->pemilik->dataPemilik($keywords);
        } else {
            $pemilik = $this->pemilik->dataPemilik();
        }
        $dta = [
            'title' => 'Data Kepemilikan',
            'pemilik' => $pemilik,
        ];
        return view('admin/tanah/data_pemilik', $dta);
    }
    public function detailKepemilikan($noBuku, $nama)
    {
        $cari_nama = $this->tanah->detailPemilik($noBuku, $nama)->find();
        // cek nama ada di table tidak
        if (empty($cari_nama)) {
            return view('errors/admin/detail_kepemilikan');
        }
        foreach ($cari_nama as $cari_nama);
        $dta = [
            'title' => 'Detail Tanah',
            'nama' => $cari_nama,
            'noBuku' => $noBuku,
            'pemilik' => $this->tanah->detailPemilik($noBuku, $nama)->find(),
            'total_data' => $this->tanah->detailPemilik($noBuku, $nama)->countAllResults(false)
        ];
        return view('admin/tanah/detail_tanah_pemilik', $dta);
    }
    // end kepemilikan
    public function tambah()
    {
        //  tambah data 
        $dta = [
            'title' => 'Tambah Data Tanah',
            'validat' => \Config\Services::validation()
        ];
        return view('admin/tanah/tambah', $dta);
    }
    // inser data
    public function insert()
    {
        if (!$this->validate([
            'nama_nop' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data harus diisi',
                ]
            ],
            'bin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'data harus diisi'
                ]
            ],
            'no_buku_c' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data harus diisi',
                ]
            ],
            'asal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'data harus diisi'
                ]
            ],
            'diperoleh' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data harus diisi',
                ]
            ],
            'luas_tanah_nop' => [
                'rules' => 'required', 'numeric',
                'errors' => [
                    'required' => 'Data harus diisi',
                    'numeric' => 'masukan data yang valid'
                ]
            ],
            'jenis_nop' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data harus diisi'
                ]
            ],
            'nomer_persil' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data harus diisi',
                ]
            ],
            'luas_buku_c' => [
                'rules' => 'required', 'numeric',
                'errors' => [
                    'required' => 'Data harus diisi',
                    'numeric' => 'data yang valid'
                ]
            ],
            'rw' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data harus diisi'
                ]
            ],
            'ket_mutasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data harus diisi',
                ]
            ],
            'foto_transaksi' => [
                'rules' => 'mime_in[foto_transaksi,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'mime_in' => 'Data bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to('/admin/data/tambah')->withInput();
        } else {
            // cek ada gambar foto buku apa engga
            if ($this->request->getFile('foto_transaksi')->getError() == 4) {
                $transaksi = 'no-image.png';
            } else {
                $foto_transaksi = $this->request->getFile('foto_transaksi');
                $transaksi = $foto_transaksi->getRandomName();
                $foto_transaksi->move('img/transaksi', $transaksi);
            }
            $jnsTanah = $this->request->getVar('jenis_nop');
            if (
                $jnsTanah == 'DI' ||
                $jnsTanah == 'DII' ||
                $jnsTanah == 'DIII' ||
                $jnsTanah == 'DIV' ||
                $jnsTanah == 'DV' ||
                $jnsTanah == 'DVI'
            ) {
                $jenisTanah = 'tanah_kering';
            } else {
                $jenisTanah = 'sawah';
            }

            $value_tanah = [
                'nama_pemilik' => $this->request->getVar('nama_nop'),
                'bin' => $this->request->getVar('bin'),
                'asal' => $this->request->getVar('asal'),
                'luas_tanah_nop' => $this->request->getVar('luas_tanah_nop'),
                'diperoleh' => $this->request->getVar('diperoleh'),
                'no_buku_c' => $this->request->getVar('no_buku_c'),
                'nama_buku_c' => $this->request->getVar('nama_nop'),
                'nomer_persil' => $this->request->getVar('nomer_persil'),
                'jenis_nop' => $this->request->getVar('jenis_nop'),
                'jenis_tanah' => $jenisTanah,
                'luas_buku_c' => $this->request->getVar('luas_buku_c'),
                'alamat' => $this->request->getVar('rw'),
                'ket_mutasi' => $this->request->getVar('ket_mutasi'),
                'foto_transaksi' => $transaksi
            ];
            $this->tanah->insert($value_tanah);

            if ($this->validate([
                'no_buku_c' => 'is_unique[pemilik.no_buku_c]'
            ])) {
                $value_pemilik = [
                    'nama_pemilik' => $this->request->getVar('nama_nop'),
                    'no_buku_c' => $this->request->getVar('no_buku_c'),
                    'bin' => $this->request->getVar('bin')
                ];
                $this->pemilik->insert($value_pemilik);
            }
            session()->setFlashdata('success', 'Data Berhasil Ditambahkan');
            return redirect()->to('/admin/data/tambah');
        }
    }
}

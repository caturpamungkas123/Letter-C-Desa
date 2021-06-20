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
            'titile' => 'Data Tanah',
            'data' => $tanah->paginate(5, 'tanah'),
            'tanah' => $this->tanah->findAll(),
            'pager' => $tanah->pager
        ];
        return view('admin/tanah/data_tanah', $dta);
    }
    //  kepemilikan
    public function dataKepemilikan()
    {
        $keywords = $this->request->getVar('keywords');
        if ($keywords) {
            $pemilik = $this->pemilik->getKeywords($keywords);
        } else {
            $pemilik = $this->pemilik;
        }

        $dta = [
            'title' => 'Data Kepemilikan',
            'pemilik' => $pemilik->paginate(5, 'pemilik'),
            'pager' => $this->pemilik->pager
        ];
        return view('admin/tanah/data_pemilik', $dta);
    }

    public function detailKepemilikan($nama)
    {
        $cari_nama = $this->tanah->detailPemilik($nama)->find();
        // cek nama ada di table tidak
        if (empty($cari_nama)) {
            return view('errors/admin/detail_kepemilikan');
        }
        foreach ($cari_nama as $cari_nama);
        $dta = [
            'title' => 'Detail Tanah',
            'nama' => $cari_nama,
            'pemilik' => $this->tanah->detailPemilik($nama)->find(),
            'total_data' => $this->tanah->detailPemilik($nama)->countAllResults(false)
        ];
        return view('admin/tanah/detail_tanah', $dta);
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
            'nop' => [
                'rules' => 'required|is_unique[tanah.nop]',
                'errors' => [
                    'required' => 'Data harus diisi',
                    'is_unique' => 'Data sudah terdaftar'
                ]
            ],
            'no_blok' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data harus diisi',
                ]
            ],
            'nama_nop' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data harus diisi',
                ]
            ],
            'luas_tanah_nop' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data harus diisi',
                ]
            ],
            'tahun' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data harus diisi',
                ]
            ],
            'tagihan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data harus diisi',
                ]
            ],
            'no_buku_c' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data harus diisi',
                ]
            ],
            'nama_buku_c' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data harus diisi',
                ]
            ],
            'nomer_persil' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data harus diisi',
                ]
            ],
            'kelas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data harus diisi',
                ]
            ],
            'luas_buku_c' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data harus diisi',
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data harus diisi',
                ]
            ],
            'ket_mutasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data harus diisi',
                ]
            ],
            'foto_buku_c' => [
                'rules' => 'mime_in[foto_buku_c,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'mime_in' => 'Data yang anda masukan bukan gambar',
                ]
            ],
            'foto_tanah' => [
                'rules' => 'mime_in[foto_tanah,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'mime_in' => 'Data yang anda masukan bukan gambar',
                ]
            ],
        ])) {
            return redirect()->to('/admin/data/tambah')->withInput();
        } else {

            // cek ada gambar foto buku apa engga
            if ($this->request->getFile('foto_buku_c')->getError() == 4) {
                $buku_c = 'no-image.png';
            } else {
                $gambar_buku_c = $this->request->getFile('foto_buku_c');
                $buku_c = $gambar_buku_c->getRandomName();
                $gambar_buku_c->move('img/buku', $buku_c);
            }

            // cek ada gambar foto tanah apa engga
            if ($this->request->getFile('foto_tanah')->getError() == 4) {
                $tanah = 'no-image.png';
            } else {
                $gambar_peta = $this->request->getFile('foto_tanah');
                $tanah = $gambar_peta->getRandomName();
                $gambar_peta->move('img/tanah', $tanah);
            }
            // slug
            $slug = url_title($this->request->getVar('nama_nop'), '-', true);

            $value_tanah = [
                'nop' => $this->request->getVar('nop'),
                'no_block' => $this->request->getVar('no_blok'),
                'nama_pemilik' => $this->request->getVar('nama_nop'),
                'slug' => $slug,
                'luas_tanah_nop' => $this->request->getVar('luas_tanah_nop'),
                'luas_rumah_nop' => $this->request->getVar('luas_rumah_nop'),
                'tahun' => $this->request->getVar('tahun'),
                'tagihan' => $this->request->getVar('tagihan'),
                'no_buku_c' => $this->request->getVar('no_buku_c'),
                'nama_buku_c' => $this->request->getVar('nama_buku_c'),
                'nomer_persil' => $this->request->getVar('nomer_persil'),
                'kelas' => $this->request->getVar('kelas'),
                'jenis_nop' => $this->request->getVar('jenis_nop'),
                'luas_buku_c' => $this->request->getVar('luas_buku_c'),
                'alamat' => $this->request->getVar('alamat'),
                'ket_mutasi' => $this->request->getVar('ket_mutasi'),
                'gambar_peta' => $tanah,
                'gambar_buku_c' => $buku_c
            ];
            $this->tanah->insert($value_tanah);
            // cek apakah data sudah terdaftar di table pemilik
            if ($this->validate([
                'nama_nop' => 'is_unique[pemilik.nama_pemilik]'
            ])) {

                $value_pemilik = [
                    'nama_pemilik' => $this->request->getVar('nama_nop')
                ];
                $this->pemilik->insert($value_pemilik);
            }
            session()->setFlashdata('success', 'Data Berhasil Ditambahkan');
            return redirect()->to('/admin/data/tambah');
        }
    }
}

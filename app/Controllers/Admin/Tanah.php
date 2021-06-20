<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Tanah extends BaseController
{
    protected $pemilik;
    protected $tanah;

    public function __construct()
    {
        $this->pemilik = new \App\Models\Admin\Pemilik_Model();
        $this->tanah = new \App\Models\Admin\Tanah_Model();
    }

    public function tambah_data_tanah($nama)
    {
        $dta = [
            'title' => 'Tambah Data Tanah ' . $nama,
            'nama' => $nama,
            'validat' => \Config\Services::validation()
        ];
        return view('admin/tanah/tambah_tanah_nama', $dta);
    }
    public function insert($nama)
    {
        //  ambil nama

        $validat = [
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
            'nama_nop' => [
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
            ]
        ];

        if (!$this->validate($validat)) {
            session()->setFlashdata('success', 'gagal');
            return redirect()->to('/admin/tanah/tambah_data_tanah/' . $nama)->withInput();
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
            $slug = url_title($nama, '-', true);

            $value_tanah = [
                'nop' => $this->request->getVar('nop'),
                'no_block' => $this->request->getVar('no_blok'),
                'nama_pemilik' => $nama,
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

            session()->setFlashdata('success', 'Data Berhasil Ditambahkan');
            return redirect()->to('/admin/tanah/tambah_data_tanah/' . $nama);
        }
    }
    public function edit($nop)
    {
        $data = $this->tanah->where('nop', $nop)->find();
        foreach ($data as $data);
        $dta = [
            'title' => 'Edit Data' . $nop,
            'validat' => \Config\Services::validation(),
            'data' => $data
        ];
        return view('admin/tanah/edit_data', $dta);
    }

    public function saveedit($nop)
    {
        if (!$this->validate([
            'nop' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data harus diisi',
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
            return redirect()->to('/admin/tanah/edit/' . $nop)->withInput();
        } else {
            // cari data berdasarkan nop
            $data = $this->tanah->where(['nop' => $nop])->find();
            foreach ($data as $data);
            // 
            // cek gambar
            $foto_tanah_lama = $this->request->getVar('foto_tanah_lama');
            $foto_buku_c_lama = $this->request->getVar('foto_buku_c_lama');

            if ($this->request->getFile('foto_tanah')->getError() == 4) {

                $slug = url_title($this->request->getVar('nama_nop'), '-', true);

                $dta = [
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
                    'gambar_peta' => $foto_tanah_lama,
                    'gambar_buku_c' => $foto_buku_c_lama
                ];
                $this->tanah->updateData($nop, $dta);
                session()->setFlashdata('success', 'Data Berhasil Diubah');
                return redirect()->to('/admin/data/datatanah');
            } else {
                // memindahkan gambar tanah
                $gambar_peta = $this->request->getFile('foto_tanah');
                $tanah = $gambar_peta->getRandomName();
                $gambar_peta->move('img/tanah', $tanah);
                //  meindahkan gambar buku
                $gambar_buku_c = $this->request->getFile('foto_buku_c');
                $gambar_buku = $gambar_buku_c->getRandomName();
                $gambar_buku_c->move('img/buku', $gambar_buku);

                $slug = url_title($this->request->getVar('nama_nop'), '-', true);

                $dta = [
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
                    'gambar_buku_c' => $gambar_buku
                ];
                $this->tanah->updateData($nop, $dta);
                session()->setFlashdata('success', 'Data Berhasil Diubah');
                return redirect()->to('/admin/data/datatanah');
            }
        }
    }
    public function hapus($nop)
    {
        // caari gambar berdasarkan nop
        $data = $this->tanah->where('nop', $nop)->find();
        foreach ($data as $data);
        $tanah = $data['gambar_peta'];
        $buku = $data['gambar_buku_c'];

        // cek nama foto
        if (!$tanah == 'no-image.png') {
            unlink('img/tanah/' . $tanah);
        }
        if (!$buku == 'no-image.png') {
            unlink('img/buku/' . $buku);
        }

        // hapus data dari table
        $this->tanah->delete(['nop ' => $nop]);

        session()->setFlashdata('success', 'Data Berhasil Dihapus');
        return redirect()->to('/admin/data/datatanah');
    }
}

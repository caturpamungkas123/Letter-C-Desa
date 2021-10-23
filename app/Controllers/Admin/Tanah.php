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

    public function tambah_data_tanah($noBuku, $nama, $bin)
    {
        $dta = [
            'title' => 'Tambah Data Tanah ' . $nama,
            'nama' => $nama,
            'bin' => $bin,
            'no_buku' => $noBuku,
            'validat' => \Config\Services::validation()
        ];
        return view('admin/tanah/tambah_tanah_nama', $dta);
    }
    public function edit($id)
    {
        $data = $this->tanah->where('id', $id)->find();
        foreach ($data as $data);
        $dta = [
            'title' => 'Edit Data',
            'validat' => \Config\Services::validation(),
            'data' => $data
        ];
        return view('admin/tanah/edit_data', $dta);
    }

    public function saveedit($id)
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
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data harus diisi',
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
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data harus diisi',
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
            return redirect()->to('/admin/tanah/edit/' . $id)->withInput();
        } else {
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
            // cek gambar
            if ($this->request->getFile('foto_transaksi')->getError() == 4) {
                $dta = [
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
                ];
                $this->tanah->updateData($id, $dta);
                $this->tanah->update($id, $dta);

                session()->setFlashdata('success', 'Data Berhasil Diubah');
                return redirect()->to('/admin/data/datatanah');
            } else {
                // memindahkan gambar tanah
                if ($this->request->getVar('foto_transaksi_lama') !== 'no-image.png') {
                    unlink('img/transaksi/' . $this->request->getVar('foto_transaksi_lama'));
                }
                $foto_transaksi = $this->request->getFile('foto_transaksi');
                $transaksi = $foto_transaksi->getRandomName();
                $foto_transaksi->move('img/transaksi', $transaksi);

                $dta = [
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
                $this->tanah->updateData($id, $dta);
                $this->tanah->update($id, $dta);
                session()->setFlashdata('success', 'Data Berhasil Diubah');
                return redirect()->to('/admin/data/datatanah');
            }
        }
    }
    public function hapus($id)
    {
        // caari gambar berdasarkan nop
        $data = $this->tanah->where('id', $id)->find();
        foreach ($data as $data);
        $transaksi = $data['foto_transaksi'];
        // cek nama foto
        if ($transaksi !== 'no-image.png') {
            unlink('img/transaksi/' . $transaksi);
        }
        // cek jumlah data di atble tanah
        if ($this->tanah->where($id)->countAll() === 1) {
            // hapus data dari table
            $this->tanah->delete($id);
            //  hapus data di table pemilik
            $this->pemilik->hapus($data['nama_pemilik'], $data['no_buku_c']);
        } else {
            // hapus data dari table
            $this->tanah->delete($id);
        }

        session()->setFlashdata('success', 'Data Berhasil Dihapus');
        return redirect()->to('/admin/data/datatanah');
    }

    public function detailTanah($id)
    {
        $dataTanah = $this->tanah->where('id', $id)->find();
        $dta = [
            'title' => 'Detail Tanah',
            'data' => $dataTanah[0]
        ];
        return view('admin/tanah/detail_tanah', $dta);
    }
}

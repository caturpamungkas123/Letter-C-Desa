<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class Tanah_Model extends Model
{
    protected $table      = 'tanah';
    protected $allowedFields = ['nama_pemilik', 'bin', 'asal', 'luas_tanah_nop', 'diperoleh', 'no_buku_c', 'nama_buku_c', 'nomer_persil', 'jenis_nop', 'jenis_tanah', 'luas_buku_c', 'alamat', 'ket_mutasi', 'foto_transaksi'];

    public function insertData($data)
    {
        return $this->insert($data);
    }

    public function getTanah($keywords)
    {
        return $this->table('tanah')->like('nomer_persil', $keywords)->orLike('nama_pemilik', $keywords)->orLike('bin', $keywords);
    }

    public function pemilik()
    {
        return $this->table('tanah')->join('pemilik', 'pemilik.nama_pemilik=tanah.nama_pemilik')->countAll();
    }

    public function detailPemilik($noBuku, $nama)
    {
        return $this->where(['no_buku_c' => $noBuku])->where(['nama_pemilik' => $nama]);
    }
    public function updateData($id, $dta)
    {
        return $this->update($id, $dta);
    }
    // Menu Data tanahy warga

}

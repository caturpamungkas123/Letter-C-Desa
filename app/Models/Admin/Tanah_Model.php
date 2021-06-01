<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class Tanah_Model extends Model
{
    protected $table      = 'tanah';
    protected $primaryKey = 'nop';
    protected $allowedFields = ['nop', 'no_block', 'nop_history', 'nama_pemilik', 'slug', 'luas_tanah_nop', 'luas_rumah_nop', 'tahun', 'tagihan', 'no_buku_c', 'nama_buku_c', 'nomer_persil', 'kelas', 'jenis_nop', 'luas_buku_c', 'alamat', 'ket_mutasi', 'gambar_peta', 'gambar_buku_c'];



    public function insertData($data)
    {
        return $this->insert($data);
    }



    public function getTanah($keywords)
    {
        return $this->table('tanah')->like('nop', $keywords)->orLike('nama_pemilik', $keywords);
    }

    public function pemilik()
    {
        return $this->table('tanah')->join('pemilik', 'pemilik.nama_pemilik=tanah.nama_pemilik')->countAll();
    }

    public function detailPemilik($nama)
    {
        return $this->where(['nama_pemilik' => $nama]);
    }
    public function updateData($nop, $dta)
    {
        return $this->update($nop, $dta);
    }
}

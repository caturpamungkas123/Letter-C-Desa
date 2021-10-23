<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class Pemilik_Model extends Model
{
    protected $table      = 'pemilik';
    protected $allowedFields = ['nama_pemilik', 'no_buku_c', 'bin'];

    public function dataPemilik($keywords = null)
    {
        if ($keywords !== null) {
            return $this->like('bin', $keywords)->orLike('nama_pemilik', $keywords)->orLike('no_buku_c', $keywords)->find();
        } else {
            return $this->findAll();
        }
    }
    public function hapus($nama, $noBuku)
    {
        return $this->where('nama_pemilik', $nama)->where('no_buku_c', $noBuku)->delete();
    }
}

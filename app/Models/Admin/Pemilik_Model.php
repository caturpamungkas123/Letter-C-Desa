<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class Pemilik_Model extends Model
{
    protected $table      = 'pemilik';
    protected $allowedFields = ['nama_pemilik'];

    // mencari nama data 
    public function getKeywords($keywords = null)
    {
        if ($keywords == null) {
            return $this->findAll();
        }
        return $this->table('pemilik')->like('nama_pemilik', $keywords);
    }

    public function getWhere($nama)
    {
        return $this->where('nama_pemilik', $nama)->find();
    }

    public function hapus($nama)
    {
        return $this->where('nama_pemilik', $nama)->delete();
    }
}

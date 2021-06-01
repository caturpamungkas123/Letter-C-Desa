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
}

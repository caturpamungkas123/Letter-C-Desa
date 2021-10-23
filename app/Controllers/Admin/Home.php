<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Home extends BaseController
{
    protected $pemilik;
    protected $tanah;

    public function __construct()
    {
        $this->pemilik = new \App\Models\Admin\Pemilik_Model();
        $this->tanah = new \App\Models\Admin\Tanah_Model();
    }

    public function index()
    {
        $dta = [
            'title' => 'Dashboard Admin',
            'total_tanah' => $this->tanah->countAllResults(),
            'total_warga' => $this->pemilik->countAllResults()
        ];
        return view('admin/dashboard', $dta);
    }
    public function auth()
    {
        return view('auth/index');
    }
}

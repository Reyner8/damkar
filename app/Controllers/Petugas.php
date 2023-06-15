<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Petugas extends BaseController
{
    protected $RelationTable;
    protected $KejadianModel;
    protected $JabatanModel;
    protected $DokumentasiModel;
    protected $KelurahanModel;

    public function __construct()
    {
        $this->RelationTable = new \App\Models\RelationTable();
        $this->KejadianModel = new \App\Models\KejadianModel();
        $this->DokumentasiModel = new \App\Models\DokumentasiModel();
        $this->JabatanModel = new \App\Models\JabatanModel();
        $this->KelurahanModel = new \App\Models\KelurahanModel();
    }

    public function index()
    {
        return view('petugas', [
            'judul' => 'Petugas',
            'validation' => \Config\Services::validation(),
            'listPetugas' => $this->RelationTable->getAllPetugas(),
        ]);
    }
}

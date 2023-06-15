<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Kejadian extends BaseController
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
        return view('kejadian', [
            'judul' => 'Admin | Kejadian',
            'validation' => \Config\Services::validation(),
            'listKejadian' => $this->RelationTable->getAllKejadian(),
            'listKelurahan' => $this->KelurahanModel->findAll(),
        ]);
    }

    function detail($idKejadian)
    {
        return view('detailmap', [
            'judul' => 'Detail',
            'kejadian' => $this->RelationTable->getKejadianById($idKejadian),
            'listPenugasan' => $this->RelationTable->getPenugasanByIdKejadian($idKejadian),
            'listDokumentasi' => $this->DokumentasiModel->where('idKejadian', $idKejadian)->findAll()
        ]);
    }
}

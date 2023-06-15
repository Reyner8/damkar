<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Lokasi extends BaseController
{

    protected $KejadianModel;
    protected $KelurahanModel;
    protected $KecamatanModel;
    protected $PetugasModel;
    protected $DokumentasiModel;
    protected $RelationTable;

    public function __construct()
    {
        $this->KejadianModel = new \App\Models\KejadianModel();
        $this->KelurahanModel = new \App\Models\KelurahanModel();
        $this->KecamatanModel = new \App\Models\KecamatanModel();
        $this->PetugasModel = new \App\Models\PetugasModel();
        $this->DokumentasiModel = new \App\Models\DokumentasiModel();
        $this->RelationTable = new \App\Models\RelationTable();
    }


    public function index()
    {
        return view('lokasi', [
            'judul' => 'Lokasi',
            'listKejadian' => $this->KejadianModel->findAll(),
            'listKelurahan' => $this->KelurahanModel->findAll(),
            'listKecamatan' => $this->KecamatanModel->findAll(),
            'listPetugas' => $this->PetugasModel->findAll(),
        ]);
    }

    public function lokasi()
    {
        $listKejadian = $this->RelationTable->getAllKejadian();
        return $this->response->setJSON($listKejadian);
    }
}

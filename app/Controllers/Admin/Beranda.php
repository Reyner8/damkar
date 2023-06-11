<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Beranda extends BaseController
{

    protected $KejadianModel;
    protected $KelurahanModel;
    protected $KecamatanModel;
    protected $PetugasModel;
    protected $RelationTable;

    public function __construct()
    {
        $this->KejadianModel = new \App\Models\KejadianModel();
        $this->KelurahanModel = new \App\Models\KelurahanModel();
        $this->KecamatanModel = new \App\Models\KecamatanModel();
        $this->PetugasModel = new \App\Models\PetugasModel();
        $this->RelationTable = new \App\Models\RelationTable();
    }


    public function index()
    {
        return view('admin/beranda', [
            'judul' => 'Beranda',
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

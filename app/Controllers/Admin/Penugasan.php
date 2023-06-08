<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Penugasan extends BaseController
{
    protected $RelationTable;
    protected $PenugasanModel;
    protected $KejadianModel;
    protected $JabatanModel;
    protected $PetugasModel;
    protected $ReguModel;

    public function __construct()
    {
        $this->RelationTable = new \App\Models\RelationTable();
        $this->PenugasanModel = new \App\Models\PenugasanModel();
        $this->KejadianModel = new \App\Models\KejadianModel();
        $this->JabatanModel = new \App\Models\JabatanModel();
        $this->PetugasModel = new \App\Models\PetugasModel();
        $this->ReguModel = new \App\Models\ReguModel();
    }

    public function penugasan($idKejadian)
    {

        return view('admin/penugasan', [
            'judul' => 'Admin | Penugasan',
            'validation' => \Config\Services::validation(),
            'listPenugasan' => $this->RelationTable->getPenugasanByIdKejadian($idKejadian),
            'kejadian' => $this->KejadianModel->find($idKejadian),
            'listPetugas' => $this->PetugasModel->findAll(),
            'listRegu' => $this->ReguModel->findAll(),
            'isEdit' => false
        ]);
    }

    // route : admin/petugas/save
    public function save($idKejadian)
    {
        $idPetugas = $this->request->getPost('idPetugas');
        $idRegu = $this->request->getPost('idRegu');
        $tanggalPenugasan = $this->request->getPost('tanggalPenugasan');

        $rules = [
            'idPetugas' => 'required',
            'idRegu' => 'required',
            'tanggalPenugasan' => 'required',
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('msg-danger', 'Data gagal ditambahkan!!!');
            return redirect()->to('admin/kejadian/penugasan/' . $idKejadian)->withInput();
        }

        foreach ($idPetugas as $petugas) {
            $this->PenugasanModel->save([
                'idPetugas' => $petugas,
                'idRegu' => $idRegu,
                'idKejadian' => $idKejadian,
                'tanggalPenugasan' => $tanggalPenugasan,
            ]);
        }

        session()->setFlashdata('msg-success', 'Data berhasil ditambahkan!!!');
        return redirect()->to('admin/kejadian/penugasan/' . $idKejadian);
    }

    // route : admin/kejadian/(:num)
    public function delete($id)
    {
        $idKejadian = $this->PenugasanModel->find($id)['idKejadian'];
        $this->PenugasanModel->where('id', $id)->delete();
        session()->setFlashdata('msg-delete', 'Data berhasil dihapus!!!');
        return redirect()->to('admin/kejadian/penugasan/' . $idKejadian);
    }
}

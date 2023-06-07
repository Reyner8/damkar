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

    // route : admin/kejadian/edit/(:num)
    public function edit()
    {

        return view('admin/kejadian', [
            'judul' => 'Admin | Kejadian',
            'validation' => \Config\Services::validation(),
            'listPenugasan' => $this->RelationTable->getPenugasanByIdKejadian($idKejadian),
            'dataEdit' => $this->RelationTable->getPenugasanById($idPenugasan),
            'isEdit' => true
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
            return redirect()->to('admin/kejadian/penugasan/'. $idKejadian)->withInput();
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
        return redirect()->to('admin/kejadian/penugasan/'. $idKejadian);
    }


    // route : admin/kejadian/edit/(:num)
    public function update($id)
    {
        $idKelurahan = $this->request->getPost('idKelurahan');
        $alamat = $this->request->getPost('alamat');
        $latitude = $this->request->getPost('latitude');
        $longitude = $this->request->getPost('longitude');
        $penyebab = $this->request->getPost('penyebab');
        $tanggal = $this->request->getPost('tanggal');
        $jamLapor = $this->request->getPost('jamLapor');
        $jamTanggap = $this->request->getPost('jamTanggap');

        $rules = [
            'idKelurahan' => 'required',
            'alamat' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'penyebab' => 'required',
            'tanggal' => 'required',
            'jamLapor' => 'required',
            'jamTanggap' => 'required',
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('msg-danger', 'Data gagal diubah !!!');
            return redirect()->to('admin/kejadian/edit/' . $id)->withInput();
        }

        $this->KejadianModel->update($id, [
            'idKelurahan' => $idKelurahan,
            'alamat' => $alamat,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'penyebab' => $penyebab,
            'tanggal' => $tanggal,
            'jamLapor' => $jamLapor,
            'jamTanggap' => $jamTanggap,
        ]);

        session()->setFlashdata('msg-success', 'Data berhasil diubah!!!');
        return redirect()->to('admin/kejadian');
    }


    // route : admin/kejadian/(:num)
    public function delete($id)
    {
        $idKejadian = $this->PenugasanModel->find($id)['idKejadian'];
        $this->PenugasanModel->where('id', $id)->delete();
        session()->setFlashdata('msg-delete', 'Data berhasil dihapus!!!');
        return redirect()->to('admin/kejadian/penugasan/'. $idKejadian);
    }
}

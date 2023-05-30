<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Kejadian extends BaseController
{
    protected $RelationTable;
    protected $KejadianModel;
    protected $JabatanModel;
    protected $KelurahanModel;

    public function __construct()
    {
        $this->RelationTable = new \App\Models\RelationTable();
        $this->KejadianModel = new \App\Models\KejadianModel();
        $this->JabatanModel = new \App\Models\JabatanModel();
        $this->KelurahanModel = new \App\Models\KelurahanModel();
    }

    public function index()
    {
        return view('admin/kejadian', [
            'judul' => 'Admin | Kejadian',
            'validation' => \Config\Services::validation(),
            'listKejadian' => $this->RelationTable->getAllKejadian(),
            'listKelurahan' => $this->KelurahanModel->findAll(),
            'isEdit' => false
        ]);
    }

    // route : admin/kejadian/edit/(:num)
    public function edit($id)
    {
        return view('admin/kejadain', [
            'judul' => 'Admin | Kejadian',
            'validation' => \Config\Services::validation(),
            'listKejadian' => $this->RelationTable->getAllKejadian(),
            'listKelurahan' => $this->KelurahanModel->findAll(),
            'dataEdit' => $this->RelationTable->getKejadianById($id),
            'isEdit' => true
        ]);
    }

    // route : admin/petugas/save
    public function save()
    {
        $alamat = $this->request->getPost('alamat');
        $latitude = $this->request->getPost('latitude');
        $longitude = $this->request->getPost('longitude');
        $penyebab = $this->request->getPost('penyebab');
        $tanggal = $this->request->getPost('tanggal');
        $jamLapor = $this->request->getPost('jamLapor');
        $jamTanggap = $this->request->getPost('jamTanggap');

        $rules = [
            'alamat' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'penyebab' => 'required',
            'tanggal' => 'required',
            'jamLapor' => 'required',
            'jamTanggap' => 'required',
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('msg-danger', 'Data gagal ditambahkan!!!');
            return redirect()->to('admin/kejadian')->withInput();
        }

        $this->KejadianModel->save([
            'alamat' => $alamat,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'penyebab' => $penyebab,
            'tanggal' => $tanggal,
            'jamLapor' => $jamLapor,
            'jamTanggap' => $jamTanggap,
        ]);

        session()->setFlashdata('msg-success', 'Data berhasil ditambahkan!!!');
        return redirect()->to('admin/kejadian');
    }


    // route : admin/kejadian/edit/(:num)
    public function update($id)
    {
        $alamat = $this->request->getPost('alamat');
        $latitude = $this->request->getPost('latitude');
        $longitude = $this->request->getPost('longitude');
        $penyebab = $this->request->getPost('penyebab');
        $tanggal = $this->request->getPost('tanggal');
        $jamLapor = $this->request->getPost('jamLapor');
        $jamTanggap = $this->request->getPost('jamTanggap');

        $rules = [
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
        $this->KejadianModel->where('id', $id)->delete();
        session()->setFlashdata('msg-delete', 'Data berhasil dihapus!!!');
        return redirect()->to('admin/kejadian');
    }
}

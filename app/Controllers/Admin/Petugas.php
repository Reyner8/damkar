<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Petugas extends BaseController
{
    protected $RelationTable;
    protected $PetugasModel;
    protected $JabatanModel;

    public function __construct()
    {
        $this->RelationTable = new \App\Models\RelationTable();
        $this->PetugasModel = new \App\Models\PetugasModel();
        $this->JabatanModel = new \App\Models\JabatanModel();
    }

    public function index()
    {
        return view('admin/petugas', [
            'judul' => 'Admin | Petugas',
            'validation' => \Config\Services::validation(),
            'listPetugas' => $this->RelationTable->getAllPetugas(),
            'listJabatan' => $this->JabatanModel->findAll(),
            'isEdit' => false
        ]);
    }

    // route : admin/petugas/edit/(:num)
    public function edit($id)
    {
        return view('admin/petugas', [
            'judul' => 'Admin | Petugas',
            'validation' => \Config\Services::validation(),
            'listPetugas' => $this->RelationTable->getAllPetugas(),
            'listJabatan' => $this->JabatanModel->findAll(),
            'dataEdit' => $this->RelationTable->getPetugas($id),
            'isEdit' => true
        ]);
    }

    // route : admin/petugas/save
    public function save()
    {
        $idJabatan = $this->request->getPost('idJabatan');
        $nama = $this->request->getPost('nama');
        $jenisKelamin = $this->request->getPost('jenisKelamin');
        $tempatLahir = $this->request->getPost('tempatLahir');
        $tanggalLahir = $this->request->getPost('tanggalLahir');
        $agama = $this->request->getPost('agama');
        $nomorHp = $this->request->getPost('nomorHp');
        $alamat = $this->request->getPost('alamat');

        $rules = [
            'idJabatan' => 'required',
            'nama' => 'required',
            'jenisKelamin' => 'required',
            'tempatLahir' => 'required',
            'tanggalLahir' => 'required',
            'agama' => 'required',
            'nomorHp' => 'required',
            'alamat' => 'required',
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('msg-danger', 'Data gagal ditambahkan!!!');
            return redirect()->to('admin/petugas')->withInput();
        }

        $this->PetugasModel->save([
            'idJabatan' => $idJabatan,
            'nama' => $nama,
            'jenisKelamin' => $jenisKelamin,
            'tempatLahir' => $tempatLahir,
            'tanggalLahir' => $tanggalLahir,
            'agama' => $agama,
            'nomorHp' => $nomorHp,
            'alamat' => $alamat
        ]);

        session()->setFlashdata('msg-success', 'Data berhasil ditambahkan!!!');
        return redirect()->to('admin/petugas');
    }


    // route : admin/petugas/edit/(:num)
    public function update($id)
    {
        $idJabatan = $this->request->getPost('idJabatan');
        $nama = $this->request->getPost('nama');
        $jenisKelamin = $this->request->getPost('jenisKelamin');
        $tempatLahir = $this->request->getPost('tempatLahir');
        $tanggalLahir = $this->request->getPost('tanggalLahir');
        $agama = $this->request->getPost('agama');
        $nomorHp = $this->request->getPost('nomorHp');
        $alamat = $this->request->getPost('alamat');

        $rules = [
            'idJabatan' => 'required',
            'nama' => 'required',
            'jenisKelamin' => 'required',
            'tempatLahir' => 'required',
            'tanggalLahir' => 'required',
            'agama' => 'required',
            'nomorHp' => 'required',
            'alamat' => 'required',
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('msg-danger', 'Data gagal diubah !!!');
            return redirect()->to('admin/petugas')->withInput();
        }

        // dd($id, [
        //     'idJabatan' => $idJabatan,
        //     'nama' => $nama,
        //     'jenisKelamin' => $jenisKelamin,
        //     'tempatLahir' => $tempatLahir,
        //     'tanggalLahir' => $tanggalLahir,
        //     'agama' => $agama,
        //     'nomorHp' => $nomorHp,
        //     'alamat' => $alamat
        // ]);

        $this->PetugasModel->update($id, [
            'idJabatan' => $idJabatan,
            'nama' => $nama,
            'jenisKelamin' => $jenisKelamin,
            'tempatLahir' => $tempatLahir,
            'tanggalLahir' => $tanggalLahir,
            'agama' => $agama,
            'nomorHp' => $nomorHp,
            'alamat' => $alamat
        ]);

        session()->setFlashdata('msg-success', 'Data berhasil diubah!!!');
        return redirect()->to('admin/petugas');
    }


    // route : admin/petugas/(:num)
    public function delete($id)
    {
        $this->PetugasModel->where('id', $id)->delete();
        session()->setFlashdata('msg-delete', 'Data berhasil dihapus!!!');
        return redirect()->to('admin/petugas');
    }
}

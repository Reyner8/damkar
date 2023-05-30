<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Kelurahan extends BaseController
{
  protected $RelationTable;
  protected $KelurahanModel;
  protected $KecamatanModel;

  public function __construct()
  {
    $this->RelationTable = new \App\Models\RelationTable();
    $this->KelurahanModel = new \App\Models\KelurahanModel();
    $this->KecamatanModel = new \App\Models\KecamatanModel();
  }

  public function index()
  {
    return view('admin/kelurahan', [
      'judul' => 'Kelurahan',
      'validation' => \Config\Services::validation(),
      'listKelurahan' => $this->RelationTable->getAllKelurahan(),
      'listKecamatan' => $this->KecamatanModel->findAll(),
      'isEdit' => false
    ]);
  }


  public function edit($id)
  {
    return view('admin/kelurahan', [
      'judul' => 'Kelurahan',
      'validation' => \Config\Services::validation(),
      'listKelurahan' => $this->RelationTable->getAllKelurahan(),
      'listKecamatan' => $this->KecamatanModel->findAll(),
      'dataEdit' => $this->KelurahanModel->find($id),
      'isEdit' => true
    ]);
  }

  // route : admin/kelurahan
  public function save()
  {
    $idKecamatan = $this->request->getPost('idKecamatan');
    $nama = $this->request->getPost('nama');

    if (!$this->validate([
      'nama' => 'required',
    ])) {
      session()->setFlashdata('msg-danger', 'Data gagal ditambahkan!!!');
      return redirect()->to('admin/kelurahan')->withInput();
    }

    $this->KelurahanModel->save(['idKecamatan' => $idKecamatan, 'nama' => $nama]);

    session()->setFlashdata('msg-success', 'Data berhasil ditambahkan!!!');
    return redirect()->to('admin/kelurahan');
  }


  // route : admin/kelurahan/(:num)
  public function update($id)
  {
    $idKecamatan = $this->request->getPost('idKecamatan');
    $nama = $this->request->getPost('nama');

    if (!$this->validate([
      'nama' => 'required',
    ])) {
      session()->setFlashdata('msg-danger', 'Data gagal ditambahkan!!!');
      return redirect()->to('admin/kelurahan')->withInput();
    }

    $this->KelurahanModel->update($id, ['idKecamatan' => $idKecamatan, 'nama' => $nama]);

    session()->setFlashdata('msg', 'Data berhasil diubah!!!');
    return redirect()->to('admin/kelurahan');
  }

  // route : admin/kelurahan/(:num)
  public function delete($id)
  {
    $idKelurahan = $this->KelurahanModel->find($id)['id'];
    $this->KelurahanModel->delete($idKelurahan);
    return redirect()->to('admin/kelurahan/' . $id);
  }
}

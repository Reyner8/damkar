<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Kecamatan extends BaseController
{
  protected $RelationTable;
  protected $KecamatanModel;

  public function __construct()
  {
    $this->RelationTable = new \App\Models\RelationTable();
    $this->KecamatanModel = new \App\Models\KecamatanModel();
  }

  public function index()
  {
    return view('admin/kecamatan', [
      'judul' => 'Kecamatan',
      'validation' => \Config\Services::validation(),
      'listKecamatan' => $this->KecamatanModel->findAll(),
      'isEdit' => false
    ]);
  }

  public function edit($id)
  {
    return view('admin/kecamatan', [
      'judul' => 'Kecamatan',
      'validation' => \Config\Services::validation(),
      'listKecamatan' => $this->KecamatanModel->findAll(),
      'dataEdit' => $this->KecamatanModel->find($id),
      'isEdit' => true
    ]);
  }

  // route : admin/kecamatan
  public function save()
  {
    $nama = $this->request->getPost('nama');

    if (!$this->validate([
      'nama' => 'required',
    ])) {
      session()->setFlashdata('msg-danger', 'Data gagal ditambahkan!!!');
      return redirect()->to('admin/kecamatan')->withInput();
    }

    $this->KecamatanModel->save(['nama' => $nama]);

    session()->setFlashdata('msg-success', 'Data berhasil ditambahkan!!!');
    return redirect()->to('admin/kecamatan');
  }


  // route : admin/kecamatan/(:num)
  public function update($id)
  {
    $nama = $this->request->getPost('nama');

    if (!$this->validate([
      'nama' => 'required',
    ])) {
      session()->setFlashdata('msg-danger', 'Data gagal ditambahkan!!!');
      return redirect()->to('admin/kecamatan')->withInput();
    }

    $this->KecamatanModel->update($id, ['nama' => $nama]);

    session()->setFlashdata('msg', 'Data berhasil diubah!!!');
    return redirect()->to('admin/kecamatan');
  }

  // route : admin/kecamatan/(:num)
  public function delete($id)
  {
    $idKecamatan = $this->KecamatanModel->find($id)['id'];
    $this->KecamatanModel->delete($idKecamatan);
    return redirect()->to('admin/kecamatan');
  }
}

<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Jabatan extends BaseController
{
  protected $RelationTable;
  protected $JabatanModel;

  public function __construct()
  {
    $this->RelationTable = new \App\Models\RelationTable();
    $this->JabatanModel = new \App\Models\JabatanModel();
  }

  public function index()
  {
    return view('admin/jabatan', [
      'judul' => 'Jabatan',
      'validation' => \Config\Services::validation(),
      'listJabatan' => $this->JabatanModel->findAll(),
      'isEdit' => false
    ]);
  }

  public function edit($id)
  {
    return view('admin/jabatan', [
      'judul' => 'Jabatan',
      'validation' => \Config\Services::validation(),
      'listJabatan' => $this->JabatanModel->findAll(),
      'dataEdit' => $this->JabatanModel->find($id),
      'isEdit' => true
    ]);
  }

  // route : admin/jabatan
  public function save()
  {
    $nama = $this->request->getPost('nama');

    if (!$this->validate([
      'nama' => 'required',
    ])) {
      session()->setFlashdata('msg-danger', 'Data gagal ditambahkan!!!');
      return redirect()->to('admin/jabatan')->withInput();
    }

    $this->JabatanModel->save(['nama' => $nama]);

    session()->setFlashdata('msg-success', 'Data berhasil ditambahkan!!!');
    return redirect()->to('admin/jabatan');
  }


  // route : admin/jabatan/(:num)
  public function update($id)
  {
    $nama = $this->request->getPost('nama');

    if (!$this->validate([
      'nama' => 'required',
    ])) {
      session()->setFlashdata('msg-danger', 'Data gagal ditambahkan!!!');
      return redirect()->to('admin/jabatan')->withInput();
    }

    $this->JabatanModel->update($id, ['nama' => $nama]);

    session()->setFlashdata('msg', 'Data berhasil diubah!!!');
    return redirect()->to('admin/jabatan');
  }

  // route : admin/jabatan/(:num)
  public function delete($id)
  {
    $idJabatan = $this->JabatanModel->find($id)['id'];
    $this->JabatanModel->delete($idJabatan);
    return redirect()->to('admin/jabatan');
  }
}

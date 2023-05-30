<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Regu extends BaseController
{
  protected $RelationTable;
  protected $ReguModel;

  public function __construct()
  {
    $this->RelationTable = new \App\Models\RelationTable();
    $this->ReguModel = new \App\Models\ReguModel();
  }

  public function index()
  {
    return view('admin/regu', [
      'judul' => 'Regu',
      'validation' => \Config\Services::validation(),
      'listRegu' => $this->ReguModel->findAll(),
      'isEdit' => false
    ]);
  }

  public function edit($id)
  {
    return view('admin/regu', [
      'judul' => 'Regu',
      'validation' => \Config\Services::validation(),
      'listRegu' => $this->ReguModel->findAll(),
      'dataEdit' => $this->ReguModel->find($id),
      'isEdit' => true
    ]);
  }

  // route : admin/regu
  public function save()
  {
    $nama = $this->request->getPost('nama');

    if (!$this->validate([
      'nama' => 'required',
    ])) {
      session()->setFlashdata('msg-danger', 'Data gagal ditambahkan!!!');
      return redirect()->to('admin/regu')->withInput();
    }

    $this->ReguModel->save(['nama' => $nama]);

    session()->setFlashdata('msg-success', 'Data berhasil ditambahkan!!!');
    return redirect()->to('admin/regu');
  }


  // route : admin/regu/(:num)
  public function update($id)
  {
    $nama = $this->request->getPost('nama');

    if (!$this->validate([
      'nama' => 'required',
    ])) {
      session()->setFlashdata('msg-danger', 'Data gagal ditambahkan!!!');
      return redirect()->to('admin/regu')->withInput();
    }

    $this->ReguModel->update($id, ['nama' => $nama]);

    session()->setFlashdata('msg', 'Data berhasil diubah!!!');
    return redirect()->to('admin/regu');
  }

  // route : admin/regu/(:num)
  public function delete($id)
  {
    $idRegu = $this->ReguModel->find($id)['id'];
    $this->ReguModel->delete($idRegu);
    return redirect()->to('admin/regu');
  }
}

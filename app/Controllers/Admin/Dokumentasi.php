<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dokumentasi extends BaseController
{
    protected $RelationTable;
    protected $KejadianModel;
    protected $DokumentasiModel;    

    public function __construct()
    {
        $this->RelationTable = new \App\Models\RelationTable();
        $this->KejadianModel = new \App\Models\KejadianModel();
        $this->DokumentasiModel = new \App\Models\DokumentasiModel();
        
    }

    public function dokumentasi($idKejadian)
    {

        return view('admin/dokumentasi', [
            'judul' => 'Admin | Dokumentasi',
            'validation' => \Config\Services::validation(),
            'listDokumentasi' => $this->RelationTable->getDokumentasiByIdKejadian($idKejadian),
            'kejadian' => $this->KejadianModel->find($idKejadian),
        ]);
    }

    // route : admin/petugas/save
    public function save($idKejadian)
    {
//         $files = $this->request->getFileMultiple('files');
// dd($files);
        $rules = [
            'files' => ['uploaded[files]'],
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('msg-danger', 'Data gagal ditambahkan!!!');
            return redirect()->to('admin/kejadian/dokumentasi/'. $idKejadian)->withInput();
        }

        if ($imagefile = $this->request->getFiles()) {
            foreach ($imagefile['files'] as $img) {
                if ($img->isValid() && !$img->hasMoved()) {
                    $newName = $img->getRandomName();
                    // dd($newName);
                    $img->move('assets/uploads/galeri/', $newName);
                    $this->DokumentasiModel->save([
                        'idKejadian' => $idKejadian,
                        'file' => $newName
                    ]);
                }
            }
        }else{
            session()->setFlashdata('msg-danger', 'Data gagal diupload!!!');
            return redirect()->to('admin/kejadian/dokumentasi/'. $idKejadian)->withInput();
        }

        session()->setFlashdata('msg-success', 'Data berhasil diupload!!!');
        return redirect()->to('admin/kejadian/dokumentasi/'. $idKejadian);
    }

    // route : admin/kejadian/dokumentasi/(:num)
    public function delete($id)
    {
        $dokumentasi = $this->DokumentasiModel->find($id);
        $idKejadian = $dokumentasi['idKejadian'];
        $file = $dokumentasi['file'];
        $this->DokumentasiModel->delete($id);
        unlink('assets/uploads/galeri/'. $file);
        session()->setFlashdata('msg-delete', 'Data berhasil dihapus!!!');
        return redirect()->to('admin/kejadian/dokumentasi/'. $idKejadian);
    }
}

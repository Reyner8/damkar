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
            'isEdit' => false
        ]);
    }

    // route : admin/petugas/save
    public function save($idKejadian)
    {
        $rules = [
            'files' => [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[files]',
                    'is_image[files]',
                    'mime_in[files,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    'max_size[files,100]',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('msg-danger', 'Data gagal ditambahkan!!!');
            return redirect()->to('admin/kejadian/dokumentasi/'. $idKejadian)->withInput();
        }

        $files = $this->request->getFileMultiple('files');

        if ($imagefile = $this->request->getFiles()) {
            foreach ($imagefile['files'] as $img) {
                if ($img->isValid() && !$img->hasMoved()) {
                    $newName = $img->getRandomName();
                    $img->move('/assets/uploads/galeri', $newName);

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
        return redirect()->to('admin/kejadian/penugasan/'. $idKejadian);
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

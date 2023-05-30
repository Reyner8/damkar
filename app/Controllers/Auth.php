<?php

namespace App\Controllers;

use App\Controllers\BaseController;


class Auth extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Login Page',
            'validation' => \Config\Services::validation(),
        ];

        return view('auth', $data);
    }

    public function login()
    {

        // request form
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // validation
        $rules = ['username' => 'required', 'password' => 'required'];

        // validate form
        if (!$this->validate($rules)) {
            // $validation = \Config\Services::validation();
            return redirect()->to('auth')->withInput();
            // ->with('validation', $validation);
        }

        $AdminModel = new \App\Models\AdminModel();
        $getDataAdmin = $AdminModel->where('username', $username)->first();

        // check data valid
        if (!$getDataAdmin) {
            session()->setFlashdata('msg', 'Username atau Password salah!!!');
            return redirect()->to('auth')->withInput();
        }

        // check password valid
        if (!password_verify($password, $getDataAdmin['password'])) {
            session()->setFlashdata('msg', 'Username atau Password salah!!!');
            return redirect()->to('auth')->withInput();
        }

        session()->set([
            'isLogged' => true,
            'role' => 'admin'
        ]);
        return redirect()->to('admin/beranda');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('auth');
    }
}

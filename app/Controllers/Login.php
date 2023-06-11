<?php

namespace App\Controllers;

use App\Models\AuthModel;

class Login extends BaseController
{
    public function __construct()
    {
        $this->auth = new AuthModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Login',
            'main'  => 'auth/login/index'
        ];

        return view('auth/layout/template', $data);
    }

    public function execute()
    {
        $request = $this->request->getVar();
        $result  = $this->auth->login($request);

        if ($result) {
            return redirect()->to(base_url());
        }

        session()->setFlashdata('err_login', 'Username atau password anda salah!');
        return redirect()->to(site_url('login'));
    }

    public function logout()
    {
        $this->auth->logout();
        return redirect()->to(site_url('login'));
    }
}

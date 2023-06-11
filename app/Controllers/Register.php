<?php

namespace App\Controllers;

use App\Models\AuthModel;

class Register extends BaseController
{
    public function __construct()
    {
        $this->auth = new AuthModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Registrasi',
            'main'  => 'auth/register/index'
        ];

        return view('auth/layout/template', $data);
    }

    public function execute()
    {
        $request = $this->request->getVar();
        $result  = $this->auth->register($request);

        if ($result) {
            return redirect()->to(site_url('login'));
        }

        return redirect()->to(site_url('register'));
    }
}

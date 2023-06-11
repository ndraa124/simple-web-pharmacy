<?php

namespace App\Controllers;

class Forgot extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Lupa Password',
            'main'  => 'auth/forgot/index'
        ];

        return view('auth/layout/template', $data);
    }

    public function verify()
    {
        $data = [
            'title' => 'Lupa Password',
            'main'  => 'auth/forgot/reset'
        ];

        return view('auth/layout/template', $data);
    }

    public function reset()
    {
        return redirect()->to('login');
    }
}

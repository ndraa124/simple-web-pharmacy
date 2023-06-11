<?php

namespace App\Controllers;

class About extends BaseController
{
    public function __construct()
    {
        $this->page  = 'about-page';
        $this->title = 'Tentang Kami';
    }

    public function index()
    {
        $data = [
            'page'  => $this->page,
            'title' => $this->title,
            'main'  => 'about/index'
        ];

        return view('layout/template', $data);
    }
}

<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Home extends BaseController
{
    public function __construct()
    {
        $this->page  = 'home-page';
        $this->title = 'Beranda';

        $this->product = new ProductModel();
    }

    public function index()
    {
        $data = [
            'page'    => $this->page,
            'title'   => $this->title,
            'main'    => 'home/index',
            'product' => $this->product->getAllData(),
        ];

        return view('layout/template', $data);
    }
}

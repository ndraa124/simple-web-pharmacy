<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\CategoryModel;

class Product extends BaseController
{
    public function __construct()
    {
        $this->page  = 'product-page';
        $this->title = 'Daftar Produk';

        $this->product = new ProductModel();
        $this->category = new CategoryModel();
    }

    public function index()
    {
        $data = [
            'page'    => $this->page,
            'title'   => $this->title,
            'main'    => 'product/index',
            'product' => $this->product->getAllData(),
        ];

        return view('layout/template', $data);
    }

    public function create()
    {
        if (!$this->request->is('post')) {
            $data = [
                'page'     => $this->page,
                'title'    => 'Tambah Produk',
                'main'     => 'product/create',
                'category' => $this->category->getAllData()
            ];

            return view('layout/template', $data);
        } else {
            $requestFile = $this->request->getFile('product_image');
            $request     = $this->request->getVar();

            if ($requestFile->getSize() > 0) {
                $request['product_image'] = uploadFileProduct($requestFile);
            }

            $result  = $this->product->saveData($request);

            if ($result) {
                session()->setFlashdata('success', 'Produk berhasil ditambahkan.');
                return redirect()->to('product');
            }

            session()->setFlashdata('error', 'Produk gagal ditambahkan!');
            return redirect()->to('product/create');
        }
    }

    public function update($id = null)
    {
        $data  = $this->product->getData($id);

        if (!$this->request->is('put')) {
            if (!$data) {
                session()->setFlashdata('error', 'Produk tidak ditemukan.');
                return redirect()->to('product');
            }

            $data = [
                'page'     => $this->page,
                'title'    => 'Edit Produk',
                'main'     => 'product/edit',
                'category' => $this->category->getAllData(),
                'data'     => $data
            ];

            return view('layout/template', $data);
        } else {
            $requestFile = $this->request->getFile('product_image');
            $request     = $this->request->getVar();

            if ($requestFile->getSize() > 0) {
                $request['product_image'] = uploadFileProduct($requestFile);
            } else {
                $request['product_image'] = $data['product_image'];
            }

            $result  = $this->product->saveData($request);

            if ($result) {
                session()->setFlashdata('success', 'Produk berhasil diubah.');
                return redirect()->to('product');
            }

            session()->setFlashdata('error', 'Produk gagal diubah!');
            return redirect()->to('product/update');
        }
    }

    public function delete($id = null)
    {
        $data  = $this->product->getData($id);

        if (!$data) {
            session()->setFlashdata('error', 'Produk tidak ditemukan.');
            return redirect()->to('product');
        }

        if ($this->request->is('delete')) {
            $result  = $this->product->deleteData($id);

            if ($result) {
                session()->setFlashdata('success', 'Produk berhasil dihapus.');
                return redirect()->to('product');
            }
        } else {
            session()->setFlashdata('error', 'Produk gagal dihapus!');
            return redirect()->to('product');
        }
    }
}

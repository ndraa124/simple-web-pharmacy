<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoryModel;

class Category extends BaseController
{
    public function __construct()
    {
        $this->page  = 'category-page';
        $this->title = 'Daftar Kategori';

        $this->category = new CategoryModel();
    }

    public function index()
    {
        $data = [
            'page'     => $this->page,
            'title'    => $this->title,
            'main'     => 'category/index',
            'category' => $this->category->getAllData()
        ];

        return view('layout/template', $data);
    }

    public function create()
    {
        if (!$this->request->is('post')) {
            $data = [
                'page'     => $this->page,
                'title'    => 'Tambah Kategori',
                'main'     => 'category/create',
                'category' => $this->category->getAllData()
            ];

            return view('layout/template', $data);
        } else {
            $request = $this->request->getVar();
            $result  = $this->category->saveData($request);

            if ($result) {
                session()->setFlashdata('success', 'Kategori berhasil ditambahkan.');
                return redirect()->to('category');
            }

            session()->setFlashdata('error', 'Kategori gagal ditambahkan!');
            return redirect()->to('category/create');
        }
    }

    public function update($id = null)
    {
        if (!$this->request->is('put')) {
            $data  = $this->category->getData($id);

            if (!$data) {
                session()->setFlashdata('error', 'Kategori tidak ditemukan.');
                return redirect()->to('category');
            }

            $data = [
                'page'     => $this->page,
                'title'    => 'Edit Kategori',
                'main'     => 'category/edit',
                'category' => $this->category->getAllData(),
                'data'     => $data
            ];

            return view('layout/template', $data);
        } else {
            $request = $this->request->getVar();
            $result  = $this->category->saveData($request);

            if ($result) {
                session()->setFlashdata('success', 'Kategori berhasil diubah.');
                return redirect()->to('category');
            }

            session()->setFlashdata('error', 'Kategori gagal diubah!');
            return redirect()->to('category/update');
        }
    }

    public function delete($id = null)
    {
        $data  = $this->category->getData($id);

        if (!$data) {
            session()->setFlashdata('error', 'Kategori tidak ditemukan.');
            return redirect()->to('category');
        }

        if ($this->request->is('delete')) {
            $result  = $this->category->deleteData($id);

            if ($result) {
                session()->setFlashdata('success', 'Kategori berhasil dihapus.');
                return redirect()->to('category');
            }
        } else {
            session()->setFlashdata('error', 'Kategori gagal dihapus!');
            return redirect()->to('category');
        }
    }
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CartModel;

class Cart extends BaseController
{
    public function __construct()
    {
        $this->page  = 'cart-page';
        $this->title = 'Keranjang Saya';

        $this->cart = new CartModel();
    }

    public function index()
    {
        $data = [
            'page'      => $this->page,
            'title'     => $this->title,
            'main'      => 'cart/index',
            'cart'      => $this->cart->getAllData(),
            'cartTotal' => $this->cart->getTotal(),
        ];

        return view('layout/template', $data);
    }

    public function create()
    {
        if ($this->request->is('post')) {
            $request = $this->request->getVar();
            $result  = $this->cart->saveData($request);

            if ($result) {
                session()->setFlashdata('success', 'Produk berhasil ditambahkan ke Produk.');
                return redirect()->to('product');
            }
        }

        session()->setFlashdata('error', 'Produk gagal ditambahkan ke Produk!');
        return redirect()->to('product');
    }

    public function update($id = null)
    {
        $request = $this->request->getVar();
        $data    = $this->cart->getData($id);

        if (!$data) {
            session()->setFlashdata('error', 'Produk tidak ditemukan.');
            return redirect()->to('cart');
        }

        if ($this->request->is('put')) {
            $request['cart_qty'] = $data['cart_qty'] + 1;
            $result  = $this->cart->saveData($request, $id);

            if ($result) {
                session()->setFlashdata('success', 'Produk berhasil diubah.');
                return redirect()->to('cart');
            }

            session()->setFlashdata('error', 'Produk gagal diubah!');
            return redirect()->to('cart');
        } else if ($this->request->is('delete')) {
            $request['cart_qty'] = $data['cart_qty'] - 1;

            if ($request['cart_qty'] < 1) {
                $result = $this->cart->delete($id);
            } else {
                $result = $this->cart->saveData($request, $id);
            }

            if ($result) {
                session()->setFlashdata('success', 'Produk berhasil diubah.');
                return redirect()->to('cart');
            }

            session()->setFlashdata('error', 'Produk gagal diubah!');
            return redirect()->to('cart');
        } else {
            session()->setFlashdata('error', 'Produk gagal diubah!');
            return redirect()->to('cart');
        }
    }
}

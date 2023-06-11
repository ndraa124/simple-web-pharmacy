<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransactionModel;
use App\Models\TransactionDetailModel;
use App\Models\CartModel;

class Transaction extends BaseController
{
    public function __construct()
    {
        $this->page  = 'trx-page';
        $this->title = 'Transaksi';

        $this->trx = new TransactionModel();
        $this->trxDetail = new TransactionDetailModel();
        $this->cart = new CartModel();
    }

    public function index()
    {
        $data = [
            'page'  => $this->page,
            'title' => $this->title,
            'main'  => 'transaction/index',
            'trx'   => $this->trx->getAllData()
        ];

        return view('layout/template', $data);
    }

    public function create()
    {
        if ($this->request->is('post')) {
            $request = $this->request->getVar();

            $dataTrx = [
                'trx_invoice'    => generateInvoiceNumber('trx_invoice', 'transactions', 'INV' . Date('Ymd'), 5),
                'trx_total'      => $this->cart->getTotal(),
                'trx_note'       => $request['trx_note'],
                'payment_method' => $request['payment_method'],
                'user_id '       => session()->get('id'),
            ];

            $insertID = $this->trx->insertData($dataTrx);

            if ($insertID) {
                $this->insertDetail($insertID);

                session()->set(['trx_id' => $insertID]);
                session()->setFlashdata('success', 'Berhasil melakukan transaksi <br> Silahkan upload bukti bayar.');
                return redirect()->to('payment/uploadImage');
            }

            session()->setFlashdata('error', 'Gagal melakukan transaksi!');
            return redirect()->to('payment');
        }
    }

    function insertDetail($insertID)
    {
        $cartData = $this->cart->getAllData();

        foreach ($cartData as $row) {
            $this->trxDetail->insertData([
                'product_name'   => $row['cart_product'],
                'product_price'  => $row['cart_price'],
                'product_qty'    => $row['cart_qty'],
                'trx_id'         => $insertID,
                'product_id'     => $row['product_id'],
                'trx_created_at' => Date('Y-m-d H:i:s'),
            ]);
        }

        $result = $this->cart->deleteAllData();

        if ($result) {
            return true;
        }

        return false;
    }
}

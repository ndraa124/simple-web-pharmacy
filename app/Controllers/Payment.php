<?php

namespace App\Controllers;

use App\Models\TransactionModel;

class Payment extends BaseController
{
    public function __construct()
    {
        $this->page  = 'payment-page';
        $this->title = 'Pilih Pembayaran';

        $this->trx = new TransactionModel();
    }

    public function index()
    {
        $data = [
            'page'  => $this->page,
            'title' => $this->title,
            'main'  => 'payment/index'
        ];

        return view('layout/template', $data);
    }

    public function uploadImage()
    {
        $data = [
            'page'  => 'pop-page',
            'title' => 'Upload Bukti Bayar',
            'main'  => 'payment/upload'
        ];

        return view('layout/template', $data);
    }

    public function paymentImage($trxId)
    {
        $trxDetail = $this->trx->getData($trxId);

        $data = [
            'page'  => 'pop-page',
            'title' => 'Bukti Bayar',
            'main'  => 'payment/image',
            'trx'   => $trxDetail

        ];

        return view('layout/template', $data);
    }

    public function upload()
    {
        if ($this->request->is('put')) {
            $requestFile = $this->request->getFile('payment_image');
            $request     = $this->request->getVar();

            if ($requestFile->getSize() > 0) {
                $request['payment_image'] = uploadFilePayment($requestFile);
            } else {
                session()->setFlashdata('error', 'Bukti bayar harus diupload!');
                return redirect()->to('payment/uploadImage');
            }

            $result  = $this->trx->updateData($request['trx_id'], ['payment_image' => $request['payment_image']]);

            if ($result) {
                session()->setFlashdata('success', 'Bukti bayar berhasil diupload. Pesanan anda sementara diproses.');
                return redirect()->to('/');
            }

            session()->setFlashdata('error', 'Bukti bayar gagal diupload!');
            return redirect()->to('payment/uploadImage');
        }

        session()->setFlashdata('error', 'Bukti bayar gagal diupload!');
        return redirect()->to('payment/uploadImage');
    }
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionDetailModel extends Model
{
    protected $table          = 'transaction_details';
    protected $primaryKey     = 'trx_detail_id';
    protected $allowedFields  = [
        'product_name',
        'product_price',
        'product_qty',
        'trx_id',
        'product_id',
    ];

    public function getAllData($trxId)
    {
        $result = $this->where('trx_id', $trxId)
            ->findAll();

        if ($result) {
            return $result;
        }

        return [];
    }

    public function insertData($data)
    {
        $result = $this->insert($data);

        if ($result) {
            return true;
        }

        return false;
    }
}

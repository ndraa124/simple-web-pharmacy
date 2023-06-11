<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
    protected $table          = 'transactions';
    protected $primaryKey     = 'trx_id';
    protected $allowedFields  = [
        'trx_invoice',
        'trx_total',
        'trx_note',
        'payment_method',
        'payment_image',
        'user_id ',
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'trx_created_at';
    protected $updatedField  = 'trx_updated_at';

    public function getAllData()
    {
        $result = $this->join('users', 'users.user_id = transactions.user_id')
            ->findAll();

        if ($result) {
            return $result;
        }

        return [];
    }

    public function getData($id)
    {
        $result = $this->find($id);

        if ($result) {
            return $result;
        }

        return false;
    }

    public function insertData($data)
    {
        $result = $this->insert($data);

        if ($result) {
            return $this->insertID();
        }

        return false;
    }

    public function updateData($id, $data)
    {
        $result = $this->update($id, $data);

        if ($result) {
            session()->remove(['trx_id']);
            return true;
        }

        return false;
    }
}

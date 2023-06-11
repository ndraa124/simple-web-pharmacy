<?php

namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $table          = 'cart';
    protected $primaryKey     = 'cart_id';
    protected $allowedFields  = [
        'cart_id',
        'cart_product',
        'cart_price',
        'cart_qty',
        'product_id',
        'user_id',
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'cart_created_at';
    protected $updatedField  = 'cart_updated_at';

    public function getAllData()
    {
        $result = $this->where('user_id', session()->get('id'))
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

    public function saveData($data, $id = null)
    {
        if ($id != null) {
            $data['cart_id'] = $id;
        } else {
            $data['user_id'] = session()->get('id');
        }

        $result = $this->save($data);

        if ($result) {
            return true;
        }

        return false;
    }

    public function deleteData($id)
    {
        $result = $this->delete([$id]);

        if ($result) {
            return true;
        }

        return false;
    }

    public function deleteAllData()
    {
        $result = $this->where('user_id', session()->get('id'))
            ->delete();

        if ($result) {
            return true;
        }

        return false;
    }

    public function getTotal()
    {
        $result = $this->where('user_id', session()->get('id'))
            ->findAll();

        $cartPrice = 0;
        foreach ($result as $row) {
            $cartPrice += $row['cart_price'] * $row['cart_qty'];
        }

        return $cartPrice;
    }
}

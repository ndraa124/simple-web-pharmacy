<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table          = 'product';
    protected $primaryKey     = 'product_id';
    protected $useSoftDeletes = true;
    protected $allowedFields  = [
        'product_id',
        'product_name',
        'product_price',
        'product_qty',
        'product_desc',
        'product_status',
        'product_image',
        'category_id'
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'product_created_at';
    protected $updatedField  = 'product_updated_at';
    protected $deletedField  = 'product_deleted_at';

    public function getAllData()
    {
        $result = $this->join('category', 'product.category_id = category.category_id')
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
            $data['product_id'] = $id;
        }
        $data['product_status'] = 1;

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
}

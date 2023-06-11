<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table          = 'category';
    protected $primaryKey     = 'category_id';
    protected $useSoftDeletes = true;
    protected $allowedFields  = [
        'category_id',
        'category_name',
        'category_status',
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'category_created_at';
    protected $updatedField  = 'category_updated_at';
    protected $deletedField  = 'category_deleted_at';

    public function getAllData()
    {
        $result = $this->findAll();

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
            $data['category_id'] = $id;
        }
        $data['category_status'] = 1;

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

<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table         = 'users';
    protected $primaryKey    = 'user_id';
    protected $allowedFields = [
        'user_id',
        'user_fullname',
        'user_name',
        'user_email',
        'user_password',
        'user_status',
        'role_id'
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'user_created_at';
    protected $updatedField  = 'user_updated_at';

    protected $beforeInsert  = ['hashPassword'];
    protected $beforeUpdate  = ['hashPassword'];

    public function login($data)
    {
        $result = $this->where('user_name', $data['username'])->first();

        if ($result) {
            if (password_verify($data['password'], $result['user_password'])) {
                $sess = [
                    'id'       => $result['user_id'],
                    'fullname' => $result['user_fullname'],
                    'username' => $result['user_name'],
                    'email'    => $result['user_email'],
                    'role'     => $result['role_id'],
                    'is_login' => true
                ];

                session()->set($sess);
                return true;
            }

            return false;
        }

        return false;
    }

    public function logout()
    {
        $sess = [
            'id',
            'fullname',
            'username',
            'email',
            'role',
            'is_login'
        ];

        session()->remove($sess);
        return true;
    }

    public function register($data)
    {
        $input = [
            'user_fullname' => $data['name'],
            'user_name'     => $data['username'],
            'user_email'    => $data['email'],
            'user_password' => $data['password'],
            'user_status'   => 1,
            'role_id'       => 2
        ];

        $result   = $this->save($input);
        $insertID = $this->insertID();

        if ($result) {
            $this->db->table('user_details')->insert(['user_id' => $insertID]);
            return true;
        }

        return false;
    }

    public function forgot($data)
    {
        # code...
    }

    public function hashPassword(array $data)
    {
        if (!isset($data['data']['user_password'])) {
            return $data;
        }

        $options = [
            'cost' => 10,
        ];

        $data['data']['user_password'] = password_hash($data['data']['user_password'], PASSWORD_DEFAULT, $options);

        return $data;
    }
}

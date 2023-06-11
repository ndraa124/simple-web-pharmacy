<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'user_fullname'   => "Administrator",
            'user_name'       => "admin",
            'user_email'      => "admin@mail.com",
            'user_password'   => password_hash("123456", PASSWORD_DEFAULT, ['cost' => 10]),
            'user_status'     => 1,
            'role_id'         => 1,
            'user_created_at' => date("Y-m-d H:i:s"),
            'user_updated_at' => date("Y-m-d H:i:s"),
        ];

        $result   = $this->db->table('users')->insert($data);
        $insertID = $this->db->insertID();

        if ($result) {
            $detail = [
                'user_id'           => $insertID,
                'detail_address'    => "Jl. Raya Kelapa Gading Permai DE No.12A, RT.5/RW.17, Klp. Gading Tim., Kec. Klp. Gading, Jkt Utara, Daerah Khusus Ibukota Jakarta 14240",
                'detail_gender'     => 1,
                'detail_phone'      => "",
                'detail_created_at' => date("Y-m-d H:i:s"),
                'detail_updated_at' => date("Y-m-d H:i:s"),
            ];

            $this->db->table('user_details')->insert($detail);
        }
    }
}

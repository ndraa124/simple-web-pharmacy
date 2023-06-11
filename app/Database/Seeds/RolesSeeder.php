<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RolesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'role_name'       => "Administrator",
                'role_created_at' => date("Y-m-d H:i:s"),
                'role_updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'role_name'       => "Customer",
                'role_created_at' => date("Y-m-d H:i:s"),
                'role_updated_at' => date("Y-m-d H:i:s"),
            ],
        ];

        $this->db->table('roles')->insertBatch($data);
    }
}

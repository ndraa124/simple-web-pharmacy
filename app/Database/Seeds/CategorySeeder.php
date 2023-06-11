<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'category_name'       => "Obat Bebas Terbatas",
                'category_status'     => "1",
                'category_created_at' => date("Y-m-d H:i:s"),
                'category_updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'category_name'       => "Obat Bebas",
                'category_status'     => "1",
                'category_created_at' => date("Y-m-d H:i:s"),
                'category_updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'category_name'       => "Obat Keras",
                'category_status'     => "1",
                'category_created_at' => date("Y-m-d H:i:s"),
                'category_updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'category_name'       => "Obat Wajib Apotek (OWA)",
                'category_status'     => "1",
                'category_created_at' => date("Y-m-d H:i:s"),
                'category_updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'category_name'       => "Obat Golongan Narkotika",
                'category_status'     => "1",
                'category_created_at' => date("Y-m-d H:i:s"),
                'category_updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'category_name'       => "Obat Psikotropika",
                'category_status'     => "1",
                'category_created_at' => date("Y-m-d H:i:s"),
                'category_updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'category_name'       => "Obat Herbal",
                'category_status'     => "1",
                'category_created_at' => date("Y-m-d H:i:s"),
                'category_updated_at' => date("Y-m-d H:i:s"),
            ],
        ];

        $this->db->table('category')->insertBatch($data);
    }
}

<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');

        for ($i = 1; $i <= 5; $i++) {
            $data = [
                'product_name'       => "Product " . $i,
                'product_price'      => $faker->randomElement([15000, 20000, 25000, 30000, 35000, 40000, 45000]),
                'product_qty'        => $faker->numberBetween(10, 100),
                'product_desc'       => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur id nam qui repudiandae veniam cumque beatae dignissimos, autem fuga, nobis exercitationem distinctio quasi quibusdam, et ex rem corporis porro. Cupiditate!",
                'product_status'     => 1,
                'category_id'        => $faker->numberBetween(1, 7),
                'product_created_at' => date("Y-m-d H:i:s"),
                'product_updated_at' => date("Y-m-d H:i:s"),
            ];

            $this->db->table('product')->insert($data);
        }
    }
}

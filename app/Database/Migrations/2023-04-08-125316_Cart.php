<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Cart extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'cart_id' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'cart_product' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'cart_price' => [
                'type'       => 'BIGINT',
                'constraint' => 12,
            ],
            'cart_qty' => [
                'type'       => 'INT',
                'constraint' => 4
            ],
            'product_id' => [
                'type'       => 'INT',
                'constraint' => 10,
                'unsigned'   => true
            ],
            'user_id' => [
                'type'       => 'INT',
                'constraint' => 10,
                'unsigned'   => true
            ],
            'cart_created_at' => [
                'type'       => 'DATETIME',
            ],
            'cart_updated_at' => [
                'type'       => 'DATETIME',
            ],
        ]);
        $this->forge->addKey('cart_id', true);
        $this->forge->addForeignKey('product_id', 'product', 'product_id');
        $this->forge->addForeignKey('user_id', 'users', 'user_id');
        $this->forge->createTable('cart');
    }

    public function down()
    {
        $this->forge->dropTable('cart');
    }
}

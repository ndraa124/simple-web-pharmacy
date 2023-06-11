<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Product extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'product_id' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'product_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'product_price' => [
                'type'       => 'BIGINT',
                'constraint' => 12,
            ],
            'product_qty' => [
                'type'       => 'INT',
                'constraint' => 4
            ],
            'product_desc' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'product_status' => [
                'type'       => 'TINYINT',
                'constraint' => 2
            ],
            'product_image' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'category_id' => [
                'type'       => 'INT',
                'constraint' => 10,
                'unsigned'   => true
            ],
            'product_created_at' => [
                'type'       => 'DATETIME',
            ],
            'product_updated_at' => [
                'type'       => 'DATETIME',
            ],
            'product_deleted_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
        ]);
        $this->forge->addKey('product_id', true);
        $this->forge->addForeignKey('category_id', 'category', 'category_id');
        $this->forge->createTable('product');
    }

    public function down()
    {
        $this->forge->dropTable('product');
    }
}

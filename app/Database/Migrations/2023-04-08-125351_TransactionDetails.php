<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TransactionDetails extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'trx_detail_id' => [
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
                'constraint' => 4,
            ],
            'trx_id' => [
                'type'       => 'INT',
                'constraint' => 10,
                'unsigned'   => true
            ],
            'product_id' => [
                'type'       => 'INT',
                'constraint' => 10,
                'unsigned'   => true
            ],
            'trx_created_at' => [
                'type'       => 'DATETIME',
            ],
        ]);
        $this->forge->addKey('trx_detail_id', true);
        $this->forge->addForeignKey('trx_id', 'transactions', 'trx_id');
        $this->forge->addForeignKey('product_id', 'product', 'product_id');
        $this->forge->createTable('transaction_details');
    }

    public function down()
    {
        $this->forge->dropTable('transaction_details');
    }
}

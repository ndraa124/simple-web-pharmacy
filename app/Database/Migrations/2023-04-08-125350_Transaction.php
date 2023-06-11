<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transaction extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'trx_id' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'trx_invoice' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'trx_total' => [
                'type'       => 'BIGINT',
                'constraint' => 12,
            ],
            'trx_note' => [
                'type'       => 'TEXT',
                'null'       => true
            ],
            'payment_method' => [
                'type'       => 'TINYINT',
                'constraint' => 2
            ],
            'payment_image' => [
                'type'       => 'TEXT',
                'null'       => true
            ],
            'user_id' => [
                'type'       => 'INT',
                'constraint' => 10,
                'unsigned'   => true
            ],
            'trx_created_at' => [
                'type'       => 'DATETIME',
            ],
            'trx_updated_at' => [
                'type'       => 'DATETIME',
            ],
        ]);
        $this->forge->addKey('trx_id', true);
        $this->forge->addForeignKey('user_id', 'users', 'user_id');
        $this->forge->createTable('transactions');
    }

    public function down()
    {
        $this->forge->dropTable('transactions');
    }
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserDetail extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'detail_id' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'detail_address' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'detail_gender' => [
                'type'       => 'TINYINT',
                'constraint' => 2,
                'null'       => true
            ],
            'detail_phone' => [
                'type'       => 'VARCHAR',
                'constraint' => 13,
                'null'       => true
            ],
            'user_id' => [
                'type'       => 'INT',
                'constraint' => 10,
                'unsigned'   => true,
            ],
            'detail_created_at' => [
                'type'       => 'DATETIME',
            ],
            'detail_updated_at' => [
                'type'       => 'DATETIME',
            ],
        ]);
        $this->forge->addKey('detail_id', true);
        $this->forge->addForeignKey('user_id', 'users', 'user_id');
        $this->forge->createTable('user_details');
    }

    public function down()
    {
        $this->forge->dropTable('user_details');
    }
}

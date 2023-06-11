<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_id' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_fullname' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'user_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 25,
            ],
            'user_email' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'user_password' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'user_status' => [
                'type'       => 'TINYINT',
                'constraint' => 2,
            ],
            'role_id' => [
                'type'       => 'INT',
                'constraint' => 10,
                'unsigned'   => true,
            ],
            'user_created_at' => [
                'type'       => 'DATETIME',
            ],
            'user_updated_at' => [
                'type'       => 'DATETIME',
            ],
            'user_deleted_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
        ]);
        $this->forge->addKey('user_id', true);
        $this->forge->addForeignKey('role_id', 'roles', 'role_id');
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}

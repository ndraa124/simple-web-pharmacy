<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call('RolesSeeder');
        $this->call('UsersSeeder');
        $this->call('CategorySeeder');
        $this->call('ProductSeeder');
    }
}

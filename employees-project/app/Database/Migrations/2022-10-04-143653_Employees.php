<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Employees extends Migration
{
    public function up()
    {
        $this->forge->addField([

            'id' => [
                'type'           => 'INT',
                'constraint'     => 12,
                'unsigned'       => true,
                'auto_increment' => true,
                'null'           => false
            ],
            'name' => [
                'type'           => 'VARCHAR',
                'constraint'      => '255'
            ],
            'manager' => [
                'type'           => 'VARCHAR',
                'constraint'      => '255'
            ],
            'username' => [
                'type'           => 'VARCHAR',
                'constraint'      => '255'
            ],
            'email' => [
                'type'           => 'VARCHAR',
                'constraint'      => '255'
            ],
            'department' => [
                'type'           => 'VARCHAR',
                'constraint'      => '255'
            ],
            'phone_number' => [
                'type'           => 'VARCHAR',
                'constraint'      => '255'
            ],
            'address' => [
                'type'           => 'VARCHAR',
                'constraint'      => '255'
            ],
            'start_date' => [
                'type'           => 'DATETIME'
            ],
            'end_date' => [
                'type'           => 'DATETIME'
            ],
            'status' => [
                'type'           => 'INT'
            ]

        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('employees');

    }

    public function down()
    {
        $this->forge->dropTable('employees');
    }
}
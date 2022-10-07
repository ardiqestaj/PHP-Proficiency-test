<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Departments extends Migration
{
    public function up()
    {
        $this->forge->addField([

            'id' => [
                'type'           => 'INT',
                'constraint'      => 12,
                'unsigned'       => true,
                'auto_increment' => true,
                'null'           => false

            ],
            'department_name' => [
                'type'           => 'VARCHAR',
                'constraint'      => '256'
            ],
            'department_leader' => [
                'type'           => 'VARCHAR',
                'constraint'      => '256'
            ],
            'department_phone' => [
                'type'           => 'VARCHAR',
                'constraint'      => '256'
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('departments');
    }

    public function down()
    {
        
        $this->forge->dropTable('departments');
    }
}
<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSharingPracticesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'title' => [
                'type'       => 'VARCHAR',
                'constraint' => '191',
                'null'      => true
            ],
            'url' => [
                'type'       => 'VARCHAR',
                'constraint' => '191',
                'null'      => true
            ],
            'type' => [
                'type'       => 'ENUM("MODULE", "VIDEO")',
                'default'     => 'MODULE'
            ],
            'description' => [
                'type'       => 'VARCHAR',
                'constraint' => '191',
                'null'      => true
            ],
            'status' => [
                'type'       => 'ENUM("WAIT_FOR_REVIEW", "APPROVE", "DECLINE")',
                'default'     => 'WAIT_FOR_REVIEW'
            ],
            'category_reference_id' => [
                'type'       => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'      => true
            ],
            'category_module_id' => [
                'type'       => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'      => true
            ],
            'user_id' => [
                'type'       => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'      => true
            ],
            'created_at' => [
                'type'       => 'DATETIME'
            ],
            'updated_at' => [
                'type'       => 'DATETIME'
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('category_reference_id', 'category_references', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('category_module_id', 'category_modules', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('sharing_practices');
    }

    public function down()
    {
        $this->forge->dropTable('sharing_practices');
    }
}

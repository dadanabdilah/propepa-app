<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateStudyModulesTable extends Migration
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
            'url_module' => [
                'type'       => 'VARCHAR',
                'constraint' => '191',
                'null'      => true
            ],
            'description' => [
                'type'       => 'VARCHAR',
                'constraint' => '191',
                'null'      => true
            ],
            'category_module_id' => [
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
        $this->forge->addForeignKey('category_module_id', 'category_modules', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('study_modules');
    }

    public function down()
    {
        $this->forge->dropTable('study_modules');
    }
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCategoryModulesTable extends Migration
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
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '191',
                'null'      => true
            ],
            'photo' => [
                'type'       => 'VARCHAR',
                'constraint' => '191',
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
        $this->forge->createTable('category_modules');
    }

    public function down()
    {
        $this->forge->dropTable('category_modules');
    }
}

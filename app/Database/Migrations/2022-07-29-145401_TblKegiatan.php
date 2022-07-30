<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class TblKegiatan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'    => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'auto_increment'    => true,
            ],
            'kegiatan'  => [
                'type'          => 'VARCHAR',
                'constraint'    => '255'
            ],
            'verified_by'   => [
                'type'              => 'INT',
                'unsigned'          => true,
            ],
            'created_at'    => [
                'type'          => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
            'deleted_at'    => [
                'type'           => 'TIMESTAMP',
                'null'           => true,
            ]
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('tbl_kegiatan');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_kegiatan');
    }
}

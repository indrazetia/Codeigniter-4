<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class TblPegawai extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'        => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'auto_increment'    => true,
            ],
            'fullname'  => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'created_at'    => [
                'type'          => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'updated_at'    => [
                'type'           => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'deleted_at'    => [
                'type'           => 'TIMESTAMP',
                'null'           => true,
            ]
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('tbl_pegawai');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_pegawai');
    }
}

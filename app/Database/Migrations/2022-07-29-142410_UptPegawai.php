<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class UptPegawai extends Migration
{
    public function up()
    {
        $fields = ['updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'];
        $this->forge->modifyColumn('tbl_pegawai', $fields);
    }

    public function down()
    {
        //
    }
}

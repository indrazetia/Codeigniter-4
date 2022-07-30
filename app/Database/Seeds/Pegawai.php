<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class Pegawai extends Seeder
{
    public function run()
    {
        $data = [
            [
                'fullname'      =>  'Lutfi',
                'created_at' => Time::now()
            ],
            [
                'fullname'      =>  'Heru',
                'created_at' => Time::now()
            ]
        ];
        $this->db->table('tbl_pegawai')->insertBatch($data);
    }
}

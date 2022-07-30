<?php

namespace App\Models;

use CodeIgniter\Model;

class KegiatanModel extends Model
{
    protected $table            = 'tbl_kegiatan';
    protected $primaryKey       = 'id';

    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['kegiatan', 'verified_by'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    function getAll()
    {
        $builder = $this->db->table('tbl_kegiatan A');
        $builder->select('A.id,
                        A.kegiatan,
                        A.verified_by,
                        B.fullname');
        $builder->join('tbl_pegawai B', 'B.id = A.verified_by', 'left');
        $query = $builder->get();
        return $query->getResult();
    }
}

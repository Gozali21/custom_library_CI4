<?php

namespace App\Models\Pendaftaran;

use CodeIgniter\Model;

class PendaftaranModel extends Model
{
    protected $table = 'pendaftaran_pasiens';
    protected $useTimestamps = true;
    protected $allowedFields = ['kode_pendaftaran'];

    function getKodePendaftaran($kode = null)
    {
        if (empty($kode)) {
            return $this->table('pendaftaran_pasiens')->selectMax('kode_pendaftaran')->findAll();
        }
    }
}

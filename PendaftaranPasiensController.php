<?php

namespace App\Controllers\Pendaftaran;

use App\Controllers\BaseController;
use App\Models\Pendaftaran\PendaftaranModel;

class PendaftaranPasiensController extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new PendaftaranModel();
    }

    function uuid()
    {
        dd($this->CustomLibrary->uuid());
    }

    function index()
    {
        $data = array(
            'title' => 'Pendaftaran',
        );

        return view('Pendaftaran/PendaftaranPasien/index', $data);
    }

    function prosesAdd($tipe)
    {
        $getKodePendaftaran = $this->model->getKodePendaftaran();
        $kodePendaftaran = $this->CustomLibrary->generateCode1($getKodePendaftaran[0]['kode_pendaftaran'], 'PEN');

        $aSavePendaftaran = [
            'kode_pendaftaran' => $kodePendaftaran,
        ];

        $this->model->insert($aSavePendaftaran);
        session()->setFlashdata('message', 'Data Berhasil Ditambahkan');
        return redirect()->to('/Pendaftaran/PendaftaranPasiens');
    }
}
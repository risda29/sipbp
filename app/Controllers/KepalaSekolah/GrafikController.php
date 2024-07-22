<?php

namespace App\Controllers\KepalaSekolah;

use App\Controllers\BaseController;
use App\Models\PeminjamanModel;

class GrafikController extends BaseController
{
    private $DataPeminjaman;

    public function __construct(){
        $this->DataPeminjaman = new PeminjamanModel();
    }

    public function index()
    {
        $barangDikembalikan = $this->DataPeminjaman->where('status', 'sudah-dikembalikan')->countAllResults();
        $barangBelumDikembalikan = $this->DataPeminjaman->where('status', 'belum-dikembalikan')->countAllResults();

        $data = [
            'page' => 'grafik',
            'barangDikembalikan' => $barangDikembalikan,
            'barangBelumDikembalikan' => $barangBelumDikembalikan,
        ];

        return view('pages/kepala sekolah/laporan/grafik', $data);
    }
}

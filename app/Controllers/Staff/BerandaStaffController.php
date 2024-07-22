<?php

namespace App\Controllers\Staff;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PeminjamanModel;

class BerandaStaffController extends BaseController
{
     private $dataPeminjamanModel;
    public function __construct()
    {
        $this->dataPeminjamanModel = new PeminjamanModel();
    }

    public function index()
    {
        
        $data = [
            'page' => 'Beranda',
            'peminjamandiacc' => $this->dataPeminjamanModel->where('status', 'sudah-dikembalikan')->orWhere('status', 'belum-dikembalikan')->countAllResults(),
            'peminjamanbelumdiacc'  => $this->dataPeminjamanModel->where('status', 'belum-acc')->countAllResults(),
        ];

        return view('pages/staff/beranda/beranda_staff', $data);
    }
}

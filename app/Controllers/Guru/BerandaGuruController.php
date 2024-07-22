<?php

namespace App\Controllers\Guru;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PeminjamanModel;


class BerandaGuruController extends BaseController
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
            'peminjamandiacc' => $this->dataPeminjamanModel->where('status', 'sudah-dikembalikan')->orWhere('status', 'belum-dikembalikan')->where('id_pengguna',session('id_pengguna'))->countAllResults(),
            'peminjamanbelumdiacc'  => $this->dataPeminjamanModel->where('status', 'belum-acc')->where('id_pengguna',session('id_pengguna'))->countAllResults(),
        ];

        return view('pages/guru/beranda/beranda_guru', $data);
    }
}

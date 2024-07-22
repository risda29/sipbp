<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PenggunaModel;
use App\Models\KelasModel;
use App\Models\PeminjamanModel;
use App\Models\BarangModel;

class BerandaAdminController extends BaseController

{
    private $DataPengguna;
    private $DataKelas;
    private $Datapeminjaman;
    private $Databarang;


    public function __construct(){
        $this->DataPengguna = new PenggunaModel();
        $this->DataKelas = new KelasModel();
        $this->Datapeminjaman = new peminjamanModel();
        $this->Databarang = new barangModel();
        
    }
    public function index()
    {
        $data = [
            'page' => 'Beranda',
            'pengguna'=>$this->DataPengguna->countAllResults(),
            'kelas'=>$this->DataKelas->countAllResults(),
            'peminjaman'=>$this->Datapeminjaman->countAllResults(),
            'barang'=>$this->Databarang->countAllResults(),

        ];



        return view('pages/admin/beranda/beranda_admin', $data);
    }
}

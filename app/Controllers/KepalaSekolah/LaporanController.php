<?php

namespace App\Controllers\KepalaSekolah;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\BarangModel;
use CodeIgniter\Database\ConnectionInterface;

class LaporanController extends BaseController
{
    

    public function index()
    {
        // Menggunakan Database class dari CodeIgniter untuk mengakses database
        $db = \Config\Database::connect();

        // Query untuk menghitung total stok barang per nama_barang
        $query = $db->query('SELECT nama_barang, 
                                    SUM(stok_barang) AS total_stok, 
                                    SUM(CASE WHEN kondisi_barang = "layak" THEN 1 ELSE 0 END) AS total_layak,
                                    SUM(CASE WHEN kondisi_barang = "tidak layak" THEN 1 ELSE 0 END) AS total_tidak_layak,
                                    SUM(CASE WHEN kondisi_barang = "rusak" THEN 1 ELSE 0 END) AS total_rusak
                             FROM barang 
                             GROUP BY nama_barang');
        $data['DataBarang'] = $query->getResultArray();

        $data['page'] = 'Laporan';

        return view('pages/kepala sekolah/laporan/data_laporan', $data);
    }}

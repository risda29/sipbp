<?php

namespace App\Controllers\Staff;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PeminjamanModel;

class KelolaPeminjamanController extends BaseController
{
    private $PeminjamanModel;
    public function __construct()
    {
        $this->PeminjamanModel = new PeminjamanModel();
    }
    public function index()
    {
        $peminjaman = $this->PeminjamanModel
            ->join('pengguna', 'peminjaman.id_pengguna = pengguna.id_pengguna')
            ->join('kelas', 'peminjaman.id_kelas = kelas.id_kelas')
            ->join('barang_peminjaman', 'barang_peminjaman.id_peminjaman = peminjaman.id_peminjaman')
            ->join('barang', 'barang_peminjaman.id_barang = barang.id_barang')
            ->where('peminjaman.status', 'belum-acc')
            ->findAll();


        $groupedPeminjaman = [];
        foreach ($peminjaman as $item) {
            $id_peminjaman = $item['id_peminjaman'];
            if (!isset($groupedPeminjaman[$id_peminjaman])) {
                $groupedPeminjaman[$id_peminjaman] = [
                    'id_peminjaman' => $item['id_peminjaman'],
                    'nama_pengguna' => $item['nama_pengguna'],
                    'nip' => $item['nip'],
                    'tanggal_peminjaman' => $item['tanggal_peminjaman'],
                    'tenggat_peminjaman' => $item['tenggat_peminjaman'],
                    'status' => $item['status'],
                    'barang' => [],
                ];
            }
            $groupedPeminjaman[$id_peminjaman]['barang'][] = [
                'nama_barang' => $item['nama_barang'],
                'kondisi_barang' => $item['kondisi_barang'],
            ];
        }

        $data = [
            'page' => 'Peminjaman',
            'peminjaman' => $groupedPeminjaman
        ];

        return view('pages/staff/kelola_peminjaman/peminjaman', $data);
    }

    public function acc($id){
        $barangPeminjaman = $this->PeminjamanModel->find($id);
        
        $this->PeminjamanModel->update($id,['status' => 'belum-dikembalikan']);

        return redirect()->back()->with('success','peminjaman berhasil di acc');
    }
}



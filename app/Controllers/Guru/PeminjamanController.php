<?php

namespace App\Controllers\Guru;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PeminjamanModel;
use App\Models\KelasModel;
use App\Models\BarangModel;
use App\Models\PenggunaModel;
use App\Models\BarangPeminjamanModel;

class PeminjamanController extends BaseController
{
    private $PeminjamanModel;
    private $KelasModel;
    private $BarangModel;
    private $PenggunaModel;
    private $BarangPeminjamanModel;
    public function __construct()
    {
        $this->PeminjamanModel = new PeminjamanModel();
        $this->BarangModel = new BarangModel();
        $this->KelasModel = new KelasModel();
        $this->PenggunaModel = new PenggunaModel();
        $this->BarangPeminjamanModel = new BarangPeminjamanModel();
    }

    public function index()
{
    $peminjaman = $this->PeminjamanModel
        ->join('pengguna', 'peminjaman.id_pengguna = pengguna.id_pengguna')
        ->join('kelas', 'peminjaman.id_kelas = kelas.id_kelas')
        ->join('barang_peminjaman', 'barang_peminjaman.id_peminjaman = peminjaman.id_peminjaman')
        ->join('barang', 'barang_peminjaman.id_barang = barang.id_barang')
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
            'kode_barang' => $item['kode_barang'],
        ];
    }

    $data = [
        'page' => 'Peminjaman',
        'peminjaman' => $groupedPeminjaman
    ];

    return view('pages/guru/peminjaman/peminjaman_guru', $data);
}


    public function tambah()
    {
        $data = [
            'page' => 'Peminjaman',
            'kelas' => $this->KelasModel->findAll(),
            'barang' => $this->BarangModel->where('stok_barang !=', 0)->where('kondisi_barang !=', 'tidak layak')->where('status_barang !=', 'dipinjam',) ->findAll(),
            'pengguna' => $this->PenggunaModel->where('level =', 'guru')->findAll(),
        ];



        return view('pages/guru/peminjaman/tambah', $data);
    }
    public function simpan()
    {
        // Mengambil inputan dari pengguna
        $inputpeminjaman = $this->request->getVar();
        $inputBarang = $this->request->getVar('id_barang');

        // Menghitung jumlah elemen dalam array
        $jumlahBarang = count($inputBarang);
        
        $idBarang = $this->request->getVar('id_barang');
        
        $dataPeminjaman = [
            'id_pengguna' => $this->request->getVar('id_pengguna'),
            'tanggal_peminjaman' => $this->request->getVar('tanggal_peminjaman'),
            'tenggat_peminjaman' => $this->request->getVar('tenggat_peminjaman'),
            'id_kelas' => $this->request->getVar('id_kelas'),
            'status' => 'belum-acc',
        ];
        
        // Simpan inputan pengguna ke database
        $id_peminjaman = $this->PeminjamanModel->insert($dataPeminjaman);
        
        for ($i = 0; $i < $jumlahBarang; $i++) {
            $data_barang_peminjaman = [
                'id_barang' => $idBarang[$i],
                'id_peminjaman' => $id_peminjaman
            ];
        
            $this->BarangPeminjamanModel->insert($data_barang_peminjaman);
        }
        
        return redirect()->to('/guru/peminjaman');
    }

    public function edit($id_peminjaman)
    {
        $data = [
            'page' => 'edit',
            'peminjaman' => $this->BarangPeminjamanModel->join('peminjaman', 'barang_peminjaman.id_barang_peminjaman = barang_peminjaman.id_barang_peminjaman')->join('pengguna','peminjaman.id_pengguna = pengguna.id_pengguna')->first($id_peminjaman),
            'kelas' => $this->KelasModel->findAll(),
            'barang' => $this->BarangModel->where('stok_barang !=', 0)->findAll(),
            'pengguna' => $this->PenggunaModel->where('level =', 'guru')->findAll(),
        ];

        return view('pages/guru/peminjaman/edit', $data);
    }

    public function hapus($id_peminjaman)
    {
        $this->PeminjamanModel->delete($id_peminjaman);

        return redirect()->to('guru/peminjaman')->with('pesan', 'Data berhasil dihapus');
    }

    public function update($id_peminjaman)
    {
         $inputpeminjaman = $this->request->getVar();
        $inputBarang = $this->request->getVar('id_barang');
        
        $data = [
            'tanggal_peminjaman' => $this->request->getVar('tanggal_peminjaman'),
            'tenggat_peminjaman' => $this->request->getVar('tenggat_peminjaman'),
            'id_kelas' => $this->request->getVar('id_kelas'),
        ];
        $this->PeminjamanModel->update($id_peminjaman, $data);

        return redirect()->to('guru/peminjaman')->with('pesan', 'Data berhasil diupdate');
    }
}

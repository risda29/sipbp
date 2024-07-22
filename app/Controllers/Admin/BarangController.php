<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\BarangModel;


class BarangController extends BaseController
{
    // Membuat model untuk tiap data
    private $BarangModel;

    public function __construct()
    {
        $this->BarangModel = new BarangModel();
    }

    public function index()
    {
        $data = [
            'page' => 'Barang',
            // Mengambil data dan dimasukkan ke data barang
            'barang' => $this->BarangModel->findAll()
        ];

        return view('pages/admin/barang/barang', $data);
    }

    public function simpan()
{
    // Mengambil inputan dari pengguna
    $inputbarang = $this->request->getVar();
    $stok = $inputbarang['stok_barang'];

    // Menghasilkan kode_barang_master berdasarkan jenis barang
    $kodeBarangMaster = $this->generateKodeBarangMaster($inputbarang['jenis_barang']);

    // Loop untuk menyimpan data sesuai dengan jumlah stok
    for ($i = 0; $i < $stok; $i++) {
        // Menghasilkan kode barang berurutan berdasarkan jenis barang dan kode master
        $kodeBarang = $this->generateKodeBarang($kodeBarangMaster);

        // Menyusun data untuk disimpan
        $data = [
            'nama_barang' => $inputbarang['nama_barang'],
            'stok_barang' => 1, // Set stok per item menjadi 1
            'jenis_barang' => $inputbarang['jenis_barang'],
            'kondisi_barang' => $inputbarang['kondisi_barang'],
            'kode_barang' => $kodeBarang, // Menambahkan kode barang yang dihasilkan
            'kode_barang_master' => $kodeBarangMaster, // Menambahkan kode barang master
        ];

        // Simpan inputan pengguna ke database
        $this->BarangModel->insert($data);
    }

    return redirect()->to('/admin/barang');
}

// Fungsi untuk menghasilkan kode_barang_master
private function generateKodeBarangMaster($jenisBarang)
{
    // Mengambil dua huruf pertama dari setiap kata dalam jenis barang
    $words = explode(' ', $jenisBarang);
    $code = '';
    foreach ($words as $word) {
        // Mengambil dua huruf pertama dari setiap kata
        $code .= strtoupper(substr($word, 0, 2));
    }
    return $code;
}

// Fungsi untuk menghasilkan kode_barang yang berurutan
private function generateKodeBarang($kodeBarangMaster)
{
    // Mendapatkan jumlah barang dengan kode_barang_master yang sama
    $barangModel = new \App\Models\BarangModel();
    $count = $barangModel->where('kode_barang_master', $kodeBarangMaster)->countAllResults();

    // Menambahkan 1 untuk mendapatkan nomor urut berikutnya
    $nextNumber = $count + 1;

    // Menghasilkan kode barang dengan format KodeBarangMaster-000X
    return $kodeBarangMaster . '-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
}



    public function tambah()
    {
        $data = [
            'page' => 'Barang'
        ];

        return view('pages/admin/barang/tambah', $data);
    }
    public function edit($id_barang)
    {
        $data = [
            'page' => 'Barang',
            'barang' => $this->BarangModel->find($id_barang),
        ];

        return view('pages/admin/barang/edit', $data);
    }
    public function hapus($id_barang)
    {
        $this->BarangModel->delete($id_barang);

        return redirect()->to('admin/barang')->with('pesan', 'Data berhasil dihapus');
    }
    public function update($id_barang)
    {
        $data = [
            'nama_barang' => $this->request->getPost('nama_barang'),
            'kondisi_barang' => $this->request->getPost('kondisi_barang'),
            'stok_barang' => $this->request->getPost('stok_barang'),
        ];

        $this->BarangModel->update($id_barang, $data);

        return redirect()->to('admin/barang')->with('pesan', 'Data berhasil diupdate');
    }
}

<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

// menghubungkan ke Tabel Kelas
use App\Models\KelasModel;

class KelasController extends BaseController
{
    // Membuat model untuk tiap data
    private $KelasModel;
    public function __construct()
    {
        $this->KelasModel = new KelasModel();
    }

    public function index()
    {
        $data = [
            'page' => 'Kelas',
            // Mengambil data dan dimasukkan ke dala barang
            'kelas' => $this->KelasModel->findAll()
        ];

        return view('pages/admin/kelas/kelas', $data);
    }

    public function tambah()
    {
        $data = [
            'page' => 'Kelas'
        ];

        return view('pages/admin/kelas/tambah', $data);
    }
    public function simpan()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'nama_kelas' => [
                'label' => 'Nama Kelas',
                'rules' => 'required|is_unique[kelas.nama_kelas]',
                'errors' => [
                    'required' => 'Nama kelas harus diisi',
                    'is_unique' => 'Nama kelas sudah ada, silakan pilih nama yang lain'
                ]
            ],
            'jurusan' => [
                'label' => 'Jurusan',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jurusan harus diisi'
                ]
            ],
            'jumlah_siswa' => [
                'label' => 'Jumlah Siswa',
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'Jumlah siswa harus diisi',
                    'integer' => 'Jumlah siswa harus berupa angka'
                ]
            ]
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Jika validasi gagal
            return redirect()->back()->withInput()->with('validation', $validation);
        }


        // Mengambil inputan dari pengguna
        $inputKelas = $this->request->getPost();

        // Simpan inputan pengguna ke database
        $this->KelasModel->insert($inputKelas);

        return redirect()->to('/admin/kelas');
    }

    public function edit($id_kelas)
    {
        $data = [
            'page' => 'edit',
            'kelas' => $this->KelasModel->find($id_kelas)
        ];

        return view('pages/admin/kelas/edit',$data);
    }


    public function hapus($id_kelas)
    {
        $this->KelasModel->delete($id_kelas);

        return redirect()->to('admin/kelas')->with('pesan','Data berhasil dihapus');
    }
    public function update($id_kelas)
    {
        $data = [
            'nama_kelas' => $this->request->getPost('nama_kelas'),
            'jurusan' => $this->request->getPost('jurusan'),
            'jumlah_siswa' => $this->request->getPost('jumlah_siswa'),
        ];


        $this->KelasModel->update($id_kelas,$data);

        return redirect()->to('admin/kelas')->with('pesan','Data berhasil diupdate');
    }
}

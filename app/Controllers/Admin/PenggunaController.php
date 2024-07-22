<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PenggunaModel;

class PenggunaController extends BaseController
{
    private $PenggunaModel;
    public function __construct()
    {
        $this->PenggunaModel = new PenggunaModel();
    }
    public function index()
    {
        $data = [
            'page' => 'Pengguna',
            'pengguna' => $this->PenggunaModel->findAll()
        ];

        return view('pages/admin/pengguna/pengguna', $data);
    }

    public function tambah()
    {


        $data = [
            'page' => 'Pengguna'
        ];

        return view('pages/admin/pengguna/tambah', $data);
    }

    public function simpan()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'nama_pengguna' => [
                'label' => 'Nama Kelas',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama pengguna harus diisi',
                ]
            ],
            'nip' => [
                'label' => 'nip',
                'rules' => 'required|is_unique[pengguna.nip]',
                'errors' => [
                    'required' => 'nip harus diisi',
                    'is_unique' => 'NIP Tidak Tersedia'
                ]
            ],
            'alamat' => [
                'label' => 'alamat',
                'rules' => 'required',
                'errors' => [
                    'required' => 'alamat harus diisi'
                ],
            ],
            'no_hp' => [
                'label' => 'no_hp',
                'rules' => 'required|is_unique[pengguna.no_hp]',
                'errors' => [
                    'required' => 'no_hp',
                      'is_unique' => 'No Handphone Tidak Tersedia',
                    'integer' => 'no_hp harus berupa angka'
                ],
            ],
            'email' => [
                'label' => 'email',
                'rules' => 'required',
                'errors' => [
                    'required' => 'email harus diisi',
                ],
               
            ],
            'level' => [
                'label' => ' level',
                'rules' => 'required',
                'errors' => [
                    'required' => 'level harus diisi',
                    'integer' => 'level harus diisi'
                ],
            ]

        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Jika validasi gagal
            return redirect()->back()->withInput()->with('validation', $validation);
        }
        // Mengambil inputan dari pengguna
        $inputPengguna = $this->request->getPost();

        // Simpan inputan pengguna ke database
        $this->PenggunaModel->insert($inputPengguna);


        return redirect()->to('/admin/pengguna');
    }

    public function edit($id_pengguna)
    {
        
        $data = [
            'page' => 'edit',
            'pengguna' => $this->PenggunaModel->find($id_pengguna)
        ];

        return view('pages/admin/pengguna/edit', $data);
    }

    public function hapus($id_pengguna)
    {
        $this->PenggunaModel->delete($id_pengguna);

        return redirect()->to('admin/pengguna')->with('pesan', 'Data berhasil dihapus');
    }

    public function update($id_pengguna)
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'nama_pengguna' => [
                'label' => 'nama_pengguna',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama pengguna harus diisi',
                ]
            ],
           
            'alamat' => [
                'label' => 'alamat',
                'rules' => 'required',
                'errors' => [
                    'required' => 'alamat harus diisi'
                ],
            ],
          
            'level' => [
                'label' => ' level',
                'rules' => 'required',
                'errors' => [
                    'required' => 'level harus diisi',
                    'integer' => 'level harus diisi'
                ],
            ]

        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Jika validasi gagal
            return redirect()->back()->withInput()->with('validation', $validation);
        }
        $data = [
            'nama_pengguna' => $this->request->getPost('nama_pengguna'),
            'nip' => $this->request->getPost('nip'),
            'email' => $this->request->getPost('email'),
            'no_hp' => $this->request->getPost('no_hp'),
            'alamat' => $this->request->getPost('alamat'),
            'level' => $this->request->getPost('level'),
        ];


        $this->PenggunaModel->update($id_pengguna, $data);

        return redirect()->to('admin/pengguna')->with('pesan', 'Data berhasil diupdate');
    }
}

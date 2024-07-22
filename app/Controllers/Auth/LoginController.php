<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PenggunaModel;
use Config\Database;

class LoginController extends BaseController
{
    private $PenggunaModel;
    public function __construct()
    {
        $this->PenggunaModel = new PenggunaModel();
    }

    public function index()
    {
        return view('pages/auth/login');
    }

    public function submit()
    {
        // Mengambil inputan dari pengguna
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        // Mencari pengguna berdasarkan email
        $pengguna = $this->PenggunaModel->where('email', $email)->first();

        // Jika pengguna ditemukan
        if ($pengguna) {
            // Verifikasi password
            if ($pengguna['password'] == $password) {
                $sessionData = [
                    'id_pengguna' => $pengguna['id_pengguna'],
                    'email' => $pengguna['email'],
                    'logged_in' => true,
                    'level' => $pengguna['level'],
                ];
                session()->set($sessionData);
                // Redirect berdasarkan level pengguna
                switch ($pengguna['level']) {
                    case 'admin':
                        return redirect()->to('admin/beranda');
                        break;
                    case 'guru':
                        return redirect()->to('guru/beranda');
                        break;
                    case 'kepala_sekolah':
                        return redirect()->to('kepala-sekolah/laporan');
                        break;
                    case 'staff':
                        return redirect()->to('staff/beranda');
                        break;
                    default:
                        // Jika level tidak dikenali, redirect ke halaman login
                        return redirect()->to('login')->with('error', 'Level pengguna tidak valid.');
                        break;
                }
            } else {
                // Password tidak cocok
                return redirect()->to('login')->with('error', 'password salah.');
            }
        } else {
            // Pengguna tidak ditemukan
            return redirect()->to('login')->with('error', 'Email tidak ditemukan atau password salah.');
        }
    }

    public function logout()
    {
        // Hapus semua data session
        session()->destroy();

        // Redirect ke halaman login
        return redirect()->to('/login');
    }
}

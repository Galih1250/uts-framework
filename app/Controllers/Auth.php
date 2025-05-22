<?php

namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller {
    
    // Fungsi untuk menampilkan halaman login dan memproses login user
    public function login() {
        helper(['form']); // Load helper untuk form
        if ($this->request->getMethod() === 'post') {
            $model = new UserModel();
            // Cari user berdasarkan username
            $user = $model->where('username', $this->request->getPost('username'))->first();
            // Verifikasi password
            if ($user && password_verify($this->request->getPost('password'), $user['password'])) {
                // Set session jika login berhasil
                session()->set(['user_id' => $user['id'], 'username' => $user['username']]);
                return redirect()->to('/tugas'); // Redirect ke halaman tugas
            }
            // Jika login gagal, kembalikan ke halaman login dengan pesan error
            return redirect()->back()->with('error', 'Login gagal');
        }
        // Tampilkan view login
        return view('auth/login');
    }

    // Fungsi untuk menampilkan halaman register dan menyimpan data user baru
    public function register() {
        helper(['form']); // Load helper untuk form
        if ($this->request->getMethod() === 'post') {
            $model = new UserModel();
            // Ambil data dari input dan hash password
            $data = [
                'username' => $this->request->getPost('username'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            ];
            $model->insert($data); // Simpan data ke database
            return redirect()->to('/login'); // Redirect ke halaman login
        }
        // Tampilkan view register
        return view('auth/register');
    }

    // Fungsi untuk logout user
    public function logout() {
        session()->destroy(); // Hapus semua data session
        return redirect()->to('/login'); // Redirect ke halaman login
    }
}


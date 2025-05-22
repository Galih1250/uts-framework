<?php
namespace App\Controllers;
use App\Models\TugasModel;
use CodeIgniter\Controller;

class Tugas extends Controller {

    // Fungsi untuk menampilkan semua tugas milik user yang sedang login
    public function index() {
        $model = new TugasModel();
        // Ambil semua data tugas berdasarkan user_id dari session
        $data['tugas'] = $model->where('user_id', session()->get('user_id'))->findAll();
        return view('tugas/index', $data); // Tampilkan view daftar tugas
    }

    // Fungsi untuk menambahkan tugas baru
    public function tambah() {
        if ($this->request->getMethod() === 'post') {
            $model = new TugasModel();
            // Simpan data tugas baru
            $model->save([
                'judul' => $this->request->getPost('judul'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'deadline' => $this->request->getPost('deadline'),
                'status' => $this->request->getPost('status'),
                'user_id' => session()->get('user_id'),
            ]);
            return redirect()->to('/tugas'); // Redirect ke halaman daftar tugas
        }
        return view('tugas/tambah'); // Tampilkan form tambah tugas
    }

    // Fungsi untuk mengedit data tugas berdasarkan ID
    public function edit($id) {
        $model = new TugasModel();
        if ($this->request->getMethod() === 'post') {
            // Update data tugas
            $model->update($id, [
                'judul' => $this->request->getPost('judul'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'deadline' => $this->request->getPost('deadline'),
                'status' => $this->request->getPost('status'),
            ]);
            return redirect()->to('/tugas'); // Redirect ke halaman daftar tugas
        }
        // Ambil data tugas untuk ditampilkan di form edit
        $data['tugas'] = $model->find($id);
        return view('tugas/edit', $data); // Tampilkan form edit tugas
    }

    // Fungsi untuk menghapus tugas berdasarkan ID
    public function hapus($id) {
        $model = new TugasModel();
        $model->delete($id); // Hapus data tugas
        return redirect()->to('/tugas'); // Redirect ke halaman daftar tugas
    }
}

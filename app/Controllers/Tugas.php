<?php
namespace App\Controllers;

use App\Models\TugasModel;
use CodeIgniter\Controller; 

class Tugas extends Controller
{
   public function index()
{
    $model = new TugasModel();
    // Ambil semua tugas tanpa filter user_id
    $data['tugas'] = $model->orderBy('id', 'DESC')->findAll();

    return view('tugas/index', $data);
}

public function tambah()
{
    if ($this->request->getMethod() === 'post') {
        $data = [
            'judul'     => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'deadline'  => $this->request->getPost('deadline'),
            'status'    => $this->request->getPost('status'),
        ];

        // Tampilkan isi POST untuk verifikasi
        dd($data);
    }

    return view('tugas/tambah');
}


public function edit($id = null)
{
    $model = new TugasModel();

    if ($this->request->getMethod() === 'post') {
        $data = [
            'judul'     => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'deadline'  => $this->request->getPost('deadline'),
            'status'    => $this->request->getPost('status'),
            // user_id dihilangkan
        ];

        if (!$model->update($id, $data)) {
            dd($model->errors());
        }

        return redirect()->to('/tugas');
    }

    // Ambil tugas berdasarkan id saja tanpa filter user_id
    $data['tugas'] = $model->find($id);
    if (!$data['tugas']) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Tugas tidak ditemukan.');
    }

    return view('tugas/edit', $data);
}

public function hapus($id)
{
    $model = new TugasModel();
    $model->delete($id);
    return redirect()->to('/tugas');
}
}
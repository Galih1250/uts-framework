<!DOCTYPE html>
<html>
<head>
    <title>Tambah Tugas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Tambah Tugas</h2>
    <form method="post" action="/tugas/tambah">
        <div class="form-group">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label>Deadline</label>
            <input type="date" name="deadline" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="Belum Selesai">Belum Selesai</option>
                <option value="Selesai">Selesai</option>
            </select>
        </div>
        <button class="btn btn-success">Simpan</button>
        <a href="/tugas" class="btn btn-secondary">Kembali</a>
    </form>
</body>
</html>
    
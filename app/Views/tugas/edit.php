<!DOCTYPE html>
<html>
<head>
    <title>Edit Tugas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Edit Tugas</h2>
    <form method="post" action="/tugas/edit/<?= $tugas['id'] ?>">
        <div class="form-group">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="<?= esc($tugas['judul']) ?>" required>
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" required><?= esc($tugas['deskripsi']) ?></textarea>
        </div>
        <div class="form-group">
            <label>Deadline</label>
            <input type="date" name="deadline" class="form-control" value="<?= esc($tugas['deadline']) ?>" required>
        </div>
        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="Belum Selesai" <?= $tugas['status'] === 'Belum Selesai' ? 'selected' : '' ?>>Belum Selesai</option>
                <option value="Selesai" <?= $tugas['status'] === 'Selesai' ? 'selected' : '' ?>>Selesai</option>
            </select>
        </div>
        <button class="btn btn-primary">Update</button>
        <a href="/tugas" class="btn btn-secondary">Kembali</a>
    </form>
</body>
</html>

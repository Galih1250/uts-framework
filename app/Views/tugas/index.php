<!DOCTYPE html>
<html>
<head>
    <title>Daftar Tugas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Daftar Tugas</h2>
    <a href="/logout" class="btn btn-secondary mb-3 float-right">Logout</a>
    <a href="/tugas/tambah" class="btn btn-primary mb-3">+ Tambah Tugas</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Deadline</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($tugas)) : ?>
                <?php foreach ($tugas as $item): ?>
                    <tr>
                        <td><?= esc($item['judul']) ?></td>
                        <td><?= esc($item['deskripsi']) ?></td>
                        <td><?= esc($item['deadline']) ?></td>
                        <td><?= esc($item['status']) ?></td>
                        <td>
                            <a href="/tugas/edit/<?= $item['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="/tugas/hapus/<?= $item['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr><td colspan="5" class="text-center">Belum ada tugas.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>

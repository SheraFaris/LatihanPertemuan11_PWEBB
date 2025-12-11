<?php
include 'header.php';

// ambil data status MASUK
$sql = "SELECT * FROM laundry WHERE status='MASUK' ORDER BY id DESC";
$result = mysqli_query($koneksi, $sql);
?>

<div class="d-flex justify-content-between align-items-center mb-2">
    <h4>Laundry Masuk</h4>
    <a href="laundry_form.php?mode=masuk" class="btn btn-primary btn-sm">+ Tambah</a>
</div>

<table class="table table-bordered table-sm bg-white">
    <thead>
    <tr>
        <th>No</th><th>Kode</th><th>Pelanggan</th>
        <th>Tgl Masuk</th><th>Berat (Kg)</th><th>Total</th><th>Aksi</th>
    </tr>
    </thead>
    <tbody>
    <?php $no=1; while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= htmlspecialchars($row['kode']); ?></td>
            <td><?= htmlspecialchars($row['nama_pelanggan']); ?></td>
            <td><?= $row['tanggal_masuk']; ?></td>
            <td><?= $row['berat_kg']; ?></td>
            <td><?= number_format($row['total']); ?></td>
            <td>
                <a href="laundry_form.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="laundry_hapus.php?id=<?= $row['id']; ?>"
                   onclick="return confirm('Hapus data ini?');"
                   class="btn btn-danger btn-sm">Hapus</a>
            </td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>

<?php include 'footer.php'; ?>

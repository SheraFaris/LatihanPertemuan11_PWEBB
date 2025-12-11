<?php
include 'header.php';

$id   = $_GET['id'] ?? null;
$mode = $_GET['mode'] ?? null; // 'masuk' atau 'keluar'

$data = [
    'kode'           => '',
    'nama_pelanggan' => '',
    'tanggal_masuk'  => date('Y-m-d'),
    'tanggal_keluar' => date('Y-m-d'),
    'berat_kg'       => 0,
    'harga_per_kg'   => 5000,
    'status'         => 'MASUK'
];

if ($id) {
    $q = mysqli_query($koneksi, "SELECT * FROM laundry WHERE id=".(int)$id);
    $data = mysqli_fetch_assoc($q);
} else {
    if ($mode == 'keluar') $data['status'] = 'KELUAR';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $kode  = $_POST['kode'];
    $nama  = $_POST['nama_pelanggan'];
    $tm    = $_POST['tanggal_masuk'];
    $tk    = $_POST['tanggal_keluar'] ?: null;
    $berat = (float)$_POST['berat_kg'];
    $harga = (int)$_POST['harga_per_kg'];
    $status= $_POST['status'];

    $total = $berat * $harga;

    if ($id) {
        $sql = "UPDATE laundry SET kode='$kode', nama_pelanggan='$nama',
                tanggal_masuk='$tm', tanggal_keluar=" . ($tk ? "'$tk'" : "NULL") . ",
                berat_kg=$berat, harga_per_kg=$harga, total=$total, status='$status'
                WHERE id=$id";
    } else {
        $cols = "kode,nama_pelanggan,tanggal_masuk,tanggal_keluar,berat_kg,harga_per_kg,total,status";
        $vals = "'$kode','$nama','$tm'," . ($tk ? "'$tk'" : "NULL") .
                ",$berat,$harga,$total,'$status'";
        $sql = "INSERT INTO laundry ($cols) VALUES ($vals)";
    }

    mysqli_query($koneksi, $sql);

    if ($status == 'KELUAR') header("Location: laundry_keluar.php");
    else header("Location: laundry_masuk.php");
    exit;
}
?>

<h4><?= $id ? 'Edit' : 'Tambah'; ?> Data Laundry</h4>

<form method="post" class="bg-white p-3 border rounded" style="max-width:600px;">
    <input type="hidden" name="id" value="<?= $data['id'] ?? ''; ?>">

    <div class="mb-2">
        <label class="form-label">Kode Transaksi</label>
        <input type="text" name="kode" class="form-control"
               value="<?= htmlspecialchars($data['kode']); ?>" required>
    </div>
    <div class="mb-2">
        <label class="form-label">Nama Pelanggan</label>
        <input type="text" name="nama_pelanggan" class="form-control"
               value="<?= htmlspecialchars($data['nama_pelanggan']); ?>" required>
    </div>
    <div class="mb-2">
        <label class="form-label">Tanggal Masuk</label>
        <input type="date" name="tanggal_masuk" class="form-control"
               value="<?= $data['tanggal_masuk']; ?>" required>
    </div>
    <div class="mb-2">
        <label class="form-label">Tanggal Keluar</label>
        <input type="date" name="tanggal_keluar" class="form-control"
               value="<?= $data['tanggal_keluar']; ?>">
        <small class="text-muted">Boleh kosong untuk laundry MASUK.</small>
    </div>
    <div class="mb-2">
        <label class="form-label">Berat (kg)</label>
        <input type="number" step="0.1" name="berat_kg" class="form-control"
               value="<?= $data['berat_kg']; ?>" required>
    </div>
    <div class="mb-2">
        <label class="form-label">Harga per Kg</label>
        <input type="number" name="harga_per_kg" class="form-control"
               value="<?= $data['harga_per_kg']; ?>" required>
    </div>
    <div class="mb-2">
        <label class="form-label">Status</label>
        <select name="status" class="form-select">
            <option value="MASUK" <?= $data['status']=='MASUK'?'selected':''; ?>>MASUK</option>
            <option value="KELUAR" <?= $data['status']=='KELUAR'?'selected':''; ?>>KELUAR</option>
        </select>
    </div>
    <button class="btn btn-primary">Simpan</button>
</form>

<?php include 'footer.php'; ?>

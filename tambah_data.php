<?php
include 'koneksi.php';

// Ambil data yang dikirim melalui form
$tanggalReservasi = $_POST['tanggal_reservasi'];
$untukTanggalJam = $_POST['untuk_tanggal'];
$nama = $_POST['nama'];
$nomorTelepon = $_POST['nomor_telepon'];
$nomorMeja = $_POST['nomor_meja'];
$jumlahTamu = $_POST['jumlah_tamu'];
$statusPembayaran = $_POST['status_pembayaran'];

// Periksa apakah ada data yang kosong
if(empty($tanggalReservasi) || empty($untukTanggalJam) || empty($nama) || empty($nomorTelepon) || empty($nomorMeja) || empty($jumlahTamu) || empty($statusPembayaran)) {
    // Jika ada data yang kosong, tampilkan pesan error dan redirect ke halaman tambah
    echo '<script>alert("Silakan lengkapi semua kolom.");</script>';
    echo '<script>window.location.href = "dashboard.php";</script>';
    exit; // Menghentikan eksekusi skrip selanjutnya
}

// Query SQL untuk menambahkan data
$sql = "INSERT INTO reservasi (`Tanggal Reservasi`, `Untuk Tanggal/Jam`, `Nama`, `Nomor Telepon`, `Nomor Meja`, `Jumlah Tamu`, `Status Pembayaran`) 
        VALUES ('$tanggalReservasi', '$untukTanggalJam', '$nama', '$nomorTelepon', '$nomorMeja', '$jumlahTamu', '$statusPembayaran')";

if (mysqli_query($conn, $sql)) {
    // Data berhasil disimpan, tampilkan alert
    echo '<script>alert("Data berhasil ditambahkan ke database.");</script>';
    // Redirect kembali ke halaman dashboard
    echo '<script>window.location.href = "dashboard.php";</script>';
} else {
    // Jika query gagal dijalankan, tampilkan pesan error
    echo "Gagal menambahkan data ke database: " . mysqli_error($conn);
    // Redirect kembali ke halaman tambah
    echo '<script>window.location.href = "dashboard.php";</script>';
}

$conn->close();
?>

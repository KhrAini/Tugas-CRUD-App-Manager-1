<?php
// Sertakan file koneksi database
include 'koneksi.php';

// Periksa apakah parameter ID telah diterima dari formulir
if(isset($_POST['id'])) 
    // Tangkap nilai ID dari formulir
    $id = $_POST['id'];

    // Tangkap nilai lainnya dari formulir
    $tanggal_reservasi = $_POST['tanggal_reservasi'];
    $untuk_tanggalJam = $_POST['untuk_tanggalJam'];
    $nama = $_POST['nama'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $nomor_meja = $_POST['nomor_meja'];
    $jumlah_tamu = $_POST['jumlah_tamu'];
    $status_pembayaran = $_POST['status_pembayaran'];

    // Lanjutkan dengan proses pengeditan data
    // Misalnya, update data di database
    $sql = "UPDATE reservasi SET 
            `Tanggal Reservasi` = '$tanggal_reservasi', 
            `Untuk Tanggal/Jam` = '$untuk_tanggalJam', 
            `Nama` = '$nama', 
            `Nomor Telepon` = '$nomor_telepon', 
            `Nomor Meja` = '$nomor_meja', 
            `Jumlah Tamu` = '$jumlah_tamu', 
            `Status Pembayaran` = '$status_pembayaran' 
            WHERE id = $id";

    // Eksekusi query SQL
    if (mysqli_query($conn, $sql)) {
        // Data berhasil diperbarui
        echo '<script>alert("Data berhasil diperbarui.");</script>';
        // Redirect kembali ke halaman dashboard atau halaman detail data yang diubah
        echo '<script>window.location.href = "dataReservasi.php";</script>';
    } else {
        // Penanganan kesalahan jika query gagal dieksekusi
        echo "Gagal memperbarui data: " . mysqli_error($conn);
    }
    
?>
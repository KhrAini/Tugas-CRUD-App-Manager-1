<?php
include 'koneksi.php';

// Periksa apakah parameter ID telah diterima dari URL
if(isset($_GET['id'])) {
    // Escape untuk mencegah SQL injection
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // Query SQL untuk menghapus data berdasarkan ID
    $sql = "DELETE FROM reservasi WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        // Redirect kembali ke halaman data reservasi setelah penghapusan
        header("Location: dataReservasi.php");
        exit(); // Pastikan untuk keluar setelah melakukan redirect
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    // Jika parameter ID tidak d
}
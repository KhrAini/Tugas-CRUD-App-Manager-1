<?php
include 'koneksi.php';

// Query SQL untuk mengambil data
$sql = "SELECT * FROM reservasi";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data dari setiap baris
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. "<br>"; // Menampilkan ID
        echo "Tanggal Reservasi: " . $row["Tanggal Reservasi"]. "<br>";
        echo "Untuk Tanggal/Jam: " . $row["Untuk Tanggal/Jam"]. "<br>";
        echo "Nama: " . $row["Nama"]. "<br>";
        echo "Nomor Telepon: " . $row["Nomor Telepon"]. "<br>";
        echo "Nomor Meja: " . $row["Nomor Meja"]. "<br>";
        echo "Jumlah Tamu: " . $row["Jumlah Tamu"]. "<br>";
        echo "Status Pembayaran: " . $row["Status Pembayaran"]. "<br><hr>";
    }
} else {
    echo "0 hasil";
}
$conn->close();
?>

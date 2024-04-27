<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Reservation - Data Reservasi</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="halaman2">
        <div class="sidebar">
            <h1><img src="icon.png" ></h1>
            <h2>My Account</h2>
            <ul>
                <li ><a href="dashboard.php">Dasboard</a></li>
                <li ><a href="dataReservasi.php">Reservation</a></li>
            </ul>
            <form>
                <button type="submit">Logout</button>
            </form>        
        </div>
        <div class="judulData">
            <h1>Data Reservasi</ h1>
        </div>
        <div class="reservation">
            <table>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Tanggal Reservasi</th>
                        <th>Untuk Tanggal/Jam</th>
                        <th>Nama</th>
                        <th>Nomor Telepon</th>
                        <th>Nomor Meja</th>
                        <th>Jumlah Tamu</th>
                        <th>Status Pembayaran</th>
                        <th><a>Aksi<a></th> <!-- Kolom untuk tombol Edit dan Hapus -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'koneksi.php';

                    // Query SQL untuk mengambil data
                    $sql = "SELECT * FROM reservasi";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Output data dari setiap baris
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["Tanggal Reservasi"] . "</td>";
                            echo "<td>" . $row["Untuk Tanggal/Jam"] . "</td>";
                            echo "<td>" . $row["Nama"] . "</td>";
                            echo "<td>" . $row["Nomor Telepon"] . "</td>";
                            echo "<td>" . $row["Nomor Meja"] . "</td>";
                            echo "<td>" . $row["Jumlah Tamu"] . "</td>";
                            echo "<td>" . $row["Status Pembayaran"] . "</td>";
                            echo "<td><button><a href='edit_data.php?id=" . $row["id"] . "'>Edit</a> | <a href='hapus_data.php?id=" . $row["id"] . "'>Hapus</a></button></td>"; 
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>Tidak ada data</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

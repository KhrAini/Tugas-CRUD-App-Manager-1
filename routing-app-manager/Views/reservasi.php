<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Reservation - Data Reservasi</title>
    <link rel="stylesheet" href="<?= BASEURL ?>/assets/css/styles.css">
</head>

<body>
    <div class="halaman2">
        <div class="sidebar">
            <h1><img src="<?= BASEURL ?>/assets/img/icon.png"></h1>
            <h2>My Account</h2>
            <ul>
                <li class="b"><a href="<?= urlpath('dashboard');?>">Dashboard</a></li>
                <li class="c"><a href="<?= urlpath('dataReservasi');?>">Reservation</a></li>
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

                    if ($result->num_rows > 0) {
                        $count = 1; 
                        // Output data dari setiap baris
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>".$count."</td>"; 
                            echo "<td>" . $row["Tanggal Reservasi"] . "</td>";
                            echo "<td>" . $row["Untuk Tanggal"] . "</td>";
                            echo "<td>" . $row["Nama"] . "</td>";
                            echo "<td>" . $row["Nomor Telepon"] . "</td>";
                            echo "<td>" . $row["Nomor Meja"] . "</td>";
                            echo "<td>" . $row["Jumlah Tamu"] . "</td>";
                            echo "<td>" . $row["Status Pembayaran"] . "</td>";
                            echo "<td><button><a href='" . urlpath('editReservasi') . "?id=" . $row["id"] . "' class='abutton'>Edit</a> | <a href='" . urlpath('deleteData') . "?id=" . $row["id"] . "' class='abutton' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")' >Hapus</a></button></td>"; 
                            echo "</tr>";
                            $count++; 
                        }
                    } else {
                        echo "<tr><td colspan='8'>Tidak ada data</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
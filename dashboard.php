<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Reservation - Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
        <div class="halaman2">
        <div class="sidebar">
            <h1><img src="icon.png" ></h1>
            <h2>My Account</h2>
            <ul>
                <li class="b"><a href="dashboard.php">Dashboard</a></li>
                <li class="c"><a href="dataReservasi.php">Reservation</a></li>
            </ul>
            <form>
                <button type="submit">Logout</button>
            </form>
              
        </div>
    
        <div class="dashboard" >
            <h1>Restaurant Reservation</h1>
    
            <div class="reservation">
                <h2>Reservations</h2>

                <form action="tambah_data.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <label for="tanggal_reservasi">Tanggal Reservasi:</label><br>
                    <input type="date" id="tanggal_reservasi" name="tanggal_reservasi"><br>

                    <label for="Untuk Tanggal">Untuk Tanggal/Jam</label><br>
                    <input type="date" id="untuk_tanggal" name="untuk_tanggal"><br>

                    <label for="nama">Nama:</label><br>
                    <input type="text" id="nama" name="nama"><br>

                    <label for="nomor_telepon">Nomor Telepon:</label><br>
                    <input type="tel" id="nomor_telepon" name="nomor_telepon"><br>

                    <label for="nomor_meja">Nomor Meja:</label><br>
                    <input type="text" id="nomor_meja" name="nomor_meja"><br>

                    <label for="jumlah_tamu">Jumlah Tamu:</label><br>
                    <input type="number" id="jumlah_tamu" name="jumlah_tamu"><br>

                    <label for="status_pembayaran">Status Pembayaran:</label><br>
                    <select id="status_pembayaran" name="status_pembayaran">
                        <option value="paid">Paid</option>
                        <option value="unpaid">Unpaid</option>
                    </select><br><br>

    <button type="submit">Submit</button>
</form>

                <!-- <button>Edit</button>
                <button>Delete</button> -->
            </div>
    
        </div>
    </div>




</body>
</html>

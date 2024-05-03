<?php $row = $result->fetch_assoc(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Reservasi</title>
    <link rel="stylesheet" href="<?= BASEURL ?>/assets/css/styles.css">
</head>

<body class="reservation">
    <h2>Edit Data Reservasi</h2>
    <form action="<?= urlpath('editReservasiUpdate') ?>" method="POST">
        <label for="tanggal_reservasi">Tanggal Reservasi:</label><br>
        <input type="date" id="tanggal_reservasi" name="tanggal_reservasi" value="<?= $row['Tanggal Reservasi'] ?>"><br>

        <label for="untuk_tanggalJam">Untuk Tanggal/Jam:</label><br>
        <input type="date" id="untuk_tanggalJam" name="untuk_tanggalJam" value="<?= $row['Untuk Tanggal'] ?>"><br>

        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" value="<?= $row['Nama'] ?>"><br>

        <label for="nomor_telepon">Nomor Telepon:</label><br>
        <input type="tel" id="nomor_telepon" name="nomor_telepon" value="<?= $row['Nomor Telepon'] ?>"><br>

        <label for="nomor_meja">Nomor Meja:</label><br>
        <input type="text" id="nomor_meja" name="nomor_meja" value="<?= $row['Nomor Meja'] ?>"><br>

        <label for="jumlah_tamu">Jumlah Tamu:</label><br>
        <input type="number" id="jumlah_tamu" name="jumlah_tamu" value="<?= $row['Jumlah Tamu'] ?>"><br>

        <label for="status_pembayaran">Status Pembayaran:</label><br>
        <select id="status_pembayaran" name="status_pembayaran">
            <option value="paid" <?= ($row['Status Pembayaran'] == 'paid') ? 'selected' : '' ?>>Paid</option>
            <option value="unpaid" <?= ($row['Status Pembayaran'] == 'unpaid') ? 'selected' : '' ?>>Unpaid</option>
        </select><br><br>

        <input type="hidden" name="id" value="<?= $id ?>">
        <button type="submit">Simpan Perubahan</button>
    </form>
</body>

</html>
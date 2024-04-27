<?php
include 'koneksi.php';

// Periksa apakah parameter ID telah diterima dari URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query SQL untuk mengambil data berdasarkan ID
    $sql = "SELECT * FROM reservasi WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Data ditemukan, tampilkan formulir edit
        $row = $result->fetch_assoc();
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Data Reservasi</title>
            <link rel="stylesheet" href="styles.css">
        </head>
        <body class="reservation">
            <h2>Edit Data Reservasi</h2>
            <form action="proses_edit_data.php" method="post">
               <input type="hidden" name="id" value="<?php echo $id; ?>">

                <label for="tanggal_reservasi">Tanggal Reservasi:</label><br>
                <input type="date" id="tanggal_reservasi" name="tanggal_reservasi" value="<?php echo $row['Tanggal Reservasi']; ?>"><br>

                <label for="untuk_tanggalJam">Untuk Tanggal/Jam:</label><br>
                <input type="datetime-local" id="untuk_tanggalJam" name="untuk_tanggalJam" value="<?php echo $row['Untuk Tanggal/Jam']; ?>"><br>

                <label for="nama">Nama:</label><br>
                <input type="text" id="nama" name="nama" value="<?php echo $row['Nama']; ?>"><br>

                <label for="nomor_telepon">Nomor Telepon:</label><br>
                <input type="tel" id="nomor_telepon" name="nomor_telepon"  value="<?php echo $row['Nomor Telepon']; ?>"><br>

                <label for="nomor_meja">Nomor Meja:</label><br>
                <input type="text" id="nomor_meja" name="nomor_meja" value="<?php echo $row['Nomor Meja']; ?>"><br>

                <label for="jumlah_tamu">Jumlah Tamu:</label><br>
                <input type="number" id="jumlah_tamu" name="jumlah_tamu" value="<?php echo $row['Jumlah Tamu']; ?>"><br>

                <label for="status_pembayaran">Status Pembayaran:</label><br>
                <select id="status_pembayaran" name="status_pembayaran">
                    <option value="paid" <?php if($row['Status Pembayaran'] == 'paid') echo 'selected'; ?>>Paid</option>
                    <option value="unpaid" <?php if($row['Status Pembayaran'] == 'unpaid') echo 'selected'; ?>>Unpaid</option>
                </select><br><br>

                <button type="submit">Simpan Perubahan</button>
            </form>
        </body>
        </html>
        <?php
    } else {
        // Data tidak ditemukan
        echo "Data tidak ditemukan.";
    }
} else {
    // Jika tidak ada parameter ID
    echo "ID tidak ditemukan.";
}
$conn->close();
?>

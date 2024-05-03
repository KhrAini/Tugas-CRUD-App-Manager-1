<?php

include_once 'Models/dashboard_model.php';

class dashboardController {

    static function index() {
        return view('dashboard');
    }

    static function reservasi() {
        $data = dashboardModel::getAll();
        return view('reservasi', ['result' => $data]);
    }

    static function tambahData() {
        if (isset($_POST['tanggal_reservasi'], $_POST['untuk_tanggal'], $_POST['nama'], $_POST['nomor_telepon'], $_POST['nomor_meja'], $_POST['jumlah_tamu'], $_POST['status_pembayaran'])) {
            $tanggalReservasi = $_POST['tanggal_reservasi'];
            $untukTanggalJam = $_POST['untuk_tanggal'];
            $nama = $_POST['nama'];
            $nomorTelepon = $_POST['nomor_telepon'];
            $nomorMeja = $_POST['nomor_meja'];
            $jumlahTamu = $_POST['jumlah_tamu'];
            $statusPembayaran = $_POST['status_pembayaran'];

            if (empty($tanggalReservasi) || empty($untukTanggalJam) || empty($nama) || empty($nomorTelepon) || empty($nomorMeja) || empty($jumlahTamu) || empty($statusPembayaran)) {
                echo '<script>alert("Silakan lengkapi semua kolom.");</script>';
                echo '<script>window.location.href = "dashboard.php";</script>';
                exit;
            }

            $result = dashboardModel::tambahReservasi($tanggalReservasi, $untukTanggalJam, $nama, $nomorTelepon, $nomorMeja, $jumlahTamu, $statusPembayaran);
            if ($result) {
                echo '<script>alert("Data berhasil ditambahkan.");</script>';
            } else {
                echo '<script>alert("GAGAL.");</script>';
            }
        }
        $data = dashboardModel::getAll();
        return view('reservasi', ['result' => $data]);
    }

    static function editReservasi() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $data = dashboardModel::getByid($id);
            return view('crudViews/edit', ['result' => $data,'id'=> $id]);
        }
    }

    static function editReservasiUpdate() {
        if (isset($_POST)) {
            $id = $_POST['id'];

            // Tangkap nilai lainnya dari formulir
            $tanggal_reservasi = $_POST['tanggal_reservasi'];
            $untuk_tanggalJam = $_POST['untuk_tanggalJam'];
            $nama = $_POST['nama'];
            $nomor_telepon = $_POST['nomor_telepon'];
            $nomor_meja = $_POST['nomor_meja'];
            $jumlah_tamu = $_POST['jumlah_tamu'];
            $status_pembayaran = $_POST['status_pembayaran'];
            $success = dashboardModel::updateReservasi($id,$tanggal_reservasi, $untuk_tanggalJam, $nama,$nomor_telepon,$nomor_meja, $jumlah_tamu , $status_pembayaran);

            if($success) {
                echo '<script>alert("Data berhasil ditambahkan.");</script>';

                $data = dashboardModel::getAll();
                return view('reservasi', ['result' => $data]);       
            } else {
                echo "Gagal menyimpan data. Silakan coba lagi.";
            }

            
        }
    }

    static function deleteData() {
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $success = dashboardModel::deleteDataByid($id);
            if ($success) {
                echo '<script>alert("Data berhasil dihapus.");</script>';
            } else {
                echo '<script>alert("GAGAL.");</script>';
            }
        }
        $data = dashboardModel::getAll();
        return view('reservasi', ['result' => $data]);
    }
}
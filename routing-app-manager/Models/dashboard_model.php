<?php 
include_once 'config/conn.php';

class dashboardModel {


    static function getAll(){
        global $conn;
        $conn->begin_transaction();
        $stmt = $conn->prepare("SELECT * FROM reservasi");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    static function getByid($id){
        global $conn;
        $conn->begin_transaction();
        $stmt = $conn->prepare("SELECT * FROM reservasi WHERE id = $id");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    static function tambahReservasi($tanggalReservasi, $untukTanggalJam, $nama, $nomorTelepon, $nomorMeja, $jumlahTamu, $statusPembayaran) {
        global $conn;
        try {
            $conn->begin_transaction();
            
            // Prepare the statement with placeholders
            $stmt = $conn->prepare("INSERT INTO reservasi (`Tanggal Reservasi`, `Untuk Tanggal`, `Nama`, `Nomor Telepon`, `Nomor Meja`, `Jumlah Tamu`, `Status Pembayaran`) 
            VALUES (?, ?, ?, ?, ?, ?, ?)");
            
            // Bind parameters
            $stmt->bind_param("ssssiii", $tanggalReservasi, $untukTanggalJam, $nama, $nomorTelepon, $nomorMeja, $jumlahTamu, $statusPembayaran);
            
            // Execute the statement
            $stmt->execute();
            
            // Commit the transaction
            $conn->commit();
            
            return true;
        } catch (Exception $e) {
            // Rollback the transaction on error
            $conn->rollback();
            // Log or handle the error appropriately
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    static function deleteDataByid($id){
        global $conn;
        $stmt = $conn->prepare("DELETE FROM reservasi WHERE id=?");
        $stmt->bind_param("i", $id);
        
        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }


    static function updateReservasi($id, $tanggal_reservasi, $untuk_tanggalJam, $nama, $nomor_telepon, $nomor_meja, $jumlah_tamu, $status_pembayaran) {
        global $conn;
        $stmt = $conn->prepare("UPDATE reservasi SET 
            `Tanggal Reservasi` = ?, 
            `Untuk Tanggal` = ?, 
            `Nama` = ?, 
            `Nomor Telepon` = ?, 
            `Nomor Meja` = ?, 
            `Jumlah Tamu` = ?, 
            `Status Pembayaran` = ? 
            WHERE id = ?");
        $stmt->bind_param("sssssssi", $tanggal_reservasi, $untuk_tanggalJam, $nama, $nomor_telepon, $nomor_meja, $jumlah_tamu, $status_pembayaran, $id);
        
        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }
    
    

    

}
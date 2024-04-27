<?php
$servername = "localhost";
$database = "reservasi resto";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Koneksi Gagal : " . $conn->connect_error);
} else {
    echo "";
}

?>
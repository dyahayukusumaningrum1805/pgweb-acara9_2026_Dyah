<?php
$id = $_POST['id'];
$kecamatan = $_POST['kecamatan'];
$nama_bank = $_POST['nama_bank'];
$alamat = $_POST['alamat'];
$jml = $_POST['jumlah'];
$lat = $_POST['latitude'];
$long = $_POST['longitude'];

// Sesuaikan dengan setting MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "biopori";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE `sebaran biopori` SET 
        kecamatan='$kecamatan', 
        `nama bank`='$nama_bank', 
        alamat='$alamat', 
        jumlah=$jml, 
        latitude=$lat,
        longitude=$long 
        WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Record edited successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("Location: ../index.php");
?>
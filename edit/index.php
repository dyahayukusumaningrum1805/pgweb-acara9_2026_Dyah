<!DOCTYPE html>
<html>
<body>
<h2>Form Edit</h2>
<?php
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

$id = $_GET['id'];
$sql = "SELECT * FROM `sebaran biopori` WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<form action='edit.php' method='post'>";
        echo "<input type='hidden' name='id' value='".$row['id']."'><br>";
        
        echo "<label>Kecamatan: </label><br>";
        echo "<input type='text' name='kecamatan' value='".$row['kecamatan']."'><br>";
        
        echo "<label>Nama Bank: </label><br>";
        echo "<input type='text' name='nama_bank' value='".$row['nama bank']."'><br>";
        
        echo "<label>Alamat: </label><br>";
        echo "<input type='text' name='alamat' value='".$row['alamat']."'><br>";
        
        echo "<label>Jumlah: </label><br>";
        echo "<input type='text' name='jumlah' value='".$row['jumlah']."'><br>";
        
        echo "<label>Latitude: </label><br>";
        echo "<input type='text' name='latitude' value='".$row['latitude']."'><br>";
        
        echo "<label>Longitude: </label><br>";
        echo "<input type='text' name='longitude' value='".$row['longitude']."'><br><br>";
        
        echo "<input type='submit' value='Submit'>";
        echo "</form>";
    }
} else {
    echo "Data tidak ditemukan.";
}
$conn->close();
?>
</body>
</html>
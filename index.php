<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "biopori";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM `sebaran biopori`";
$result = $conn->query($sql);

echo "<h1>Sebaran Lokasi Biopori</h1>";

echo "<a href='input/index.html'>Tambahkan</a>";
if ($result->num_rows > 0) {
    echo "<table border='1px'><tr>
            <th>Kecamatan</th>
            <th>Nama Bank</th>
            <th>Alamat</th>
            <th>Jumlah</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th colspan='2'>Aksi</th>
        </tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["kecamatan"]."</td>".
                "<td>".$row["nama bank"]."</td>".
                "<td>".$row["alamat"]."</td>".
                "<td align='right'>".$row["jumlah"]."</td>".
                "<td align='right'>".$row["latitude"]."</td>".
                "<td align='right'>".$row["longitude"]."</td>".
                "<td><a href=delete.php?id=".$row["id"].">hapus</a></td>".
                "<td><a href=edit/index.php?id=".$row["id"].">edit</a></td>".
            "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
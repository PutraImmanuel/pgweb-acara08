<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "pgweb8";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT * FROM penduduk";
$result = $conn->query($sql);

echo "<a href='input/index.html'>Input Data Baru</a><br><br>";

if ($result->num_rows > 0) {
    echo "<table border='1px'>
            <tr>
                <th>ID</th>
                <th>Kecamatan</th>
                <th>Longitude</th>
                <th>Latitude</th>
                <th>Luas</th>
                <th>Jumlah Penduduk</th>
                <th>Aksi</th>
            </tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["id"]."</td>
                <td>".$row["Kecamatan"]."</td>
                <td>".$row["Longitude"]."</td>
                <td>".$row["Latitude"]."</td>
                <td>".$row["Luas"]."</td>
                <td>".$row["jumlah_penduduk"]."</td>
                <td>
                    <a href='hapus.php?id=".$row["id"]."' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?')\">Hapus</a>
                </td>
                </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
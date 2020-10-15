<?php
$host = "localhost";
$user = "id14633089_user";
$pass = 'P}$ivCt&lTTr1Ggy';
$db = "id14633089_resep";
$conn = mysqli_connect($host, $user, $pass, $db);
$searchTerm = $_GET['term']; // Menerima kiriman data dari inputan pengguna

$sql="SELECT * FROM artikel WHERE judul LIKE '%".$searchTerm."%' ORDER BY judul ASC"; // 
$hasil=mysqli_query($conn,$sql); //Query dieksekusi

//Disajikan dengan menggunakan perulangan
while ($row = mysqli_fetch_array($hasil)) {
    $data[] = $row['judul'];
}
//Nilainya disimpan dalam bentuk json
echo json_encode($data);
?>
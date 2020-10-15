<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "resep";
$output = '';
$id = json_encode($_POST['id']);
$conn = mysqli_connect($host, $user, $pass, $db);
 
 

$sql = "SELECT * FROM artikel where id=".$id;
$c = mysqli_query($conn, $sql);
$d = mysqli_fetch_array($c);
 
?>

Judul: <?php echo $d['judul'];?> <hr>
Isi:   <?php echo $d['isi'];?>
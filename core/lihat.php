<?php
$host = "db4free.net";
$user = "user_345";
$pass = "project123";
$db = "resep_345";
$output = '';
$id = json_encode($_POST['id']);
$conn = mysqli_connect($host, $user, $pass, $db);



$sql = "SELECT * FROM artikel where id=" . $id;
$c = mysqli_query($conn, $sql);
$d = mysqli_fetch_array($c);

?>

Judul: <?php echo $d['judul']; ?>
<hr>
Resep: <?php echo $d['isi']; ?>
<hr>
Gambar: <?php echo $d['foto_cate']; ?>
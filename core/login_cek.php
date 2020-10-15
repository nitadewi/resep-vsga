<?php
session_start();
include 'Database.php';

$db = new Database();

$username = $_POST['username'];
$password = $_POST['password'];

$auth = $db->user($username, $password);

$data = mysqli_fetch_array($auth);


if ($username == $data['username']) {

    $_SESSION['username'] = $data['username'];
    $_SESSION['nama'] = $data['nama'];

    if ($password == $data['password']) {
        echo "<script> alert('Berhasil!')</script>";
        echo "<script>  window.location='../admin/index.php'</script>";
    } else {
        echo "<script> alert('Password Anda Salah!')</script>";
        echo "<script>  window.location='../login.php'</script>";
    }
} else {
    echo "<script> alert('Email Atau Password Anda Salah!')</script>";
    echo "<script>  window.location='../login.php'</script>";
}

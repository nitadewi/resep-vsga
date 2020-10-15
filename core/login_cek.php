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
        setcookie("message", "delete", time() - 1);
        header('location: ../admin/index.php');
    } else {
        setcookie("message", "Maaf, Password salah!", time() + 3600);
        header('location: ../login.php');
    }
} else {
    setcookie("message", "Maaf, Username salah", time() + 3600);
    header('location: ../login.php');
}

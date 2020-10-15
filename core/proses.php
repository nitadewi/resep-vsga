<?php

include 'Database.php';
$db = new Database();

$action = $_GET['action'];

if ($action == "add") {

    $judul = $_POST['judul'];
    $isi   = $_POST['isi'];
    $foto  = $_FILES['foto']['name'];
    $file_tmp = $_FILES['foto']['tmp_name'];

    move_uploaded_file($file_tmp, '../images/' . $foto);

    $db->create($judul, $isi, $foto);

    header("location: ../admin/index.php");
} elseif ($action == "delete") {

    echo "<script> confirm('Yakin? ingin menghapus?')</script>";

    $db->delete($_GET['id'], $_GET['nama']);

    header("location: ../admin/index.php");
} elseif ($action == "update") {

    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $isi   = $_POST['isi'];
    $foto  = $_POST['foto'];

    $db->update($id, $judul, $foto, $isi);

    header("location: ../admin/index.php");
}

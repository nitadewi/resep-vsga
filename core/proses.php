<?php

include 'Database.php';
$db = new Database();

$action = $_GET['action'];

if ($action == "add") {

    $judul = $_POST['judul'];
    $isi   = $_POST['isi'];
    $foto  = $_POST['foto'];

    $db->create($judul, $isi, $foto);

    header("location: ../admin/index.php");
} elseif ($action == "delete") {
    $db->delete($_GET['id']);

    header("location: ../admin/index.php");
} elseif ($action == "update") {

    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $isi   = $_POST['isi'];
    $foto  = $_POST['foto'];

    $db->update($id, $judul, $foto, $isi);

    header("location: ../admin/index.php");
}

<?php
include 'Database.php';

$db = new Database();

$id = json_encode($_POST['id']);

$sql = $db->dataModal($id);

var_dump($id);

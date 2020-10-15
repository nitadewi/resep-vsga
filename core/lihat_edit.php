<?php
include 'Database.php';

$db = new Database();

echo json_encode($db->dataModal($_GET['id']));

<?php 
header('Content-Type: application/json');
include "database.php";
global $db;

$sql = "SELECT * FROM apidata";

$qry = $db->query($sql);

echo json_encode($qry->fetchAll());
?>
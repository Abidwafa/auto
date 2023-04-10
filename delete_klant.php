<?php

include 'db.php';
$db = new Database();

$klant_id = $_GET['klant_id'];

$sql = "DELETE FROM klanten WHERE klant_id=:klant_id";
$placeholders = [
    'klant_id' => $klant_id
];
 $db->delete($sql, $placeholders);
 header("Location: klanten.php")


?>
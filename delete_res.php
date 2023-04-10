<?php

include 'db.php';
$db = new Database();

$reservering_id = $_GET['reservering_id'];

$sql = "DELETE FROM reservering WHERE reservering_id=:reservering_id";
$placeholders = [
    'reservering_id' => $reservering_id
];
 $db->delete($sql, $placeholders);
 header("Location: alle_res.php")


?>
<?php

include 'db.php';
$db = new Database();

$auto_id = $_GET['auto_id'];

$sql = "DELETE FROM auto_lijst WHERE auto_id=:auto_id";
$placeholders = [
    'auto_id' => $auto_id
];
 $db->delete($sql, $placeholders);
 header("Location: medewerker.php")


?>
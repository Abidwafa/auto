<?php
include 'db.php';
$db = new Database();


$sql = "INSERT INTO medewerker VALUES(:id,:username,:password)";
$placeholder = [
    'id'=> NULL,
    'username'=> 'admin',
    'password'=> password_hash('admin', PASSWORD_DEFAULT)
];
$db->insert($sql,$placeholder)

?>
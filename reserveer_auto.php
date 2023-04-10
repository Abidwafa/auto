<?php
include 'db.php';
$db = new Database();

$auto_id = $_GET['auto_id'];
$van = $_GET['van'];
$tot = $_GET['tot'];

// Selecteerd Alle Emails from klant Table
$sqlKlant = "SELECT email FROM klanten";
$resultKlant = $db->select($sqlKlant);

if(!is_null($resultKlant)) {
    foreach ($resultKlant as $rowsKlant) {
    }
}else {
    $rowsKlant = array();

}

// KIJK EERST OF DE FROM WORLD VERSTUURD
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(!in_array($_POST['email'], $rowsKlant)) {
$sql = "INSERT INTO klanten VALUES (:klant_id, :voornaam, :achternaam, :telefoon_nr, :adres, :plaats, :email)";
    $placeholders = [
                'klant_id' => null,
                'voornaam' => $_POST['voornaam'],
                'achternaam' => $_POST['achternaam'],
                'telefoon_nr' => $_POST['telefoon_nr'],
                'adres' => $_POST['adres'],
                'plaats' => $_POST['plaats'],
                'email' => $_POST['email']
            ];
            $db->insert($sql,$placeholders);
            $klant_id = $db->lastInsertId();
} else {
    $email = $_POST['email'];
    $sqlKlant = "SELECT klant_id FROM klanten WHERE email='$email'";
    $resultKlant = $db->select($sqlKlant);

    foreach ($resultKlant as $rowsKlant) {
        foreach ($rowsKlant as $rowKlant) {

        }
    }

    $klant_id = $rowKlant;

}

$sqlRes = "INSERT INTO  reservering VALUES (:reservering_id, :van, :tot, :auto_id, :klant_id) ";
    $placeholders = [
               'reservering_id' => $reservering_id,
                'van' => $van,
                'tot' => $tot,
                'auto_id' => $auto_id,
                'klant_id' => $klant_id,

    ];

    $db->insert($sqlRes,$placeholders);
    $resNo = $db->lastInsertId();


    header("Location:factuur.php?reservering_id=" .$resNo. "&auto_id=" .$auto_id. "&van=".$van. "&tot=".$tot. "&klant_id=".$klant_id.
    "&voornaam=".$_POST['voornaam'].
    "&achternaam=".$_POST['achternaam'].
    "&telefoon_nr=".$_POST['telefoon_nr'].
    "&adres=".$_POST['adres'].
    "&plaats=".$_POST['plaats'].
    "&email=".$_POST['email']."");


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reserveren auto's</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
   

<div class="container-fluid h-100">
    <div class="row justify-content-center align-items-center h-100">
        <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
    <div class="form-group">

<form method="POST"><br>
        <input type="text" name="voornaam" placeholder="voornaam" required class="form-control form-control-lg" ><br><br>
        <input type="text" name="achternaam" placeholder="achternaam" class="form-control form-control-lg" ><br><br>
        <input type="text" name="telefoon_nr" placeholder="telefoon_nr" required class="form-control form-control-lg" ><br><br>
        <input type="text" name="adres" placeholder="adres" required class="form-control form-control-lg" ><br><br>
        <input type="text" name="plaats" placeholder="plaats" class="form-control form-control-lg" ><br><br>
        <input type="email" name="email" placeholder="email" required class="form-control form-control-lg" ><br><br>
        <input type="submit" class="btn btn-info btn-lg btn-block">
    </form>

    </div>
    </div>
    </div>
</div>
    
</body>
</html>
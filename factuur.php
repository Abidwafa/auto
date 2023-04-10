<?php

use LDAP\Result;

include 'db.php';
$db = new Database();
echo " <br><br>";
echo "Reservering verzonden!";
$resNo =$_GET['reservering_id'];
$auto_id = $_GET['auto_id'];

$van = $_GET['van'];
$tot = $_GET['tot'];

$firstDate = new DateTime($van);
$ScndDate = new DateTime($tot);
$difference =$firstDate->diff($ScndDate)->format("%a");


$sql = "SELECT auto_prijs from auto_lijst WHERE auto_id='$auto_id'";
$result = $db->select($sql);
foreach ($result as $rows) {
    foreach ($rows as $row) {

    }
}
  $totaal_prijs = $row * $difference;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factuur</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

     
   <h1>Factuur</h1>
   <table class="table table-striped">
    <tr>
        <th>reservering_id</th>
        <th>auto_id</th>
        <th>van</th>
        <th>tot</th>
        <th>klant_id</th>
        <td>voornaam</td>
        <td>achternaam</td>
        <td>telefoon_nr</td>
        <td>adres</td>
        <th>plaats</th>
        <td>email</td>
        <td>totaal prijs</td>
    </tr>

    <tr>
        <td><?php echo $_GET['reservering_id'] ?></td>
        <td><?php echo $_GET['auto_id'] ?></td>
        <td><?php echo $_GET['van'] ?></td>
        <td><?php echo $_GET['tot'] ?></td>
        <td><?php echo $_GET['klant_id'] ?></td>
        <td><?php echo $_GET['voornaam'] ?></td>
        <td><?php echo $_GET['achternaam'] ?></td>
        <td><?php echo $_GET['telefoon_nr'] ?></td>
        <td><?php echo $_GET['adres'] ?></td>
        <td><?php echo $_GET['plaats'] ?></td>
        <td><?php echo $_GET['email'] ?></td> 
        <td><?php echo $totaal_prijs ?></td> 
    </tr>
     <?php 
     
      ?>
   </table>

   <button class="btn btn-info btn-lg btn-block" onclick="window.print()"> Print this page</button>

</body>
</html>
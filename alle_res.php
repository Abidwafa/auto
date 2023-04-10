<?php

use LDAP\Result;

include 'db.php';
$db = new Database();

$sql = "SELECT * from reservering";
$result = $db->select($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alle Reserveringen</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>


   <h1>Alle Reserveringen</h1>
   <table class="table table-striped">
    <tr>
        <th>reservering_id</th>
        <th>van</th>
        <th>tot</th>
        <th>auto_id</th>
        <th>klant_id</th>
        <th colspan="2">Action</th>
    </tr>

    <tr>
        <?php 
        if(!is_null($result)) {
        foreach ($result as $rows) {?>
         <td><?php echo $rows['reservering_id'] ?></td>
         <td><?php echo $rows['van'] ?></td>
         <td><?php echo $rows['tot'] ?></td>
         <td><?php echo $rows['auto_id'] ?></td>
         <td><?php echo $rows['klant_id'] ?></td>
         <td><a  class="btn btn-success btn-lg btn-block" href="edit_res.php?reservering_id=
         <?php echo trim($rows['reservering_id']);?> 
         &van=<?php echo trim($rows['van']);?>
         &tot=<?php echo trim($rows['tot']);?>
         ">Edit</a></td>
         <td><a  class="btn btn-success btn-lg btn-block" href="delete_res.php?reservering_id=<?php echo $rows['reservering_id'];?>">Delete</a></td>

       
    </tr>
     <?php }
     } ?>
   </table>

   <a class="btn btn-info btn-lg btn-block" href="medewerker.php"> Terug Medewerker</a>
   <a  class="btn btn-info btn-lg btn-block" href="alle_res.php">Alle_Reserveringen</a>
   <a class="btn btn-info btn-lg btn-block" href="res_vandaag.php">Reserveringen_vandaag</a>
   <a  class="btn btn-info btn-lg btn-block" href="select_date.php">Maak Reservering</a>
   <a  class="btn btn-info btn-lg btn-block" href="klanten.php">Klanten</a>
</body>
</html>
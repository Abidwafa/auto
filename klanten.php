<?php

include 'db.php';
$db = new Database();

$sql = "SELECT * from klanten";
$result = $db->select($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>klant</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>


   <h1>Alle klanten</h1>
   <table class="table table-striped">
    <tr>
        <th>klant_id</th>
        <th>voornaam</th>
        <th>achternaam</th>
        <th>telefoo_nr</th>
        <th>adres</th>
        <th>plaats</th>
        <th>email</th>
        <th colspan="3">Action</th>
    </tr>

    <tr>
        <?php 
        foreach ($result as $rows) {?>
         <td><?php echo $rows['klant_id'] ?></td>
         <td><?php echo $rows['voornaam'] ?></td>
         <td><?php echo $rows['achternaam'] ?></td>
         <td><?php echo $rows['telefoo_nr'] ?></td>
         <td><?php echo $rows['adres'] ?></td>
         <td><?php echo $rows['plaats'] ?></td>
         <td><?php echo $rows['email'] ?></td>
         <td><a  class="btn btn-success btn-lg btn-block"  href="edit_klant.php?klant_id=
         <?php echo trim($rows['klant_id']);?> 
         &voornaam=<?php echo trim($rows['voornaam']);?>
         &achternaam=<?php echo trim($rows['achternaam']);?>
         &telefoo_nr=<?php echo trim($rows['telefoo_nr']);?>
         &adres=<?php echo trim($rows['adres']);?>
         &plaats=<?php echo trim($rows['plaats']);?>
         &email=<?php echo trim($rows['email']);?>
         ">Edit</a></td>
         <td><a  class="btn btn-success btn-lg btn-block" href="delete_klant.php?klant_id=<?php echo $rows['klant_id'];?>">Delete</a></td>
         <td><a  class="btn btn-success btn-lg btn-block" href="reserveringen_klant.php?klant_id=<?php echo $rows['klant_id'];?>">Reserveringen</a></td>

       
    </tr>
     <?php } ?>
   </table>

   <a class="btn btn-info btn-lg btn-block" href="medewerker.php"> Terug Medewerker</a>
   <a  class="btn btn-info btn-lg btn-block" href="alle_res.php">Alle_Reserveringen</a>
   <a class="btn btn-info btn-lg btn-block" href="res_vandaag.php">Reserveringen_vandaag</a>
   <a  class="btn btn-info btn-lg btn-block" href="select_date.php">Maak Reservering</a>
</body>
</html>
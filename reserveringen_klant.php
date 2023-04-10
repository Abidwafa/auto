<?php
include 'db.php';
$db = new Database();

$klant_id = $_GET['klant_id'];

$sql = "SELECT reservering.klant_id as klant_id, klanten.voornaam as voornaam, klanten.achternaam as achternaam, klanten.telefoo_nr as telefoo_nr, 
klanten.email as email, reservering.reservering_id  as reservering_id, 
reservering.van  as van, reservering.tot  as tot, reservering.auto_id  as auto_id
FROM reservering INNER JOIN klanten ON reservering.klant_id = klanten.klant_id  
WHERE reservering.klant_id = '$klant_id'";
$result = $db->select($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>klant Reserveringen</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>


   <h1>Reserveringen klant</h1>
   <table class="table table-striped">
    <tr>
        <th>reservering_id</th>
        <th>voornaam</th>
        <th>achternaam</th>
        <th>telefoo_nr</th>
        <th>email</th>
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
         <td><?php echo $rows['voornaam'] ?></td>
         <td><?php echo $rows['achternaam'] ?></td>
         <td><?php echo $rows['telefoo_nr'] ?></td>
         <td><?php echo $rows['email'] ?></td>
         <td><?php echo $rows['van'] ?></td>
         <td><?php echo $rows['tot'] ?></td>
         <td><?php echo $rows['auto_id'] ?></td>
         <td><?php echo $rows['klant_id'] ?></td>
         <td><a  class="btn btn-success btn-lg btn-block" href="delete_res.php?reservering_id=<?php echo $rows['reservering_id'];?>">Delete</a></td>

       
    </tr>
     <?php }
     } ?>
   </table>
   <button class="btn btn-info btn-lg btn-block" onclick="window.print()"> Print this page</button>
   <a  class="btn btn-info btn-lg btn-block" href="alle_res.php">Alle_Reserveringen</a>
</body>
</html>
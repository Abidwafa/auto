<?php
include 'db.php';
$db = new Database();

$van = $_GET['van'];
$tot = $_GET['tot'];

if(isset($_GET['van']) && isset($_GET['tot'])) {
    $sql = "Select * from auto_lijst where auto_id not in 
    (select auto_id from reservering where van between '$van' and '$tot' and tot between '$van' and '$tot')";
    $result = $db->select($sql);
} else {
    header("location:select_data.php");

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

          <br><br>
    <h1>Beschikbara auto's</h1>

    <table class="table table-striped">
        <tr>
            <th>auto's</th>
            <th>auto_merk</th>
            <th>auto_model</th>
            <th>kenteken_nummer</th>
            <th>auto_prijs per dag</th>
            <th>foto</th> 
            <th>Action</th>
        </tr>

        <tr>
            <?php
            if(!is_null($result)) {
                foreach($result as $rows) { ?>
                <td><?php echo $rows['auto_id'] ?></td>
                <td><?php echo $rows['auto_merk'] ?></td>
                <td><?php echo $rows['auto_model'] ?></td>
                <td><?php echo $rows['kenteken_nummer'] ?></td>
                <td><?php echo $rows['auto_prijs'] ?></td>
                <td><img src="images/<?php echo $rows['foto']; ?>" alt="geen foto" style="width: 12rem;"></td>
                <td> <a class="btn btn-success btn-lg btn-block" href="reserveer_auto.php?auto_id=<?php echo $rows['auto_id'];?>&van=<?php echo $van;?>&tot=<?php echo $tot;?>">Reserveer</a></td>  
        </tr>

        <?php } 
            }else {
                echo 'Geen auto beschikbaar tussen de geselecteerde datum.';

            }

            ?>


    </table>
</body>
</html>
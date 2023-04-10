<?php
include 'db.php';
$db = new Database();

session_start();
if (!isset($_SESSION['username'])) {
    header("Location:index.php");
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $file_name = $_FILES['foto']['name'];
    $file_temp = $_FILES['foto']['tmp_name'];
    $upload_folder = "images/".$file_name;

    try {
        $movefile = move_uploaded_file($file_temp, $upload_folder);
        $sql = "INSERT INTO auto_lijst VALUES (:auto_id, :auto_merk, :auto_model, :kenteken_nummer, :auto_prijs, :foto)";
        $placeholders = [
            'auto_id' => null,
            'auto_merk' => $_POST['auto_merk'],
            'auto_model' => $_POST['auto_model'],
            'kenteken_nummer' => $_POST['kenteken_nummer'],
            'auto_prijs' => $_POST['auto_prijs'],
            'foto' => $file_name
            
        ];
        $db->insert($sql,$placeholders);
        echo "<script>alert('Inserted successfully')</script>";
    }catch (\Exception $e) {
        echo $e->getMessage();
    }
}

$sqlautos = "Select * from auto_lijst";
$result = $db->select($sqlautos)

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

<div class="container-fluid h-100">
    <div class="row justify-content-center align-items-center h-100">
        <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
    <div class="form-group">
    <h1 class="display-4">Voeg Auto Toe</h1><br>
<form method="POST" enctype="multipart/form-data">
        <input type="text" name="auto_merk" placeholder="auto_merk"  class="form-control form-control-lg" ><br>
        <input type="text" name="auto_model" placeholder="auto_model"class="form-control form-control-lg" ><br>
        <input type="text" name="kenteken_nummer" placeholder="kenteken_nummer"class="form-control form-control-lg" ><br>
        <input type="text" name="auto_prijs" placeholder="auto_prijs"class="form-control form-control-lg" ><br>
        <label for="">Foto</label>
        <input type="file" name="foto" placeholder="foto" class="form-control form-control-lg" ><br>
        <input type="submit"  class="btn btn-info btn-lg btn-block"><br><br>
    </form>

    </div>
    </div>
    </div>
</div>

   <h1 >Alle auto</h1>
   <table class="table table-striped">
    <tr>
        <th>auto_id</th>
        <th>auto_merk</th>
        <th>auto_model</th>
        <th>kenteken_nummer</th>
        <th>auto_prijs_per_dag</th>
        <th>foto</th>
        <th colspan="2">Actie</th>
    </tr>

    <tr>
        <?php 
        if(!is_null($result)) {
        foreach ($result as $rows) {?>
         <td><?php echo $rows['auto_id'] ?></td>
         <td><?php echo $rows['auto_merk'] ?></td>
         <td><?php echo $rows['auto_model'] ?></td>
         <td><?php echo $rows['kenteken_nummer'] ?></td>
         <td><?php echo $rows['auto_prijs'] ?></td>
         <td><img src="images/<?php echo $rows['foto']; ?>" alt="geen foto" style="width: 12rem;"></td>
         
         



         <td><a class="btn btn-success btn-lg btn-block" href="edit_auto.php?auto_id=
         <?php echo trim($rows['auto_id']);?> 
         &auto_merk=<?php echo trim($rows['auto_merk']);?>
         &auto_model=<?php echo trim($rows['auto_model']);?>
         &kenteken_nummer=<?php echo trim($rows['kenteken_nummer']);?>
         &auto_prijs=<?php echo trim($rows['auto_prijs']);?>
         &foto=<?php echo $rows['foto'];?>
         ">Edit</a></td>
         <td><a class="btn btn-success btn-lg btn-block" href="delete_auto.php?auto_id=<?php echo $rows['auto_id'];?>">Delete</a></td>

       
    </tr>
     <?php }} ?>
   </table>
             <br>

   <a  class="btn btn-info btn-lg btn-block" href="alle_res.php">Alle_Reserveringen</a>
   <a class="btn btn-info btn-lg btn-block" href="res_vandaag.php">Reserveringen_vandaag</a>
   <a  class="btn btn-info btn-lg btn-block" href="select_date.php">Maak Reservering</a>
   <a  class="btn btn-info btn-lg btn-block" href="klanten.php">Klanten</a>
   <a  class="btn btn-danger btn-lg btn-block" href="logout.php">Logout</a>
   <br><br>


</body>
</html>
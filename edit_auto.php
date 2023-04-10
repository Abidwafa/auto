<?php

include 'db.php';
$db = new Database();


$auto_id = $_GET['auto_id'];



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $file_name = $_FILES['foto']['name'];
    $file_temp = $_FILES['foto']['tmp_name'];
    $upload_folder = "images/".$file_name;


    $auto_merk = $_POST['auto_merk'];
    $auto_model = $_POST['auto_model'];
    $kenteken_nummer = $_POST['kenteken_nummer'];
    $auto_prijs = $_POST['auto_prijs'];
    $foto = $_POST['foto'];
    if($_FILES['foto']) {
        try {
            $sql = "UPDATE auto_lijst SET auto_merk=:auto_merk, auto_model=:auto_model, kenteken_nummer=:kenteken_nummer, auto_prijs=:auto_prijs, foto=:foto WHERE auto_id=:auto_id";
            $movefile = move_uploaded_file($file_temp, $upload_folder);
        
            $placeholders = [
                'auto_id' => $auto_id,
                'auto_merk' => $auto_merk,
                'auto_model' => $auto_model,
                'kenteken_nummer' => $kenteken_nummer,
                'auto_prijs' => $auto_prijs,
                'foto' => $file_name
                    
            ];
        
            $db->update($sql, $placeholders);
            header('Location: medewerker.php');
        } catch (Exception $e) {
            echo "Error: ". $e->getMessage();
        
        }
    } if ($_FILES['foto']['size'] == 0) {
        $oldFoto = $_GET['foto'];
        try {
            $sql = "UPDATE auto_lijst SET auto_merk=:auto_merk, auto_model=:auto_model, kenteken_nummer=:kenteken_nummer, auto_prijs=:auto_prijs, foto=:foto WHERE auto_id=:auto_id";
            $movefile = move_uploaded_file($file_temp, $upload_folder);
        
            $placeholders = [
                'auto_id' => $auto_id,
                'auto_merk' => $auto_merk,
                'auto_model' => $auto_model,
                'kenteken_nummer' => $kenteken_nummer,
                'auto_prijs' => $auto_prijs,
                'foto' => $oldFoto
                    
            ];
        
            $db->update($sql, $placeholders);
            header('Location: medewerker.php');
        } catch (Exception $e) {
            echo "Error: ". $e->getMessage();
        
        }
}
}

?>

<!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>UPDATE</title>
 </head>
 <body><br><br>
 <div class="container-fluid h-100">
    <div class="row justify-content-center align-items-center h-100">
        <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
    <div class="form-group">
    <h1 class="display-4">UPDATE</h1><br>
 <form method="POST" enctype="multipart/form-data">
    <input  class="form-control form-control-lg" type="text" name="auto_merk" value="<?php echo $_GET['auto_merk'];?>"><br>
    <input  class="form-control form-control-lg" type="text" name="auto_model" value="<?php echo $_GET['auto_model'];?>"><br>
    <input  class="form-control form-control-lg" type="text" name="kenteken_nummer" value="<?php echo $_GET['kenteken_nummer'];?>"><br>
    <input  class="form-control form-control-lg"type="text" name="auto_prijs" value="<?php echo $_GET['auto_prijs'];?>"><br>
    <input  class="form-control form-control-lg"type="file" name="foto" value="<?php echo $_GET['foto'];?>"><br>
    <input type="submit" class="btn btn-info btn-lg btn-block" ><br>
 </form>

 </div>
    </div>
    </div>
</div>

 
 </body>
 </html>
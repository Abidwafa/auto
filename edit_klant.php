<?php

include 'db.php';
$db = new Database();


$klant_id = $_GET['klant_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
try {


    $sql = "UPDATE klanten SET voornaam=:voornaam, achternaam=:achternaam, telefoo_nr=:telefoo_nr, adres=:adres, plaats=:plaats, email=:email WHERE klant_id=:klant_id";

    $placeholders = [
        'klant_id' => $klant_id,
        'voornaam' => $_POST['voornaam'],
        'achternaam' => $_POST['achternaam'],
        'telefoo_nr' => $_POST['telefoo_nr'],
        'adres' => $_POST['adres'],
        'plaats' => $_POST['plaats'],
        'email' => $_POST['email'],   
    ];

    $db->update($sql, $placeholders);
    header('Location: klanten.php');
} catch (Exception $e) {
    echo "Error: ". $e->getMessage();

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
    <title>Document</title>
 </head>
 <body>

 <div class="container-fluid h-100">
    <div class="row justify-content-center align-items-center h-100">
        <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
    <div class="form-group">
    <h1 class="display-4">UPDATE</h1><br>
 <form method="POST">
    <input class="form-control form-control-lg" type="text" name="voornaam" value="<?php echo $_GET['voornaam'];?>"><br>
    <input class="form-control form-control-lg" type="text" name="achternaam" value="<?php echo $_GET['achternaam'];?>"><br>
    <input class="form-control form-control-lg" type="text" name="telefoo_nr" value="<?php echo $_GET['telefoo_nr'];?>"><br>
    <input class="form-control form-control-lg" type="text" name="adres" value="<?php echo $_GET['adres'];?>"><br>
    <input class="form-control form-control-lg" type="text" name="plaats" value="<?php echo $_GET['plaats'];?>"><br>
    <input class="form-control form-control-lg" type="email" name="email" value="<?php echo $_GET['email'];?>"><br>
    <input type="submit" class="btn btn-info btn-lg btn-block"><br>

 </form>

 </div>
    </div>
    </div>
</div>
 
 </body>
 </html>
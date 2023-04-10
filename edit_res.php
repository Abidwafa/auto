<?php

include 'db.php';
$db = new Database();


$reservering_id = $_GET['reservering_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $van = $_POST['van'];
    $tot = $_POST['tot'];
try {


    $sql = "UPDATE reservering SET van=:van, tot=:tot WHERE reservering_id=:reservering_id";

    $placeholders = [
        'reservering_id' => $reservering_id,
        'van' => $van,
        'tot' => $tot,
        
    ];

    $db->update($sql, $placeholders);
    header('Location: alle_res.php');
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
    <input class="form-control form-control-lg" type="date" name="van" value="<?php echo $_GET['van'];?>"><br>
    <input class="form-control form-control-lg" type="date" name="tot" value="<?php echo $_GET['tot'];?>"><br>
    <input type="submit" class="btn btn-info btn-lg btn-block"><br>

 </form>

 </div>
    </div>
    </div>
</div>
 
 </body>
 </html>
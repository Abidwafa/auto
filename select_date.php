<?php
$today = date('Y-m-d');
$maxdate =date('Y-m-d', strtotime('+365 days'));

   if($_SERVER['REQUEST_METHOD'] == 'GET') {
       if(isset($_GET['van'])  && isset($_GET['tot'])) {
           $van = $_GET['van'];
           $tot = $_GET['tot'];
                if($_GET['van'] < $_GET['tot']) {
            header("Location: auto_overzicht.php?van=".$van."&tot=".$tot);
                } else {
                    echo 'Kan geen reservering maken. Selecteer de juisyte datums';
                    exit();
                    header("location:select_data.php");
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
    <title>datums</title>
</head>
<body>
    <div class="d-flex justify-content-center">
        <form METHOD="GET"><br><br><br>
            <label for="">Selecteer datums</label> <br>

            <br><input class="form-control"type="date" name="van" min="<?php echo $today; ?>" max="<?php echo $maxdate;?>" required> <br>
            <br><input class="form-control"type="date" name="tot" min="<?php echo $today; ?>" max="<?php echo $maxdate;?>" required> <br>
            <br><input  class="btn btn-info btn-lg btn-block" type="submit" value="Selecteer">


        </form>



</body>
</html>
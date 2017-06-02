<?php ob_start();?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Saving Car</title>
    </head>
    <body>
    <?php
    $carID = $_POST['carID'];
    $manufactureYear = $_POST['manufactureYear'];
    $make = $_POST['make'];
    $model = $_POST['model'];
    $colour = $_POST['colour'];
    $milage = $_POST['milage'];
    $car = $_POST['car'];
    //Connect to the DB
    $conn = new PDO('mysql:host=localhost;dbname=php','gc200361317','HW6HqS6oQc');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //Create a SQL command
    if (!empty($carID))
    {
        $sql = "UPDATE car
                SET manufactureYear = :manufactureYear, make = :make, model = :model, colour = :colour, milage = :milage, car = :car
                WHERE carID = :carID";
    }
    else {
        $sql = "INSERT INTO car (manufactureYear, make, model, colour, milage, car) 
            VALUES (:manufactureYear, :make, :model, :colour, :milage, :car)";
    }
    $cmd = $conn->prepare($sql);
    $cmd->bindParam(':manufactureYear', $manufactureYear, PDO::PARAM_STR, 5);
    $cmd->bindParam(':make', $make, PDO::PARAM_INT, 50);
    $cmd->bindParam(':model', $model, PDO::PARAM_STR, 50);
    $cmd->bindParam(':colour', $colour, PDO::PARAM_STR, 50);
    $cmd->bindParam(':milage', $milage, PDO::PARAM_STR, 5);
    $cmd->bindParam(':car', $car, PDO::PARAM_STR, 20);
    if (!empty($carID))
    {
        $cmd->bindParam(':carID',$carID, PDO::PARAM_INT);
    }
    $cmd->execute();
    $conn = null;
    header('location:cars.php');
    ?>
    </body>
    </html>
<?php ob_flush(); ?>
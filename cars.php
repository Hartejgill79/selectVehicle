<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cars</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
</head>
<body>
<main class="container">
    <h1>Cars</h1>
    <a href="searchVehicle.php">Add a new car</a>
    <?php
    $conn = new PDO('mysql:host=localhost;dbname=php','gc200361317','HW6HqS6oQc');
    $sql = "SELECT * FROM car";
    $cmd = $conn->prepare($sql);
    $cmd->execute();
    $albums = $cmd->fetchAll();
    $conn=null;
    echo '<table class="table table-striped table-hover"><tr>
                        <th>Year</th>
                        <th>Make</th>
                        <th>Model</th>
                        <th>Colour</th>
                        <th>Milage</th>
                        <th>Edit</th></tr>';
    foreach($car as $car)
    {
        echo '<tr><td>'.$car['manufactureYear'].'</td>
                      <td>'.$car['make'].'</td>
                      <td>'.$car['model'].'</td>
                      <td>'.$car['colour'].'</td>
                      <td>'.$car['milage'].'</td>
                      <td>'.$car['car'].'</td>
                      <td><a href="searchVehicle.php?carID='.$car['carID'].'"class="btn btn-primary"</a>Edit</td></tr>';
    }
    ?>
</main>
</body>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/app.js"></script>
</html>
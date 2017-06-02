<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vehicle Search</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
</head>
<body>
<main class="container">
    <h1>Vehicle Search</h1>
    <?php
    if (!empty($_GET['carID']))
        $carID = $_GET['carID'];
    else
        $carID = null;
    $manufactureYear = null;
    $make = null;
    $model = null;
    $colour = null;
    $milage = null;
    $carPicked = null;
    if (!empty($carID))
    {
        $conn = new PDO('mysql:host=localhost;dbname=php','gc200361317','HW6HqS6oQc');
        $sql = "SELECT * FROM car WHERE carID = :carID";
        $cmd = $conn->prepare($sql);
        $cmd->bindParam(':carID', $carID, PDO::PARAM_INT);
        $cmd->execute();
        $car = $cmd->fetch();
        $manufactureYear = $car['manufactureYear'];
        $make = $car['make'];
        $model = $car['model'];
        $colour = $car['colour'];
        $milage = $car['milage'];
        $carPicked =$car['car'];
        $conn=null;
    }
    ?>
    <form method="post" action="saveCar.php">
        <fieldset class="form-group">
            <label for="manufactureYear" class="col-sm-1">Year: </label>
            <input name="manufactureYear" id="manufactureYear" type="number" min="1900" placeholder="Year"
                   value="<?php echo $manufactureYear?>"/>
        </fieldset>
        <fieldset class="form-group">
            <label for="make" class="col-sm-1">Make: </label>
            <input name="make" id="make" required placeholder="Make"
                   value="<?php echo $make ?>"/>
        </fieldset>
        <fieldset class="form-group">
            <label for="modle" class="col-sm-1">Model: </label>
            <input name="model" id="model" required placeholder="Model"
                   value="<?php echo $model?>"/>
        </fieldset>
        <fieldset class="form-group">
            <label for="colour" class="col-sm-1">Colour: </label>
            <input name="colour" id="colour" required placeholder="colour"
                   value="<?php echo $colour?>"/>
        </fieldset>
        <fieldset class="form-group">
            <label for="milage" class="col-sm-1">Milage: </label>
            <input name="milage" id="milage" type="number" min="1900" placeholder="Milage"
                   value="<?php echo $milage?>"/>
        </fieldset>
        <fieldset class="form-group">
            <label for="car" class="col-sm-1">Car: *</label>
            <select car="genre" id="car">
                <?php
                $conn = new PDO('mysql:host=localhost;dbname=php','gc200361317','HW6HqS6oQc');
                $sql = "SELECT * FROM car";
                $cmd = $conn->prepare($sql);
                $cmd->execute();
                $genres = $cmd->fetchAll();
                foreach($car as $car)
                {
                    if ($genrePicked == $car['car']){
                        echo '<option selected>'.$car['car'].'</option>';
                    }
                    else {
                        echo '<option>'.$car['car'].'</option>';
                    }
                }
                $conn=null;
        ?>
        </select>
        </fieldset>
        <button>Submit</button>
    </form>
</main>
</body>
<script src="js/bootstrap.min.js"></script>
</html>
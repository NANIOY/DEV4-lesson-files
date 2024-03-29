<?php 
    include_once("./bootstrap.php");

    $car = new Car();
    $car->setBrand('Toyota');
    $car->setPassengers(4);
    // echo $car->book();
    echo $car;

    echo '<hr>';

    $bike = new Bike();
    $bike->setBrand('Yamaha');
    $bike->setBattery(200);
    // echo $bike->book();
    echo $bike;

    echo '<hr>';

    $allbikes = Bike::getAll();
    $allbikes2 = Bike::getAll();

    var_dump($allbikes);

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
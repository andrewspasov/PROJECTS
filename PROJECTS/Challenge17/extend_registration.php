<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require_once __DIR__ . '/autoload.php';

    $pdo = DB::connect();

    $extend = Registration::getSingleReg($_POST['id'])[0];
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        table,
        .bordered {
            border-bottom: 2px solid black;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Edit Registration</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item dropdown">

                    <a class="btn" href="dashboard.php">Go back</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid pt-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">vehicle model</th>
                    <th scope="col">vehicle type</th>
                    <th scope="col">vehicle chassis number</th>
                    <th scope="col">vehicle production year</th>
                    <th scope="col">registration number</th>
                    <th scope="col">fuel type</th>
                    <th scope="col">registration to</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <form action="update.php" method="POST">
                    <input type="hidden" name="action" value="extend">

                    <tr>
                        <td><input class="form-control" type="hidden" name="id" value="<?= $extend['id'] ?>"><?= $extend['id'] ?></td>
                        <td><?= $extend['vehicle_model'] ?></td>
                        <td><?= $extend['vehicle_type'] ?></td>
                        <td><?= $extend['vehicle_chassis_number'] ?></td>
                        <td><?= $extend['vehicle_production_year'] ?></td>
                        <td><?= $extend['registration_number'] ?></td>
                        <td><?= $extend['fuel_type'] ?></td>
                        <td><input id="expDate" class="form-control" type="date" name="expDate" value="<?= $extend['registration_to'] ?>"></td>

                        <td><button type="submit" class="btn btn-outline-success">Extend</button></td>
                    </tr>
                </form>
            </tbody>
        </table>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>
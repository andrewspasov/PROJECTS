<?php
session_start();


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    die();
}

require_once __DIR__ . '/autoload.php';


if (isset($_SESSION['error_message'])) {
    echo '<div class="error text-danger">' . $_SESSION['error_message'] . '</div>';
    unset($_SESSION['error_message']);
}

$pdo = DB::connect();


$fuels = Fuel::getFuels($pdo);
$models = Model::getModels($pdo);
$types = Type::getTypes($pdo);



if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
}

require_once __DIR__ . '/autoload.php';

$pdo = DB::connect();
$search = Registration::getReg($pdo);

if (isset($_GET['search'])) {
    $input = $_GET['search'];

    $search = Registration::searchReg($input, $pdo);
}
// echo '<pre>';
// var_dump($search);
// die();




?>




<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <meta charset="utf-8" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />

    <!-- Latest compiled and minified Bootstrap 4.6 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- CSS script -->
    <link rel="stylesheet" href="style.css">
    <!-- Latest Font-Awesome CDN -->
    <script src="https://kit.fontawesome.com/3257d9ad29.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Vehicle Registration</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Hi there!
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="container">
        <h1 class="text-center py-5">Vehicle Registration</h1>
        <div class="row">
            <div class="col-6">
                <form action="insert-model.php" method="POST">
                    <div class="form-group pb-2">
                        <label for="newModel">Insert a new vehicle model here:</label>
                        <input type="text" class="form-control" id="newModel" name="newModel" required>
                        <button type="submit" class="btn btn-dark mt-2">Insert Model</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <form action="register.php" method="POST">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group pb-2">
                                <label for="select-model">Vehicle Model</label>
                                <select id="select-model" class="form-control" name="select-model" required>
                                    <option selected disabled value="">Please, select a vehicle model!</option>
                                    <?php foreach ($models as $model) { ?>

                                        <option value="<?= $model['id'] ?>"><?= $model['vehicle_model'] ?></option>

                                    <?php } ?>

                                </select>
                            </div>
                            <div class="form-group pb-2">
                                <label for="chassis">Vehicle chassis number</label>
                                <input type="text" class="form-control" id="chassis" name="chassis" required>
                            </div>
                            <div class="form-group pb-2">
                                <label for="reg">Vehicle registration number</label>
                                <input type="text" class="form-control" id="reg" name="reg" required>
                            </div>

                            <div class="form-group pb-2">
                                <label for="expDate">Registration to</label>
                                <input type="date" class="form-control" id="expDate" name="expDate" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group pb-2">
                                <label for="select-type">Vehicle type</label>
                                <select id="select-type" class="form-control" name="select-type" required>
                                    <option selected disabled value="">Please, select a vehicle type!</option>
                                    <?php foreach ($types as $type) { ?>

                                        <option value="<?= $type['id'] ?>"><?= $type['vehicle_type'] ?></option>

                                    <?php } ?>
                                </select>
                            </div>


                            <div class="form-group pb-2">
                                <label for="productionYear">Vehicle production year</label>
                                <input type="date" class="form-control" id="productionYear" name="productionYear" required>
                            </div>

                            <div class="form-group pb-2">
                                <label for="select-fuel">Fuel type</label>
                                <select id="select-fuel" class="form-control" name="select-fuel" required>
                                    <option selected disabled value="">Please, select fuel type!</option>
                                    <?php foreach ($fuels as $fuel) { ?>

                                        <option value="<?= $fuel['id'] ?>"><?= $fuel['fuel_type'] ?></option>

                                    <?php } ?>
                                </select>
                            </div>

                            <button type="submit" class="mt-5 pb-1 pt-1 btn btn-primary btn-lg btn-block" value="Submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container-fluid pt-5">
        <div class="col-5 offset-7">
            <div class="form-group pb-2">
                <form method="GET" action="dashboard.php">
                    <input type="text" class="form-control" name="search" placeholder="Enter model, license plate, or chassis number">
                    <button type="submit" class="mt-5 pb-1 pt-1 btn btn-primary">Search</button>
                </form>
            </div>
        </div>
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
                <?php



                foreach ($search as $s) { ?>


                    <?php
                    $enteredDate = new DateTime($s['registration_to']);
                    $currentDate = new DateTime();
                    if ($enteredDate < $currentDate) { ?>

                        <tr class="text-danger">
                        <?php }

                        elseif ($enteredDate <= $currentDate->modify('+1 month')) { ?>

                        <tr class="text-warning">
                        <?php } ?>

                        <td><?= $s['id'] ?></td>
                        <td><?= $s['vehicle_model'] ?></td>
                        <td><?= $s['vehicle_type'] ?></td>
                        <td><?= $s['vehicle_chassis_number'] ?></td>
                        <td><?= $s['vehicle_production_year'] ?></td>
                        <td><?= $s['registration_number'] ?></td>
                        <td><?= $s['fuel_type'] ?></td>
                        <td><?= $s['registration_to'] ?>

                        </td>
                        <td class="d-flex justify-content-between">
                            <form method="POST" action="update.php">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?= $s['id'] ?>">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            <form action="edit_registration.php" method="POST">
                                <input type="hidden" name="id" value="<?= $s['id'] ?>">
                                <button type="submit" class="btn btn-warning">Edit</button>
                            </form>

                            <?php if ($enteredDate < $currentDate && $enteredDate <= $currentDate->modify('+1 month')) { ?>
                                <form action="extend_registration.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $s['id'] ?>">
                                    <button type="submit" class="btn btn-success">Extend</button>
                                </form>
                            <?php } ?>

                        </td>
                        </tr>

                    <?php  }
                    ?>


            </tbody>
        </table>
    </div>
    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="ha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <!-- Latest Compiled Bootstrap 4.6 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

</body>

</html>

<?php

?>
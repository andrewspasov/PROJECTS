<?php

session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/autoload.php';



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once __DIR__ . '/autoload.php';
    // VALIDATION!!!
    $admin = Admin::getAdmin($_POST['username']);
    // echo '<pre>';
    // var_dump($admin[0]['password']);
    // var_dump($_POST['password']);
    // die();
    if ($admin) {
        $admin = $admin[0];
        if ($admin['password'] == $_POST['password']) {
            $_SESSION['username'] = $admin['username'];
            header('Location: dashboard.php');
            die();
        }
    } else {
        echo 'wrong credentials';
    }

    }
// if ($_SERVER['REQUEST_METHOD'] !== 'GET') {

// }

// require_once __DIR__ . '/autoload.php';

$pdo = DB::connect();

$msg = '';
$search = [];

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {


} 
if (isset($_GET['search'])) {


    $input = $_GET['search'];

    $search = Registration::searchRegPlate($input, $pdo);

    if(empty(Registration::searchRegPlate($input, $pdo))){
        $_SESSION['error_message'] = 'Sorry, nothing matches your search';;
    }
}


if (isset($_SESSION['error_message'])) {
    echo '<div class="error text-danger">' . $_SESSION['error_message'] . '</div>';
    unset($_SESSION['error_message']);
}

// echo '<pre>';
// var_dump($search);
// die();


?>


<!DOCTYPE html>
<html>

<head>
    <title>Homepage</title>
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
</head>

<body>
    <nav class="navbar">
        <div class="container-fluid">
            <a class="navbar-brand">Vehicle Registration</a>
            <div class="d-flex">
                <a href="login.php" class="nav-link">Login</a>
            </div>
        </div>
    </nav>

    <div class="container pt-5">
        <div class="row pt-5">
            <div class="col pt-5">
                <h2 class="text-center pt-5">Vehicle Registration</h2>
                <div class="form-group text-center">
                    <form class="pt-5" method="GET" action="homepage.php">
                        <input type="text" class="form-control" name="search" placeholder="Enter registration number here">
                        <button type="submit" class="mt-5 pb-1 pt-1 btn btn-primary btn-block px-5">Search</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid pt-5">
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
                <tr>
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

                    </td>
                </tr>
            <?php }  
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
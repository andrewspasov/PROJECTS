<?php
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require_once __DIR__ . '/autoload.php';
    // VALIDATION!!!
    $admin = Admin::getAdmin($_POST['username']);
    // echo '<pre>';
    // var_dump($admin[0]['password']);
    // var_dump($_POST['password']);
    // die();
    if($admin){
        $admin = $admin[0];
        if($admin['password'] == $_POST['password']){
            $_SESSION['username'] = $admin['username'];
            header('Location: dashboard.php');
            die(); 
        }
    } else {
        echo 'wrong credentials';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>FS13-Workshop22-login</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
            crossorigin="anonymous"
        />
    </head>
    <body>
        <nav class="navbar">
            <div class="container-fluid">
                <a class="navbar-brand">Vegicle Registration</a>
                <div class="d-flex">
                    <a href="homepage.php" class="nav-link">Back to homepage</a>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <div class="col-8 offset-2">
                    <form method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" aria-describedby="emailHelp" name="username">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
            integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
            crossorigin="anonymous"
        ></script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
            integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
            crossorigin="anonymous"
        ></script>
    </body>
</html>

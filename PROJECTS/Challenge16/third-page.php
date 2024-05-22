<?php

namespace Form;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require_once __DIR__ . '/autoload-classes.php';

$form = new Form();
$forms = $form->getForm();



if (!isset($_COOKIE['first_visit'])) {
    $firstVisitTime = time();
    setcookie('first_visit', $firstVisitTime, time() + 3600); // Cookie expires in 1 hour
    $timePassed = 0;
} else {
    $firstVisitTime = $_COOKIE['first_visit'];
    $currentTime = time();
    $timePassed = $currentTime - $firstVisitTime;
}
$hours = floor($timePassed / 3600);
$minutes = floor(($timePassed % 3600) / 60);
$seconds = $timePassed % 60;


?>




<!DOCTYPE html>
<html>

<head>
    <title>
        HOMEPAGE
    </title>
    <meta charset="utf-8" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />

    <!-- Latest compiled and minified Bootstrap 4.6 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- CSS script -->
    <!-- Latest Font-Awesome CDN -->
    <script src="https://kit.fontawesome.com/3257d9ad29.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/s.css">

    <style>
        <?php foreach ($forms as $form) { ?>.image {
            background-image: linear-gradient(rgba(0, 0, 0, 0.493), rgba(0, 0, 0, 0.598)), url(<?= $form['image_cover_url'] ?>);
            background-position: center;
            background-size: cover;
            height: calc(100vh - 56px);
        }

        <?php } ?>
    </style>
</head>

<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" href="#home">Home <span class="sr-only"></span></a>
                    <a class="nav-link" href="#about">About us</a>

                    <?php foreach ($forms as $form) { ?>
                        <a class="nav-link" href="#s-p"><?= $form['type'] ?></a>
                    <?php } ?>

                    <a class="nav-link" href="#contact">Contact</a>
                </div>
            </div>
        </nav>
    </div>

    <?php foreach ($forms as $form) { ?>

        <div class="image pb-5 d-flex align-items-center justify-content-center">
            <div class="container text-white" id="home">
                <div>
                    <h1 class="text-center pb-5 pt-5"><?= $form['main_title'] ?></h1>
                    <h6 class="text-center pb-5 pt-5"></h6>



                    <h2 class="text-center pt-5"><?= $form['subtitle'] ?></h2>
                </div>
            </div>
        </div>

        <div class="container pt-5">
            <div class="row mx-5">
                <div class="col mx-5" id="about">
                    <h1 class="text-center pb-3">About us</h1>
                    <p class="text-center mx-5"><?= $form['info'] ?></p>
                    <hr>
                    <p class="text-center"><?= $form['phone'] ?></p>
                    <p class="text-center"><?= $form['location'] ?></p>
                </div>
            </div>
        </div>

    <?php } ?>

    <div class="container" id="s-p">

        <?php foreach ($forms as $form) { ?>
            <h1 class="pb-3"><?= $form['type'] ?></h1>
        <?php } ?>

        <?php foreach ($forms as $form) { ?>


            <div class="row pb-4">
                <div class="col">
                    <div class="card">
                        <img src="<?= $form['first_image_url'] ?>" class="card-img-top" alt="card-img">
                        <div class="card-body bg-secondary text-white">
                            <h5 class="card-title"><?= $form['type'] ?> One Description</h5>
                            <p class="card-text"><?= $form['first_desc'] ?></p>
                            <p>
                                <?php
                                if ($timePassed === 0) {
                                    echo "Last updated 0 mins ago";
                                } else {
                                    echo "Last updated $minutes mins ago";
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="<?= $form['second_image_url'] ?>" class="card-img-top" alt="card-img">
                        <div class="card-body bg-secondary text-white">
                            <h5 class="card-title"><?= $form['type'] ?> Two description</h5>
                            <p class="card-text"><?= $form['second_desc'] ?></p>
                            <p>
                                <?php
                                if ($timePassed === 0) {
                                    echo "Last updated 0 mins ago";
                                } else {
                                    echo "Last updated $minutes mins ago";
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="<?= $form['third_image_url'] ?>" class="card-img-top" alt="card-img">
                        <div class="card-body bg-secondary text-white">
                            <h5 class="card-title"><?= $form['type'] ?> Three Description</h5>
                            <p class="card-text"><?= $form['third_desc'] ?></p>
                            <p>
                                <?php
                                if ($timePassed === 0) {
                                    echo "Last updated 0 mins ago";
                                } else {
                                    echo "Last updated $minutes mins ago";
                                }
                                ?>
                            </p>

                        </div>
                    </div>
                </div>
            </div>
            <hr class="pt-4">
    </div>
    <div class="container pt-4">
        <div class="row" id="contact">
            <div class="col">
                <h2>Contact</h2>
                <p><?= $form['company_desc'] ?></p>
            </div>
            <div class="col pb-4">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Insert Your Name Here" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Insert Your Email Address Here" required>
                    </div>
                    <div class="form-group pb-2">
                        <label for="msg">Message</label>
                        <textarea class="form-control" id="msg" rows="5" placeholder="Tell us something about you!" required></textarea>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-info">Send</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <div class="credits bg-dark py-4">
        <div class="container">
            <div class="row">
                <div class="col text-white text-center">
                    <span>Copyright by Andrej Spasov @ BRAINSTER</span>
                    <div>
                        <a href="<?= $form['linkedin'] ?>">Facebook</a>
                        <a href="<?= $form['facebook'] ?>">Linkedin</a>
                        <a href="<?= $form['twitter'] ?>">Twitter</a>
                        <a href="<?= $form['google'] ?>">Google+</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="ha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<!-- Latest Compiled Bootstrap 4.6 JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>

</html>
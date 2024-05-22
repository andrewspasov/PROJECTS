<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once __DIR__ . '/autoload.php';
    // var_dump($_POST);
    // die();

    $pdo = DB::connect();

    // $id = ($_POST['id']);

    $registration = Registration::getSingleReg($_POST['id'])[0];
    
    // echo '<pre>';
    // var_dump($_POST['id']);
    // die();
    $types = Type::getTypes($pdo);
    $models = Model::getModels($pdo);
    $fuels = Fuel::getFuels($pdo);
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
                    <input type="hidden" name="action" value="update">
                    <tr>
                        <td><input class="form-control" type="hidden" name="id" value="<?= $registration['id'] ?>"><?= $registration['id'] ?></td>

                        <td><select id="select-model" class="form-control" name="select-model" required>
                                <?php foreach ($models as $model) { ?>
                                    <option <?= $model['vehicle_model'] == $registration['vehicle_model'] ? 'selected' : '' ?> value="<?= $model['id'] ?>"><?= $model['vehicle_model'] ?></option>
                                <?php } ?>
                            </select>
                        </td>

                        <td><select id="select-type" class="form-control" name="select-type" required>
                                <?php foreach ($types as $type) { ?>
                                    <option <?= $type['vehicle_type'] == $registration['vehicle_type'] ? 'selected' : '' ?> value="<?= $type['id'] ?>"><?= $type['vehicle_type'] ?></option>
                                <?php } ?>
                            </select>
                        </td>



                        <td><input class="form-control" type="text" name="chassis" value="<?= $registration['vehicle_chassis_number'] ?>"></td>
                        <td><input class="form-control" type="date" name="productionYear" value="<?= $registration['vehicle_production_year'] ?>"></td>
                        <td><input class="form-control" type="text" name="reg" value="<?= $registration['registration_number'] ?>"></td>
                        <td><select id="select-fuel" class="form-control" name="select-fuel" required>

                                <?php foreach ($fuels as $fuel) { ?>
                                    <option <?= $fuel['fuel_type'] == $registration['fuel_type'] ? 'selected' : '' ?> value="<?= $fuel['id'] ?>"><?= $fuel['fuel_type'] ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td><input class="form-control" type="hidden" name="expDate" value="<?= $registration['registration_to'] ?>"><?= $registration['registration_to'] ?></td>

                        <td><button type="submit" class="btn btn-info">Update</button></td>

                    </tr>
                </form>
            </tbody>
        </table>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>
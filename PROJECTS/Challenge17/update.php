<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/autoload.php';



$pdo = DB::connect();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    switch ($_POST['action']) {

        case 'update':
            //VALIDATION!!!
            $params = [
                'id' => $_POST['id'],
                'vehicle_model_id' => $_POST['select-model'],
                'vehicle_type_id' => $_POST['select-type'],
                'vehicle_chassis_number' => $_POST['chassis'],
                'vehicle_production_year' => $_POST['productionYear'],
                'registration_number' => $_POST['reg'],
                'fuel_type_id' => $_POST['select-fuel'],
                // 'registration_to' => $_POST['expDate']
            ];

            echo Registration::updateReg($params, $pdo);

            header('Location: dashboard.php');

            break;

        case 'delete':
            //VALIDATION!!!
            // $params = ['id' => $_POST['id']];

            echo Registration::deleteReg($_POST['id'], $pdo);

            header('Location: dashboard.php');

            break;

        case 'extend':
            //VALIDATION!!!
            $enteredDate = new DateTime($_POST['expDate']);
            $currentDate = new DateTime();

            if($enteredDate <= $currentDate->modify('+1 month')){
                // header('Location: extend_registration.php');
                echo 'You must enter a date that is longer than a month from now at the very least.';

            } else {

            $params = [
                'id' => $_POST['id'],
                'registration_to' => $_POST['expDate']
            ];


            echo Registration::extendReg($params, $pdo);

            header('Location: dashboard.php');
        }

            break;
            // default:
            //     # code...
            //     break;
    }
}






// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     require_once __DIR__ . '/autoload.php';

//     $pdo = DB::connect();
    
//     $params = [
//         'vehicle_model_id' => $_POST['select-model'],
//         'vehicle_type_id' => $_POST['select-type'],
//         'vehicle_chassis_number' => $_POST['chassis'],
//         'vehicle_production_year' => $_POST['productionYear'],
//         'registration_number' => $_POST['reg'],
//         'fuel_type_id' => $_POST['select-fuel'],
//     ];


//     $updateReg = Registration::updateReg($params, $pdo);
// }

<?php

session_start();

require_once __DIR__ . '/autoload.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $conn = mysqli_connect("localhost", "root", "", "challenge17");
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $newChassis = mysqli_real_escape_string($conn, $_POST['chassis']);
    
    $sql = "SELECT registration.id AS id, vehicle_models.vehicle_model AS vehicle_model, vehicle_types.vehicle_type AS vehicle_type, registration.vehicle_chassis_number AS vehicle_chassis_number, registration.vehicle_production_year AS vehicle_production_year, registration.registration_number AS registration_number, fuel_types.fuel_type AS fuel_type, registration.registration_to AS registration_to FROM registration JOIN vehicle_models ON registration.vehicle_model_id = vehicle_models.id JOIN vehicle_types ON registration.vehicle_type_id = vehicle_types.id JOIN fuel_types ON registration.fuel_type_id = fuel_types.id  WHERE vehicle_chassis_number = '$newChassis'";

    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {

        if (!isset($_SESSION['result'])) {
            $_SESSION['error_message'] = "Error: This chassis already exists in the database.";
    
            header('Location: dashboard.php');

        } 

    } else {

            $pdo = DB::connect();
            $registration = Registration::createNewRegistration($pdo);
        
        
            $params = [
                'vehicle_model_id' => $_POST['select-model'],
                'vehicle_type_id' => $_POST['select-type'], 
                'vehicle_chassis_number' => $_POST['chassis'],
                'vehicle_production_year' => $_POST['productionYear'], 
                'registration_number' => $_POST['reg'],
                'fuel_type_id' => $_POST['select-fuel'],
                'registration_to' => $_POST['expDate']
            ];

            header('Location: dashboard.php');
        
}
}

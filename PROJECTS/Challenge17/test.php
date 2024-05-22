
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

$conn = mysqli_connect("localhost", "root", "", "challenge17");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$find = $_POST['search'];
$license = mysqli_real_escape_string($conn, $find);


$sql = "SELECT registration.id AS id, vehicle_models.vehicle_model AS vehicle_model, vehicle_types.vehicle_type AS vehicle_type, registration.vehicle_chassis_number AS vehicle_chassis_number, registration.vehicle_production_year AS vehicle_production_year, registration.registration_number AS registration_number, fuel_types.fuel_type AS fuel_type, registration.registration_to AS registration_to FROM registration JOIN vehicle_models ON registration.vehicle_model_id = vehicle_models.id JOIN vehicle_types ON registration.vehicle_type_id = vehicle_types.id JOIN fuel_types ON registration.fuel_type_id = fuel_types.id  WHERE registration.registration_number LIKE '$license'";



$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    if (!isset($_SESSION['result'])) {
        $_SESSION['error_message'] = "Error: This chassis already exists in the database.";

        header('Location: homepage.php');

    } 

} else {


        header('Location: homepage.php');
    
}
}

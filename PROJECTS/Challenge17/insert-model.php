<?php

session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Connect to your MySQL database (replace with your connection details)
$conn = mysqli_connect("localhost", "root", "", "challenge17");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve the submitted name from the form
$newName = mysqli_real_escape_string($conn, $_POST['newModel']);

// Check if the name already exists in the table
$sql = "SELECT * FROM vehicle_models WHERE vehicle_model = '$newName'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Name already exists, show an error message or handle as needed
    if (!isset($_SESSION['result'])) {
        $_SESSION['error_message'] = "Error: This name already exists in the database.";

        header('Location: dashboard.php');
        exit();
    }

} else {
    require_once __DIR__ . '/autoload.php';

    $pdo = DB::connect();

    $newModel = Registration::createNewModel($pdo);

    $param = [
        'vehicle_model' => $_POST['newModel']
    ];

    header('Location: dashboard.php');
}

mysqli_close($conn);
?>

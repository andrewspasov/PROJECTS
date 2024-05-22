<?php


include 'constants.php';
include 'functions.php';


checkRequest();

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];



$data = trim(file_get_contents('users.txt'));
$users = explode(PHP_EOL, $data);
foreach($users as $user) {
    $usr = explode('|', $user);
}

// checkUsernameMinLength($username);
checkEmptyInputs($username, $email, $password);
checkUsernameUnique($username);
checkUsername($username);
checkEmptySpaceUsername($username);

checkEmailUnique($email);
checkEmailMinLength($email);

checkPasswordMinLength($password);
checkPasswordStrength($password);

$password = md5($password);


if(file_put_contents("users.txt", "$username|$email|$password" . PHP_EOL, FILE_APPEND)) {
    redirect(REGISTERED, "success=register");
}

redirect(SIGNUP_PAGE, "error=general");

?>

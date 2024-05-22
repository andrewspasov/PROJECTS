<?php
include 'constants.php';
include 'functions.php';

checkRequest();

$username = $_POST['username'];
$password = $_POST['password'];

checkUsernameMinLengthLogin($username);
checkPasswordMinLengthLogin($password);
checkPasswordStrengthLogin($password);


checkEmptyInputsLogin($username, $password);
checkEmptySpaceUsernameLogin($username);

checkPasswordMinLength($password);
checkPasswordStrength($password);


$data = file_get_contents("users.txt");
$users = explode(PHP_EOL, $data); 


$password = md5($password);


foreach($users as $user) {
    $userData = explode("|", trim($user));
if($user != ''){
    if($userData[0] == $username && $userData[2] == $password) {
        redirect(REGISTERED, "success=login");
    }
}

}


redirect(LOGIN_PAGE, "error=notfound");
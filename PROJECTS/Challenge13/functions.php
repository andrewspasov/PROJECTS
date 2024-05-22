<?php

function checkRequest()
{
    if ($_SERVER['REQUEST_METHOD'] !== "POST") {
        redirect(INDEX_PAGE);
    }
    
}


function checkEmptySpaceUsername($username)
{
    if (strpos($username, ' ') == true) {
        redirect(SIGNUP_PAGE, 'error=emptyspaceusername');
    }
}



function checkEmptyInputs($username, $email, $password)
{
    if (empty($username) || empty($email || empty($password))) {
        redirect(SIGNUP_PAGE, 'error=allinputsrequired');
    }
}

function checkUsernameMinLength($username, $minLength = 5)
{
    if (strlen($username) < $minLength) {
        redirect(SIGNUP_PAGE, 'error=usernametooshort');
    }
}

function checkUsername($username)
{
    if (preg_match('/[!@#\$%\^&\*]+/', $username)) {
        redirect(SIGNUP_PAGE, 'error=username');
    }
}

function checkPasswordMinLength($password, $minLenght = 6)
{
    if (strlen($password) < $minLenght) {
        redirect(SIGNUP_PAGE, "error=passwordtooshort");
    }
}
function checkPasswordStrength($password)
{
    if (
        !preg_match('/[a-z]+/', $password)
        || !preg_match('/[A-Z]+/', $password)
        || !preg_match('/[0-9]+/', $password)
        || !preg_match('/[!@#\$%\^&\*]+/', $password)
    ) {
        redirect(SIGNUP_PAGE, "error=passwordnotvalid");
    }
}

function checkUsernameUnique($username)
{
    $data = file_get_contents('users.txt');
    $users = explode(PHP_EOL, $data);
    //['john|john123', 'jane|jane123']
    foreach ($users as $user) {
        $userData = explode("|", $user);
        //['john', 'john123']
        //['jane', 'jane123']
        if (strtolower($userData[0]) == strtolower($username)) {
            redirect(SIGNUP_PAGE, "error=usernametaken");
        }
    }
}

function checkEmailUnique($email)
{
    $data = file_get_contents('users.txt');
    $users = explode(PHP_EOL, $data);
    //['john|john123', 'jane|jane123']
    foreach ($users as $user) {
        $userData = explode("|", $user);
        //['john', 'john123']
        //['jane', 'jane123']
        if (strtolower($userData[1]) == strtolower($email)) {
            redirect(SIGNUP_PAGE, "erroremail=emailtaken");
        }
    }
}

function checkEmailMinLength($email) {
    $atSignPosition = strpos($email, '@');

    if ($atSignPosition == false && $atSignPosition < 5) {
        redirect(SIGNUP_PAGE, 'error=containfive');
    } 
}

function checkAndPrintErrorMessage()
{
    $errorMsg = [
        'usernametooshort' => 'Username must be at least 4 characters.',
        'passwordtooshort' => 'Password must be at least 6 characters.',
        'notfound' => 'Wrong username/password combination.',
        'passwordnotvalid' => 'Password must contain at least 1 lowercase, uppercase, number and special character.',
        'general' => 'An error occured. Please try again later.',
        'usernametaken' => 'Username taken, choose another one.',
        'emailtaken' => 'A user with this email already exists',
        'allinputsrequired' => 'All inputs are required',
        'containfive' => 'Email must contain at least 5 characters before @',
        'username' => 'The username cannot contain empty spaces or special signs',
        'emptyspaceusername' => 'The username cannot contain empty spaces or special signs'
    ];

    if (isset($_GET['error']) && isset($errorMsg[$_GET['error']])) {
        echo '<p class="alert alert-danger">' . $errorMsg[$_GET['error']] .'</p>';
    }

    if (isset($_GET['erroremail']) && isset($errorMsg[$_GET['erroremail']])) {
        echo '<p class="alert alert-warning">' . $errorMsg[$_GET['erroremail']]  . '</p>';
    }
}

function checkAndPrintSuccessMessage()
{
    $username = $_POST['username'];
    $successMsg = [
        'login' => 'Successful login. Welcome ',
        'register' => 'Welcome ',
    ];
    if (isset($_GET['success'])) {
        echo '<p class="alert alert-success">' . $successMsg[$_GET['success']]. '</p>';
    }
}


function redirect($url, $queryString = '')
{
    if ($queryString != '') {
        $url .= "?$queryString";
    }

    header("Location:" . $url);
    die();
}


// LOGIN



function checkEmptySpaceUsernameLogin($username)
{
    if (strpos($username, ' ') == true) {
        redirect(LOGIN_PAGE, 'error=emptyspaceusername');
    }
}
function checkEmptyInputsLogin($username, $password)
{
    if (empty($username) || empty($password)) {
        redirect(LOGIN_PAGE, 'error=allinputsrequired');
    }
}
function checkUsernameMinLengthLogin($username, $minLength = 5)
{
    if (strlen($username) < $minLength) {
        redirect(LOGIN_PAGE, 'error=usernametooshort');
    }
}
function checkPasswordMinLengthLogin($password, $minLenght = 6)
{
    if (strlen($password) < $minLenght) {
        redirect(LOGIN_PAGE, "error=passwordtooshort");
    }
}
function checkPasswordStrengthLogin($password)
{
    if (
        !preg_match('/[a-z]+/', $password)
        || !preg_match('/[A-Z]+/', $password)
        || !preg_match('/[0-9]+/', $password)
        || !preg_match('/[!@#\$%\^&\*]+/', $password)
    ) {
        redirect(LOGIN_PAGE, "error=passwordnotvalid");
    }
}

function checkUsernameUniqueLogin($username)
{
    $data = file_get_contents('users.txt');
    $users = explode(PHP_EOL, $data);
    //['john|john123', 'jane|jane123']
    foreach ($users as $user) {
        $userData = explode("|", $user);
        //['john', 'john123']
        //['jane', 'jane123']
        if (strtolower($userData[0]) == strtolower($username)) {
            redirect(LOGIN_PAGE, "error=usernametaken");
        }
    }
}

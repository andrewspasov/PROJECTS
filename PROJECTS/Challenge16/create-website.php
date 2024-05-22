<?php

namespace Form;

use FormValidator;

session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    require_once __DIR__ . '/autoload-classes.php'; //$pdo

    $validator = new FormValidator();

    $phone = $_POST['phone'];
    $username = $_POST['subtitle'];
    $url = $_POST['url'];
    $imgurl1 = $_POST['img-url'];
    $imgurl2 = $_POST['img-url-2'];
    $imgurl3 = $_POST['img-url-3'];
    $fb = $_POST['facebook'];
    $linkedin = $_POST['linkedin'];
    $twitter = $_POST['twitter'];
    $google = $_POST['google'];

    $validator->validatePhoneNumber($phone);
    $validator->validateURL($url);
    $validator->validateURL($imgurl1);
    $validator->validateURL($imgurl2);
    $validator->validateURL($imgurl3);

    $validator->validateFacebook($fb);
    $validator->validateLinkedIn($linkedin);
    $validator->validateTwitter($twitter);
    $validator->validateGoogle($google);


    $errors = $validator->getErrors();

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header('Location: second-page.php');

    } else {

        $params = [
            'image_cover_url' => $_POST['url'],
            'main_title' => $_POST['title'],
            'subtitle' => $_POST['subtitle'],
            'info' => $_POST['info'],
            'phone' => $_POST['phone'],
            'location' => $_POST['location'],
            'select_option_id' => $_POST['select-option'],
            'first_image_url' => $_POST['img-url'],
            'first_desc' => $_POST['desc'],
            'second_image_url' => $_POST['img-url-2'],
            'second_desc' => $_POST['desc-2'],
            'third_image_url' => $_POST['img-url-3'],
            'third_desc' => $_POST['desc-3'],
            'company_desc' => $_POST['desc-4'],
            'linkedin' => $_POST['linkedin'],
            'facebook' => $_POST['facebook'],
            'twitter' => $_POST['twitter'],
            'google' => $_POST['google']
        ];

        $form = new Form();

        $response = $form->createForm($params);
    }
}
